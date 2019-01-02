<?php

namespace App\Http\Controllers\User;

use App\UserComplaint;
use Session;
use App\Incident;
use App\Employee;
use App\Operator;
use Carbon\Carbon;
use App\Notifications\updateIncident;
use App\Notifications\NewIncidentCreation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IncidentController extends Controller
{

    public function index()
    {
    	//
    }
	public function getServiceDesk()
	{
		$id = $this->getEmployeeID();
//		dd($id);
		$active = Incident::where('EmployeeID','=', $id)
			->where(function ($query){ $query->where('Status', 1)->orWhere('Status', 8);})
			->get();
		$reject = UserComplaint::where('EmployeeID', '=', $id)->get();
		$resolved = Incident::where('EmployeeID', '=', $id)->where('Status', 9)->get();
		$closed = Incident::where('EmployeeID', '=', $id)->where('Status', 10)->get();
		$incidents = Incident::where('EmployeeID', '=', $id)->get();
		/* Get last incident*/
		$last_inc = DB::table('Incident')
			->leftJoin('Employee','Incident.UsersMaintains','=','Employee.EmployeeID')
			->leftJoin('Operator','Employee.Email','=', 'Operator.Email')
			->select('Incident.*', 'Employee.LastName', 'Employee.FirstName', 'Employee.Position', 'Employee.ProfileImage', 'Operator.OperatorID')
			->where('Incident.EmployeeID','=', $id)
			->orderBy('CaseID','desc')
			->take(1)
			->get();
//		dd($last_inc);
		return view('user.servicedesk', compact('incidents', 'active', 'reject', 'resolved', 'closed', 'last_inc'));
	}
	public function getEmployeeRejected(){
		$complain = DB::table('UserComplaints')->get();
//		$content = $complain[0]->Description;
		foreach($complain as $value){
			$getDesc = $value->Description;
			$getRejectedEmployee = json_decode($getDesc, true);
			return $getRejectedEmployee;
		}
	}
    public function ajaxAll()
    {
        $incident = Incident::all();
        // return response(['incident'=>$incident], 200)->header('Content-Type', 'Application/json');
        return view('admin.ajax.incidents-notify');
    }

    // Show form for create incident.
    public function create()
    {
        $incidents = $this->showIncidentByUser();
        return view('user.create-incident', compact('incidents'));
    }

    // Save incident
    public function store(Request $request)
    {
//		$this->Validate($request, ['attach'=>'max:5000',]);
		if($request->hasfile('attach'))
		{
			$file = $request->file('attach');
//			$ext = $file->getClientOriginalExtension();
			$name=$file->getClientOriginalName();
			$file->move(public_path().'/attach/files', $name);
			$attach = $name;
		}else{
			$attach = null;
		}
        $incident = new Incident;
        $incident->CaseID = $this->getLaseCaseID();
        $incident->EmployeeID = $this->getEmployeeID();
        $incident->Subject = $request->subject;
        $incident->Description = $request->description;
        $incident->AttachFile = $attach;
        $incident->Status = 1;
	    $incident->Impact = 1;
	    $incident->Urgency = 1;
	    $incident->Priority = 1;
	    $incident->Comment = null;
	    $incident->SourceFrom = 2;
        $incident->CreatedDate = Carbon::now();
        $incident->Timestamp = Carbon::now();
        $incident->CcManager = $request->cc_manager;
	    $incident->UsersMaintains = null;
	    if($incident->CcManager == 1){
		    $this->sendNotifyManager($incident);
	    }
	    $incident->AssignedTo = $this->getOperator();
        $incident->save();
	    if(!$incident){

	    	// not yet handle the error
		    return back()->with('alert-danger', 'Sorry, the incident could not created!');
	    }
	    else{

	    	/* this notification send to the requested user */
//		    $this->sendNotify($incident);

		    /* This notification send to operator when requested user created incident */
		    $this->sendNotifyOperator($incident);

		    return redirect()->route('servicedesk');
	    }
    }

    // Show incident by employee ID
    public function showIncidentByUser()
    {
        $EmployeeID = $this->getEmployeeID();
        $incidents = Incident::where('EmployeeID', $EmployeeID)->get();
        return $incidents;
    }
	// Show edit form for incident.
	public function show($case_id)
	{
		$incident = Incident::where('CaseID', '=', $case_id)->get();
		dd($incident);
//		return view('user.incident-detail', compact('incident'));
	}

    // Show edit form for incident.
    public function edit($case_id)
    {
    	$incident = Incident::where('CaseID', '=', $case_id)->get();
    	if($incident[0]->Status !=1){
    		return redirect()->back();
	    }
        return view('user.edit-incident', compact('incident'));
    }

	// Update the incident.
    public function update(Request $request, $case_id)
    {
		$this->Validate($request, ['attach'=>'max:1000',]);
		$incident = Incident::where('CaseID', '=', $case_id)->get();
		$getAtt = $incident[0]->AttachFile;
		$getStatus = $incident[0]->Status;
		if($request->hasfile('attach'))
		{
			$file = $request->file('attach');
//			$ext = $file->getClientOriginalExtension();
			$name=$file->getClientOriginalName();
			$file->move(public_path().'/attach/files', $name);
			$attach = $name;
		}else{
			$attach = $getAtt;
		}
		$incident = Incident::where('CaseID','=', $case_id)->first();
		$incident->EmployeeID = $this->getEmployeeID();
		$incident->Subject = $request->subject;
		$incident->Description = $request->description;
		$incident->AttachFile = $attach;
		$incident->Status = $getStatus;
	    $incident->Impact = 1;
	    $incident->Urgency = 1;
	    $incident->Priority = 1;
	    $incident->SourceFrom = 2;
	    $incident->Comment = null;
//		$incident->CreatedDate = Carbon::now();
		$incident->Timestamp = Carbon::now();
		$incident->CcManager = $request->cc_manager;
	    $incident->UsersMaintains = null;
		$incident->save();
	    if($incident->CcManager == 1){
		    $this->sendNotifyManager($incident);
	    }
	    $incident->AssignedTo = $this->getOperator();
		if(!$incident){
			return back()->with('alert-danger','Cannot update the incident!');
		}
//		$this->sendUpdateNotify($incident);
	    $this->sendUpdateNotifyOperator($incident);
		return redirect()->back()->with('alert-success', 'Your incident has been updated !');
    }

    public function destroy($id)
    {
        //
    }
/*
 * ===================================== Other Function ==============================================
 */
	// Ajax all incident
	public function AjaxAllIncident($case_id){
		$employee = $this->getEmployeeID();
		$incident = Incident::where('EmployeeID', '=', $employee)->where('CaseID', '=', $case_id)->get();
//		dd($incident);
		return view('user.incident-detail', compact('incident'));
//		return $incident;
	}

	// Send notification function
	public function sendNotifyOperator($Incident){
		$EmailID = Session::get('user.0.EmailID');
		$Operator = Operator::all();
//		dd($Operator);
		foreach($Operator as $operator){
			$operator->notify(new NewIncidentCreation($Incident));
		}
	}
	// Send notification function
	public function sendNotifyManager($incident){
		$userID = $this->getEmployeeID();
		$employee = Employee::where('EmployeeID', '=', $userID)->first();
		$managerID = $employee->Manager;
		$manager = Employee::where('EmployeeID', '=', $managerID )->get();
		foreach($manager as $notify){
			return $notify->notify(new NewIncidentCreation($incident));
		}
	}
	public function sendUpdateNotify($incident){
		$EmailID = Session::get('user.0.EmailID');
		$Employee = Employee::where('Email', '=', $EmailID)->get();
		foreach($Employee as $employee){
			$employee->notify(new updateIncident($incident));
		}
	}

	public function sendUpdateNotifyOperator($incident){
		$EmailID = Session::get('user.0.EmailID');
		$Operator = Operator::all();
//		dd($Operator);
		foreach($Operator as $operator){
			$operator->notify(new updateIncident($incident));
		}
	}

    public function sendNotify($Incident){
    	$EmailID = Session::get('user.0.EmailID');
        $Employee = Employee::where('Email', '=', $EmailID)->get();
        foreach($Employee as $employee){
			$employee->notify(new NewIncidentCreation($Incident));
		}
    }

	public function getNotificationByUser(){
		$EmployeeID = $this->getEmployeeID();
		$Employee = Employee::find($EmployeeID);
		dd($Employee);
		foreach($Employee->unreadNotifications as $notification){
			return dd($notification);
		}
	}
// Unread 7 notification
	public static function getLastUnread7daysNotifications($employee){
		$employee = Employee::where('EmployeeID', '=', $employee)->first();
		$employeeID = $employee->EmployeeID;
//		dd($employeeID);
		$current = Carbon::now();
		$result = Carbon::now()->subDays(6);
		$notifications = DB::table('Notifications')
			->whereBetween('created_at',[$result, $current])
			->where([['notifiable_id','=',(string)$employeeID],['read_at', '=', NULL]])
			->orderby('updated_at', 'desc')
			->get();
		return $notifications;
	}

	// Read 7 notification
	public static function getLast7daysNotifications($employee){
		$employee = Employee::where('EmployeeID', '=', $employee)->first();
		$employeeID = $employee->EmployeeID;
//		dd($employeeID);
		$current = Carbon::now();
		$result = Carbon::now()->subDays(6);
		$notifications = DB::table('Notifications')
			->whereBetween('created_at',[$result, $current])
			->where('notifiable_id','=',(string)$employeeID)
			->orderby('updated_at', 'desc')
			->get();
		return view('user.notification',compact('notifications'));
	}

	// Show only unread notification
	public function readNotifications(){
		$EmployeeID = $this->getEmployeeID();
		$Employee = Employee::find($EmployeeID);
		foreach($Employee->unreadNotifications as $notification){
			$notification->markAsRead();
			return redirect('/incidents');
		}
	}
	// Get last CaseID and plus 1.
	public function getLaseCaseID(){
		$last_case = Incident::select('CaseID')->max('CaseID');
		$split_Case = preg_split('#(?<=[a-z])(?=\d)#i', $last_case);
		$insertCase = $split_Case[1]+1;
		$width = 6;
		$padded = str_pad((string)$insertCase, $width, "0", STR_PAD_LEFT);
//		$filled_int = sprintf("%04d", $insertCase);
		$caseID = 'INC'.$padded;
		return strval($caseID);
	}
	// Get only employee ID
	public function getEmployeeID(){
		$EmailID = Session::get('user.0.EmailID');
		$getEmployee = Employee::where('Email','=', $EmailID)->get();
//		dd($getEmployee);
		return $getEmployee[0]->EmployeeID;
	}

	public function splitUserID(){
		$getUserID = Session::get('user.0.UserID');
		$split_ID = preg_split('#(?<=[a-z])(?=\d)#i',  $getUserID);
		return $split_ID[1];
	}

	public function getOperator(){

		// Need to change to dynamic
		$operator = Operator::where('EmployeeID', '=', '3368')->get();
		return $operator[0]->EmployeeID;
	}
}

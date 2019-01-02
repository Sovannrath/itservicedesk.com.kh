<?php

namespace App\Http\Controllers\Admin;

use App\Mail\mailNewIncident;
use Illuminate\Http\Request;
use App\Incident;
use App\UserComplaint;
use DB;
use Session;
use App\Notifications\smsNewIncident;
use App\GlobalDeclare;
use App\Province;
use App\BusinessUnit;
use App\Department;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
//use Nexmo\Laravel\Facade\Nexmo;
use App\Operator;
use App\Employee;
use App\Notifications\rejectedIncident;
use App\Notifications\NewIncidentCreation;
use App\Notifications\UpdateIncident;
use App\Notifications\IncidentCreation;
use Illuminate\Support\Facades\Notification;

class IncidentController extends Controller
{

    // Index of incidents
    public function index()
    {
        $incidents = Incident::all();
        $business_unit = BusinessUnit::all();
        $department = Department::all();
        $provinces = Province::all();
//        $data =json_encode(['incident'=>$incidents], true);
        return view('admin.incidents.index',
	        ['incidents'=>$incidents,
		        'departments'=>$department,
		        'business_unit'=>$business_unit,
		        'provinces'=>$provinces]);
    }

    // Show create incident form
    public function showCreateIncident()
    {   $incidents = $this->showIncidentByUser();
        return view('admin.incidents.create-incident', compact('incidents'));
    }

   // Save new incident
    public function store(Request $request)
    {
	    if($request->hasfile('attach'))
	    {
		    $file = $request->file('attach');
			$ext = $file->getClientOriginalExtension();
		    $name=$file->getClientOriginalName();
		    $file->move(public_path().'/attach/files', $name);
		    $attach = $name;
	    }else{
		    $attach = null;
	    }
		$incident = new Incident;
		$incident->CaseID = $this->getLaseCaseID();
		$incident->EmployeeID = $request->created_by;
		$incident->Subject = $request->subject;
		$incident->Description = $request->description;
		$incident->AttachFile = $attach;
	    $incident->SourceFrom = $request->source;
		$incident->Status = $request->status;
	    $incident->Priority = $request->priority;
	    $incident->Impact = $request->impact;
	    $incident->Urgency = $request->urgency;
	    $incident->UsersMaintains = $this->getEmployeeID();
		$incident->CreatedDate = Carbon::now();
		$incident->Timestamp = Carbon::now();
		$incident->CcManager = $request->cc_manager;
	    $incident->UsersMaintains = $this->getEmployeeID();
	    $incident->AssignedTo = $this->getOperator();
//		return dd($incident);
		$incident->save();
		if($incident->CcManager == 1){
			$this->sendNotifyManager($incident);
		}
//	    $this->sendMailCreate($incident);
//		$this->sendNotify($incident);
		$this->sendNotifyOperator($incident);
//	    $this->sendUpdateNotifyToOwner($getID, $incident);

		return redirect()->back()->with('alert-success', 'Your incident has been created !');
    }
    // Edit incident
	public function edit($case_id)
	{
		$incident = Incident::where('CaseID', '=', $case_id)->get();
		$data =json_encode(['data'=>$incident], true);
//		dd($data);
//		return view('admin.ajax.edit-incident', compact('incident'));
		return view('admin.incidents.edit-incident', compact('incident'));
	}
	public function ajaxEdit($case_id)
	{
		$incident = DB::table('Incident')->where('CaseID', '=', $case_id)->get();
//		$incident = Incident::all();
//		dd($incident);
		return view('admin.incidents.inc-assign', compact('incident'));
	}
    // Update incident
	public function update(Request $request, $case_id)
	{

		$getIncident = Incident::where('CaseID', '=', $case_id)->first();
		$getID = (integer)$getIncident->EmployeeID;
//		dd($getID);
		$getAtt = $getIncident->AttachFile;
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
		$incident->EmployeeID = $getID;
		$incident->Subject = $request->input('subject');
		$incident->Description = $request->input('description');
		$incident->Comment = $request->input('comment');
		$incident->AttachFile = $attach;
		$incident->SourceFrom = $request->source;
//		$incident->AttachFile = $request->input('attach');
		$incident->Status = $request->input('status');
		$incident->Impact = $request->input('impact');
		$incident->Urgency = $request->input('urgency');
		$incident->Priority = $request->input('priority');
		$incident->Timestamp = Carbon::now();
		$incident->CcManager = $request->input('cc_manager');
		$incident->UsersMaintains = $this->getEmployeeID();
		$incident->AssignedTo = $this->getOperator();

//		dd($incident);
		$result = $incident->save();
//
//		var_dump($incident->save());
		if($result){
//		// Ajax Update
			if($incident->CcManager == 1){
				$this->sendUpdateNotifyManager($incident);
			}
			$this->sendUpdateNotifyToOwner($getID, $incident);
			return redirect('incidents');
		}
		else{
			return redirect()->back()->with('alert-danger', 'Something went wrong!');
		}
//
////		$this->sendUpdateNotify($incident);

		// Update
//		return redirect('/create-incident')->with('alert-success', 'Your incident has been updated !');

	}

	public function assign(Request $request, $case_id){
    	$assign = $request->assign;
//    	$operator = Operator::where('OperatorID', '=', $assign)->get();
//    	$opt_empID = $operator[0]->EmployeeID;
//    	dd($opt_empID);
    	DB::table('Incident')->where('CaseID', '=',$case_id)->update(['AssignedTo'=>$assign]);
    	return redirect()->back();
	}
	// Delete incident
	public function delete($case_id)
	{
		Incident::where('CaseID', '=', $case_id)->delete();

		return false;

	}

	// Delete incident
	public function reject(Request $request, $case_id)
	{
		$operatorID = null;
		$Operator = Operator::where('EmployeeID','=',$this->getEmployeeID())->get();
		if(count($Operator) != 0){
			$operatorID = $Operator[0]->OperatorID;
		}
		$findIncident = DB::table('Incident')
			->where('CaseID', '=', $case_id)
			->get();
		$subject = $findIncident[0]->Subject;
		$description = $findIncident[0]->Description;
		$getEmpID = $findIncident[0]->EmployeeID;

			$CaseID = $case_id;
			$OperatorID = $operatorID;
			$ComplaintDate = $findIncident[0]->CreatedDate;
			$TransactionDate = Carbon::now();
			$Description = json_encode(['EmployeeID'=>$getEmpID, 'Subject'=>$subject, 'Description'=>$description]);
			$Reason = $request->input('reason');
			$RejectedBy = $this->getEmployeeID();
			$CreatedDate = Carbon::now();
			$Timestamps = Carbon::now();
			$UpdatedDate = null;
			$UsersMaintains = $this->getEmployeeID();
		$data = [
			'ComplaintID'=> $this->getLastComplaintID(),
			'CaseID'=>$CaseID,
			'OperatorID'=>$OperatorID,
			'ComplaintDate'=>$ComplaintDate,
			'TransactionDate'=>$TransactionDate,
			'Description' => $Description,
			'Reason'=>$Reason,
			'RejectedBy'=>$RejectedBy,
			'CreatedDate'=>$CreatedDate,
			'Timestamps'=>$Timestamps,
			'UpdatedDate'=>$UpdatedDate,
			'UsersMaintains'=>$UsersMaintains
			];
//		dd($data);
			$result = DB::table('UserComplaints')->insert([
				'ComplaintID'=> $this->getLastComplaintID(),
				'CaseID'=>$CaseID,
				'OperatorID'=>$OperatorID,
				'ComplaintDate'=>$ComplaintDate,
				'TransactionDate'=>$TransactionDate,
				'Description' => $Description,
				'Reason'=>$Reason,
				'RejectedBy'=>$RejectedBy,
				'CreatedDate'=>$CreatedDate,
				'Timestamp'=>$Timestamps,
				'UpdatedDate'=>$UpdatedDate,
				'UsersMaintains'=>$UsersMaintains
			]);
			if($result){
//				DB::table('Incident')->where('CaseID', '=',$case_id)->update(['Status'=>2]);
				$this->delete($CaseID);
				$this->sendRejectedNotify($getEmpID, $data);
				return redirect()->back();
			}
//		return redirect()->back();
//		dd($complaint);
		}

	/*
================================ Other Function ===========================================
	*/

	// Show investigate incident case
    public function showInvestigate()
    {
        return view('admin.incidents.investigate');
    }
	public function getLaseCaseID(){

		$Incident = DB::table('UserComplaints')
			->rightJoin('Incident', 'UserComplaints.CaseID','=','Incident.CaseID')
			->select(DB::RAW('CONCAT(UserComplaints.CaseID, Incident.CaseID) AS AllCaseID'))
			->orderBy('AllCaseID', 'DESC')
			->get();
//		dd($Incident);
		if(count($Incident) == 0){
			return 'INC000001';
		}
		foreach($Incident as $incident){
			$CaseID = $incident->AllCaseID;
		}
		$split_Case = preg_split('#(?<=[a-z])(?=\d)#i', $CaseID);
		$insertCase = $split_Case[1]+1;
		$width = 6;
		$padded = str_pad((string)$insertCase, $width, "0", STR_PAD_LEFT);
		$caseID = 'INC'.$padded;
		return strval($caseID);
	}
	public function getLastComplaintID(){
		$getLastCompID = UserComplaint::select('ComplaintID')->max('ComplaintID');
		if(count($getLastCompID)==0){
			return 'COMP0001';
		}
		$split_ID = preg_split('#(?<=[a-z])(?=\d)#i', $getLastCompID);
		$insertCompID = $split_ID[1]+1;
		$width = 4;
		$padded = str_pad((string)$insertCompID, $width, "0", STR_PAD_LEFT);
		$compID = 'COMP'.$padded;
		return strval($compID);

	}
	public function getOperator(){
    	$operator = Operator::where('EmployeeID', '=', '3368')->get();
    	return $operator[0]->EmployeeID;
	}
	public function splitUserID(){
		$getUserID = Session::get('user.0.UserID');
		$split_ID = preg_split('#(?<=[a-z])(?=\d)#i',  $getUserID);
		return $split_ID[1];
	}
	// Show incident by employee ID
	public function showIncidentByUser()
	{
		$EmployeeID = $this->getEmployeeID();
		$incidents = Incident::where('EmployeeID', $EmployeeID)->get();
		return $incidents;
	}
	public function getEmployeeID(){
		$EmailID = Session::get('user.0.EmailID');
		$getEmployeeID = Employee::where('Email', '=', $EmailID)->get();
		return $getEmployeeID[0]->EmployeeID;
	}

	public function downloadAttachment($filename)
	{
		$file_path = public_path() . '/attach/files/' . $filename;
//		$headers = [
//			'Content-Type' => 'application/pdf',
//			'Content-Disposition' => 'inline; ' . $file_path,
//		];
		if (file_exists($file_path)) {
			return response()->file($file_path);
		}
	}

	/*
================================ Ajax Function ===========================================
	*/

	//
	public function ajaxGetIncidents()
	{
//		$incidents = DB::select('EXEC GetIncident');
		$incidents = DB::table('Incident')
			->join('Status', 'Incident.Status', '=', 'Status.StatusID')
			->join('Priority','Incident.Priority','=','Priority.PriorityID')
			->join('Employee', 'Employee.EmployeeID', '=', 'Incident.EmployeeID')
			->select('Incident.*', 'Priority.PriorityType', 'Status.StatusType', 'Employee.LastName', 'Employee.FirstName')
			->get();
//		dd($incidents);
		$data =json_encode(['data'=>$incidents], true);
//		$status = $incidents[0]->Status;
//		$statusName = GlobalDeclare::getStatusText($status);
//		dd($data);
		return response($data, 200)->header('Content-Type','Application/json');
	}
	public function ajaxShow($case_id)
	{
		$incidents = DB::table('Incident')
			->join('Employee','Employee.EmployeeID', '=', 'Incident.EmployeeID')
			->select('Incident.*','Employee.EmployeeID', 'Employee.FirstName', 'Employee.LastName', 'Employee.Manager')
			->where('CaseID', '=', $case_id)
			->get();
//		dd($incidents);
//		$data =json_encode(['data'=>$incidents], true);
//		return view('admin.incidents.delete-incident',compact('incidents'));
		$data =json_encode(['data'=>$incidents], true);
		return response($data, 200)->header('Content-Type','Application/json');
	}

/////////////// Notification //////////////
	public function ajaxUnreadNotifications()
	{
		$employee = $this->getEmployeeID();
		$notifications = $this->getLast7daysNotifications($employee);
//		return count($notifications);
		return view('admin.ajax.incidents-notify', ['notifications'=>$notifications]);
	}

	// Get date time
	public static function getDateDiff($Timestamp)
	{
		// TimeZone : Asia/Phnom_Penh
		$start_date = Carbon::parse($Timestamp, 'Asia/Phnom_Penh');
		$end_date = Carbon::now('Asia/Phnom_Penh');
		return $start_date->diffForHumans();
	}

	public function ajaxByID($CaseID)
	{
		$incidents = DB::table('Incident')->where('CaseID', $CaseID);
		// return response(['incident'=>$incident], 200)->header('Content-Type', 'Application/json');
		return view('admin.ajax.incidents-notify', ['incidents'=>$incidents]);
	}
	public function getTextMessege(){
		$data = 'Data';
//		Nexmo::message()->send([
//			'to'   => '10557635',
//			'from' => '16105552344',
//			'text' => 'Using the facade to send a message.'
//		]);
		return new smsNewIncident($data);
	}

	public function sendMailCreate($incident){
		$email = 'sovannrath.hean@vital.com.kh';
		$Operator = Operator::all();
//		$email = $operator->Email;
		foreach($Operator as $operator){
			Mail::to($operator->Email)->send(new mailNewIncident($incident));
		}
	}

	// Ajax showing all incidents.
	public function ajaxAll()
	{
		$employee = $this->getEmployeeID();
		$notifications = $this->getLast7daysNotifications($employee);

//		return $notifications;
//		 return response(['incident'=>$incident], 200)->header('Content-Type', 'Application/json');
		return view('admin.ajax.incidents-notify', ['notifications'=>$notifications]);
	}
	public function sendEmailCreateIncident($incidents){
		$Operator = Operator::all();
		foreach($Operator as $operator){
			Notification::send($operator, new IncidentCreation($incidents));
		}
	}
	// Send notification function
	public function sendNotify($Incident){
		$EmailID = Session::get('user.0.EmailID');
		$Employee = Employee::where('Email', '=', $EmailID)->get();
		foreach($Employee as $employee){
			$employee->notify(new NewIncidentCreation($Incident));
		}
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
	public function sendRejectedNotify($owner, $data){
		$employee = Employee::where('EmployeeID', '=', $owner)->get();
//		dd($complain);
		foreach($employee as $user){
			return $user->notify(new rejectedIncident($data));
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

	// Send notification function
	public function sendUpdateNotifyManager($incident){
		$userID = $this->getEmployeeID();
		$employee = Employee::where('EmployeeID', '=', $userID)->first();
		$managerID = $employee->Manager;
		$manager = Employee::where('EmployeeID', '=', $managerID )->get();
		foreach($manager as $notify){
			return $notify->notify(new updateIncident($incident));
		}
	}

	// Send notify update.
	public function sendUpdateNotify($incident){
		$EmailID = Session::get('user.0.EmailID');
		$Employee = Employee::where('Email', '=', $EmailID)->get();
		foreach($Employee as $employee){
			$employee->notify(new updateIncident($incident));
		}
	}

	// Send notify update.
	public function sendUpdateNotifyToOwner($owner, $incident){
		$employee = Employee::where('EmployeeID', '=', $owner)->get();
//		$Operator = Operator::where('EmployeeID', '=', $owner)->get();
//		if($Operator != null){
//			return;
//		}
		foreach($employee as $creator){
			$creator->notify(new updateIncident($incident));
		}
	}
	// Get all unread notification
	public function getAllNotification(){
		$Employee = Employee::all();
		foreach($Employee->unreadNotifications as $notification){
			return $notification->data;
		}
	}

	//
	public function readNotifications(){
		$EmployeeID = $this->getEmployeeID();
		$Operator = Operator::where('EmployeeID','=', $EmployeeID)->first();
		if($Operator != null){
			Operator::find($Operator->OperatorID)->unreadNotifications->markAsRead();
		}
		Employee::find($EmployeeID)->unreadNotifications->markAsRead();

		return redirect('/incidents');
//		return $arr;
	}

//	 Get all notifications only 7days.
	public static function getLast7daysNotifications($employee){
		$getEmployee = $employee;
		$current = Carbon::now();
		$result = Carbon::now()->subDays(7);
		$notifications = DB::table('Notifications')
			->whereBetween('created_at',[$result, $current])
			->where(function($query) use ($getEmployee){
				$operator = Operator::where('EmployeeID', '=', $getEmployee)->first();
				$operatorID = null;
				if(count($operator) != 0){
					$operatorID = $operator->OperatorID;
				}
				$query->where('notifiable_id','=',(string)$getEmployee)
					->orWhere('notifiable_id', '=', $operatorID);
			})
			->orderby('updated_at', 'desc')
			->get();
		return $notifications;
	}
	// Get all notifications only 7days unread.
	public static function getLastUnread7daysNotifications($employee){
//		$employee = $this->getEmployeeID();
		$operator = Operator::where('EmployeeID', '=', $employee)->first();
		$operatorID = null;
		if($operator != null){
			$operatorID = $operator->OperatorID;
		}
		$current = Carbon::now();
		$result = Carbon::now()->subDays(6);
		$notifications = DB::table('Notifications')
			->whereBetween('created_at',[$result, $current])
			->where([['notifiable_id','=',(string)$employee],['read_at', '=', NULL]])
			->orWhere([['notifiable_id', '=', $operatorID],['read_at', '=', NULL]])
			->orderby('updated_at', 'desc')
			->get();
		return $notifications;
	}
	// Get only unread notification by user
	public function getNotificationByUser(){
		$EmployeeID = $this->getEmployeeID();
		$Employee = Employee::find($EmployeeID);
		foreach($Employee->unreadNotifications as $notification){
			return ['data'=>$notification->type];
		}
	}
}

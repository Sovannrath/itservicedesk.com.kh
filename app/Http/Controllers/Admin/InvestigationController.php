<?php

namespace App\Http\Controllers\Admin;

use App\Incident;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Operator;
use App\InvestigateLine;
use App\Employee;
use Carbon\Carbon;
use App\InvestigateHeader;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return view('admin.investigation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$investigate = $this->getLastInvestigateID();
        return view('admin.investigation.investigate', compact('investigate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxSaveInvestigate(Request $request){
		$investigate_header = new InvestigateHeader;
	    $investigate_header->InvestigateID = $request->inv_id;
	    $investigate_header->OperatorID = $this->getOperator();
	    $investigate_header->CaseID = $request->case_id;
	    $investigate_header->Name = $request->name;
	    $investigate_header->InvestigateDate = Carbon::now()->format('d/m/Y h:i A');
	    $investigate_header->Website = $request->website;
	    $investigate_header->Source = $request->source;
	    $investigate_header->Status = $request->status;
	    $investigate_header->CreatedDate = Carbon::now()->format('d/m/Y h:i A');
	    $investigate_header->UpdatedDate = null;
	    $investigate_header->DeletedDate = null;
	    $investigate_header->Timestamp = Carbon::now();
	    $investigate_header->RemoteDesktopID = $request->remote_pc;
	    $investigate_header->UsersMaintains = $this->getEmployeeID();

		$investigate_header->save();
//		return dd($investigate_header);
    }
    public function store(Request $request)
    {
//		$inv_id = $request->inv_id;
		$case_id = $request->case_id;
		$name = $request->name;
		$inv_date = $request->inv_date;
		$web = $request->website;
		$source = $request->source;
		$status = $request->status;
		$created_date = Carbon::now();
		$updated_date = null;
		$deleted_date = null;
		$timestamp = Carbon::now();
		$remote_id = $request->remote_pc;
		$user_maintains = $this->getEmployeeID();

		$query = DB::table('InvestigateHeader')->insert([
			'InvestigateID'=> $this->getLastInvestigateID(),
			'OperatorID'=>$this->getOperator(),
			'CaseID'=>$case_id,
			'Name'=>$name,
			'InvestigateDate'=>$inv_date,
			'Website'=>$web,
			'Source'=>$source,
			'Status'=>$status,
			'CreatedDate'=>$created_date,
			'UpdatedDate'=>$updated_date,
			'DeletedDate'=>$deleted_date,
			'Timestamp'=>$timestamp,
			'RemoteDesktopID'=>$remote_id,
			'UsersMaintains'=>$user_maintains,
		]);
		if($query){
			return redirect()->back();
		}
    }

    public function show()
    {
    	$InvestigateID = $this->getLastInvestigateID();
//    	dd($InvestigateID);
        return view('admin.investigation.investigate', compact( 'InvestigateID'));
    }

    public function getLastInvestigateID(){
	    $investigate = DB::table('InvestigateHeader')->select('InvestigateID')->max('InvestigateID');
	    $split_ID = preg_split('#(?<=[a-z])(?=\d)#i', $investigate);
	    $insertInvID = $split_ID[1]+1;
	    $width = 4;
	    $padded = str_pad((string)$insertInvID, $width, "0", STR_PAD_LEFT);
	    $invID = 'INV'.$padded;
	    return strval($invID);
    }

    public function ajaxShowInvestigateLine(){
	    $inv_line = InvestigateLine::all();
//	    $data =json_encode(['data'=>$inv_line], true);
    	return view('admin.investigation.tbl-investigate-line-step', compact('inv_line'));
    }
// Not use right now
    public function ajaxGetInvestigateLineData(){
	    $inv_line = InvestigateLine::all();
	    $data =json_encode(['data'=>$inv_line], true);
    	return response($data, 200)->header('Content-Type','Application/json');
    }
    // Create Investigation Line Form Pop Up
	public function ajaxCreateInvestigateLine(Request $request){
		return view('admin.investigation.investigate-line-form');
	}
	public function ajaxSaveInvestigateLine(Request $request){
//		$inv_line = new InvestigateLine;
////		$inv_line->StepID = $this->getStepID();
//		$inv_line->InvestigateID = $request->inv_id;
//		$inv_line->Description = $request->description;
//		$inv_line->Reference = $request->reference;
//		$inv_line->Comment = $request->comment;
//		$inv_line->Status = $request->status;
//		$inv_line->CreatedDate = Carbon::now()->format('d/m/Y h:i A');
//		$inv_line->UpdatedDate = null;
//		$inv_line->DeletedDate = null;
//		$inv_line->TimeStamp = Carbon::now();
//		$inv_line->UsersMaintains = $this->getEmployeeID();
$arr = array([
	'InvestigateID'=>$request->inv_id,
	'Description'=>$request->description,
	'Reference'=>$request->reference,
	'Comment'=>$request->comment,
	'Status'=>$request->status,
	'CreatedDate'=>Carbon::now()->format('d/m/Y h:i A'),
	'UpdatedDate'=>null,
	'TimeStamp'=>Carbon::now(),
	'UsersMaintains'=>$this->getEmployeeID()
	]);
dd($arr);
//		$inv_line->save();
	}
	public function ajaxDeleteInvestigateLine($step_id){
    	InvestigateLine::where('StepID', '=', $step_id)->delete();
		return false;
//    	return $step_id;
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


	public function getOperator(){
		$operator = Operator::where('EmployeeID', '=', '3368')->get();
		return $operator[0]->EmployeeID;
	}
	public function getEmployeeID(){
		$EmailID = Session::get('user.0.EmailID');
		$getEmployeeID = Employee::where('Email', '=', $EmailID)->get();
		return $getEmployeeID[0]->EmployeeID;
	}

}

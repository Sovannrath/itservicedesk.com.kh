<?php

namespace App\Http\Controllers\Admin;

use App\Incident;
use Illuminate\Support\Facades\Session;
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

    public function index()
    {
	    return view('admin.investigation.index');
    }

    public function create()
    {
    	$investigate = $this->getLastInvestigateID();
        return view('admin.investigation.investigate', compact('investigate'));
    }

    public function ajaxSaveInvestigate(Request $request){
		$investigate_header = new InvestigateHeader;
	    $investigate_header->InvestigateID = $this->getLastInvestigateID();
	    $investigate_header->OperatorID = $this->getOperator();
	    $investigate_header->CaseID = $request->case_id;
	    $investigate_header->Name = $request->name;
	    $investigate_header->InvestigateDate = Carbon::now();
	    $investigate_header->Website = $request->website;
	    $investigate_header->Source = $request->source;
	    $investigate_header->Status = $request->status;
	    $investigate_header->CreatedDate = Carbon::now();
	    $investigate_header->UpdatedDate = null;
	    $investigate_header->DeletedDate = null;
	    $investigate_header->Timestamp = Carbon::now();
	    $investigate_header->RemoteDesktopID = $request->remote_pc;
	    $investigate_header->UsersMaintains = $this->getEmployeeID();

		$investigate_header->save();
    }
    public function show()
    {
    	$InvestigateID = $this->getLastInvestigateID();
        return view('admin.investigation.investigate', compact( 'InvestigateID'));
    }

    public function getLastInvestigateID(){
    	$count = DB::table('InvestigateHeader')->get();
    	if(count($count) == 0){
		    return 'INV0001';
	    }else{
		    $investigate = DB::table('InvestigateHeader')->select('InvestigateID')->max('InvestigateID');
		    return $this->split($investigate);
	    }
    }

    public function split($id){
	    $split_ID = preg_split('#(?<=[a-z])(?=\d)#i', $id);
	    $insertInvID = $split_ID[1]+1;
	    $width = 4;
	    $padded = str_pad((string)$insertInvID, $width, "0", STR_PAD_LEFT);
	    $invID = 'INV'.$padded;
	    return strval($invID);
    }

    public function ajaxShowInvestigateHeader(){
    	$inv_header = InvestigateHeader::orderBy('InvestigateID', 'desc')->get();

	    $data =json_encode(['data'=>$inv_header], true);
	    return response($data, 200)->header('Content-Type','Application/json');
    }

	public function ajaxShowInvestigateHeaderByID($inv_id){
		$inv_header = InvestigateHeader::where('InvestigateID', '=', $inv_id)->get();
		return view('admin.investigation.investigate-detail', compact('inv_header'));
	}
// Not use right now
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

	public function ajaxSaveInvestigateLine(Request $request){
		$inv_line = new InvestigateLine;
		$inv_line->StepID = $request->step;
		$inv_line->InvestigateID = $request->inv_id;
		$inv_line->Description = $request->description;
		$inv_line->Reference = $request->reference;
		$inv_line->Comment = $request->comment;
		$inv_line->Status = $request->status;
		$inv_line->CreatedDate = Carbon::now();
		$inv_line->UpdatedDate = null;
		$inv_line->DeletedDate = null;
		$inv_line->TimeStamp = Carbon::now();
		$inv_line->UsersMaintains = $this->getEmployeeID();

		$inv_line->save();

	}
	public function ajaxDeleteInvestigateLine($step_id){
    	InvestigateLine::where('StepID', '=', $step_id)->delete();
		return false;
	}
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

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

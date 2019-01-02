<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\GlobalDeclare;
use Carbon\Carbon;
use DB;
use App\UserComplaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserComplaintController extends Controller
{
    //home complaint
	public function index(){
		$complaints = UserComplaint::all();
//		dd($complaints);
		return view('admin.incidents.user-complaints', compact('complaints'));
	}
	public function ajaxAllComplaints(){
		$complaints = DB::table('Employee')
			->join('UserComplaints','UserComplaints.RejectedBy','=','Employee.EmployeeID')
			->select('UserComplaints.*', 'Employee.LastName', 'Employee.FirstName')
			->get();
//		$complaints = UserComplaint::all();

		$data =json_encode(['data'=>$complaints], true);
//		dd($data);
		return response($data, 200)->header('Content-Type','Application/json');
	}

	//
	public function changeEmployeeToName($employee_id){
		return GlobalDeclare::getEmployeeName($employee_id);
	}
}

<?php

namespace App\Http\Controllers\Admin;

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
		$complaints = UserComplaint::all();

		$data =json_encode(['data'=>$complaints], true);
//		dd($data);
		return response($data, 200)->header('Content-Type','Application/json');
	}
}

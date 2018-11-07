<?php

namespace App\Http\Controllers\User;

use App\Incident;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }
    public function getUserIndex()
    {
        return 'user';
    }

    public function showRegisterUser(Request $request)
    {
        $authorizeApp = $this->checkBusinessAppAuthorize();
        $data = $this->getLoginDetails();
        $app =$this->getBusinessAppList();
        return view('user.employee_register', ['data'=>$data, 'app'=>$app, 'authorizeApp'=>$authorizeApp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repository $repository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
        //
    }
    public function getLoginDetails()
    {
        $EmailID = Session::get('user.0.EmailID');
        $user_detail = DB::select(DB::raw('EXEC LoginRequestDetails :EmailID'),['EmailID'=>$EmailID]);
        // return response($user_detail, 200)->header('Content-Type', 'application/json');
        return $user_detail;
    }
    public function getBusinessAppList()
    {
        $Apps = DB::select('EXEC BusinessAppList');
        return $Apps;
    }  
    public function checkBusinessAppAuthorize()
    {
        $UserID = Session::get('user.0.UserID');
        $AuthorizeApps = DB::select(DB::raw('EXEC usp_UserApps :UserID'),['UserID'=>$UserID]);
        return $AuthorizeApps;
        
    }  
}
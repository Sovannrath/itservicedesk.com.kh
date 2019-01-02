<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Session;
use App\AppSetUp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('apps-setup-admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userSetup()
    {
    	$appSetup = AppSetUp::getAppSetup();
        return view('apps-setup-user', compact('appSetup'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = $request->input('theme');
        $fh = $request->input('fixed_header');
        $fn = $request->input('fixed_navigation');
        $fr = $request->input('fixed_ribbon');
        $ff = $request->input('fixed_page_footer');
        $ic = $request->input('container');
        $rtl = $request->input('rtl_support');
        $mot = $request->input('menu_on_top');
        $layouts = json_encode($fh, $fn, $fr, $ff, $ic, $rtl, $mot);

        dd($layouts);
        $user = Session::get('user.0.UserID');
        $created_date = Carbon::now();
        $updated_date = Carbon::now();
        $result = DB::table('AppSetup')->insert([
            'UserID'=>$user,
            'ThemeName'=>$theme,
            'Layouts'=>$layouts,
            'CreatedDate'=>$created_date,
            'UpdatedDate'=>$updated_date
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $userID = Session::get('user.0.UserID');
        $findSetUp = AppSetUp::getAppSetup();
        $theme = $request->input('theme');
        $other_opt = $request->input('other_option');
        // $layouts = json_encode($request->input('layouts'));
        $fh = $request->input('fixed_header');
        $fn = $request->input('fixed_navigation');
        $fr = $request->input('fixed_ribbon');
        $ff = $request->input('fixed_page_footer');
        $ic = $request->input('container');
        $rtl = $request->input('rtl_support');
        $mot = $request->input('menu_on_top');
        $arr[] = ['fh'=>$fh, 'fn'=>$fn, 'fr'=>$fr, 'ff'=>$ff, 'ic'=>$ic, 'rtl'=>$rtl, 'mot'=>$mot];
        $layouts =json_encode($arr);
        $user = Session::get('user.0.UserID');
        $created_date = Carbon::now();
        $updated_date = Carbon::now();

        if(count($findSetUp) == null ){
            $result = DB::table('AppSetup')->insert([
            'UserID'=>$user,
            'ThemeName'=>$theme,
            'Layouts'=>$layouts,
            'OtherOpt'=>$other_opt,
            'CreatedDate'=>$created_date,
            'UpdatedDate'=>$updated_date
            ]);
        }
        else{
            $result = DB::table('AppSetup')->where('UserID', $userID)->update([
            'ThemeName'=>$theme,
            'Layouts'=>$layouts,
            'OtherOpt'=>$other_opt,
            'CreatedDate'=>$created_date,
            'UpdatedDate'=>$updated_date
            ]);
        }
        return redirect()->back()->with('alert-success', 'Setup has been updated !');;
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
}

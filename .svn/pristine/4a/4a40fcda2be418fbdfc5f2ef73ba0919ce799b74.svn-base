<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{
    //
    // use AuthenticatesUsers;

	public function showLogin()
	{
	    // show the form
		if(Session::has('user')){
			return redirect()->back();
		}else{
			return View('login');
		}
	}

    public function doLogin(Store $session, request $request)
	{
	// validate the info, create rules for the inputs
	$request->validate([
             'email' => 'required|email',
             'password' => 'required',
             'remember_token' => 'boolean'
         ]);
	     $client = new \GuzzleHttp\Client();
         $username = $request->get('email');
         $password = $request->get('password');
         $business_app ='APP000002-TAKEN-KEY';

         $getUser = json_decode(file_get_contents('http://10.0.8.239:8888/api/ERP_GetEnterpriseUserLogin/GetErp_userlogin?UserName='.$username.'&Password='.$password.'&BusinessApp='.$business_app),true);
         //return dd($getUser);

         if(!$getUser)
         {  
            $request->session()->flash('alert-danger', 'Invalid email or password, please contact your IT administrator!');
            return back()->withInput($request->only('email', 'remember'));
         }         
         $role = $getUser[0]["BusinessRoleID"];
         $request->session()->put('user', $getUser);
         //return $role;
            switch ($role){
            case "0":
            return redirect()->route('dashboard');
            break;
            case "1":
            return redirect()->route('dashboard');
            break;
            case "2":
            return redirect()->route('home');
            break;
            case "3":
            return redirect()->route('home');
            break;
            default:
            return '/login';
            }
         
	}
    public function userLogin(Request $request){
        $request->validate([
             'email' => 'required|email',
             'password' => 'required',
             'remember_token' => 'boolean'
         ]);
        $username = $request->get('email');
        $Password = $request->get('password');
        $password = hash('SHA1', $Password);
        $business_app ='APP000002-TAKEN-KEY';
        // $username = 'sovannrath.hean@vital.com.kh';
        // $password = 'B888C1E5C5D702149DFDFFC1B2C642E61C2E27B1';
        // $business_app ='APP000002-TAKEN-KEY';
        $data = [$username,$password,$business_app];
        $user_login = DB::select('EXEC usp_UserLogin ?,?,?', $data);
        if(!$user_login)
         {  
            $request->session()->flash('alert-danger', 'Invalid email or password, please contact your IT administrator!');
            return back()->withInput($request->only('email', 'remember'));
         }         
         $role = $user_login[0]["BusinessRoleID"];
         $request->session()->put('user', $getUser);
         //return $role;
            switch ($role){
            case "0":
            return redirect()->route('dashboard');
            break;
            case "1":
            return redirect()->route('dashboard');
            break;
            case "2":
            return redirect()->route('home');
            break;
            case "3":
            return redirect()->route('user.home');
            break;
            default:
            return '/login';
            }
    }
	// app/controllers/HomeController.php
	public function doLogout(Request $request)
	{
	     // log the user out of our application
        $request->session()->flush();
	    return redirect('/'); // redirect the user to the login screen
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Session;
use Illuminate\Session\Store; 

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(Store $session, Request $request)
    {
	    $incidents = DB::table('Incident')
		    ->orderBy('Priority', 'DESC')->get();
//	    dd($incidents);
//        $data =json_encode(['incident'=>$incidents], true);
	    return view('admin.dashboard',
		    ['incidents'=>$incidents]);
        //return dd($user);
    }
}

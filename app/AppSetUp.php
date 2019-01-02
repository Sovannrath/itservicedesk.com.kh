<?php

namespace App;

use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AppSetUp extends Model
{
	protected $table = 'AppSetUp';
    public static function getAppSetup()
    {
	    $user = Session::get('user.0.UserID');
	    $Setup = DB::table('AppSetUp')->where('UserID', $user)->get();
	    if(count($Setup) == 0 ){
	    	return null;
	    }
	    return $Setup;
    }
}

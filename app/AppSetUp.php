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
        $appSetup = DB::table('AppSetup')->where('UserID', $user)->get();
        // $layout = $appSetup[0]->Layouts;
        // $layouts = json_decode($layout, true);
		
		// $fh = $layouts[0]['fh'];

		// dd($fh);
        return $appSetup;
        // return dd($appSetup);
    }
}

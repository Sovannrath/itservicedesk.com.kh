<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Province
{
    public $provinces = [];

    public static function all(){

    	$provinces = DB::select('EXEC BusinessObject_GetProvinces');
    	return $provinces;
    }


}

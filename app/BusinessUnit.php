<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BusinessUnit
{
	public $business_unit =[];
    public static function all()
    {
    	$businessUnit = DB::select('EXEC BusinessObject_GetBusinessUnits');
    	return $businessUnit;
    }
}

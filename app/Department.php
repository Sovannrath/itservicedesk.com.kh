<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department
{
    public $department = [];

    public static function all()
    {
    	$department = DB::select('EXEC BusinessObject_GetDepartments');

    	return $department;
    }
}

<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Repository
{
    public static function getLoginDetails($EmailID)
    {
        $user_detail = DB::select(DB::raw('EXEC LoginRequestDetails :EmailID'),['EmailID'=>$EmailID]);
        return response(['data'=>$user_detail], 200)->header('Content-Type', 'application/json');
    }    
}

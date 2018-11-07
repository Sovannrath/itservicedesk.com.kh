<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	use Notifiable;

    protected $table = "Operator";
    protected $primaryKey = "OperatorID";

	public $incrementing = false;

	public static function selectOperatorType($type){
		$result = DB::table('Operator')
			->join('Employee', 'Operator.Email', '=', 'Employee.Email')
			->select('Operator.OperatorID','Operator.EmployeeID', 'Employee.FirstName','Employee.LastName')
			->where('Operator.OperatorType', '=', $type)
			->get();
		return $result;
	}

	public static function getOperator(){
		$operator = Operator::where('EmployeeID', '=', '3368')->get();
		return $operator[0]->EmployeeID;
	}
	public static function getEmployeeID(){
		$EmailID = Session::get('user.0.EmailID');
		$getEmployeeID = Employee::where('Email', '=', $EmailID)->get();
		return $getEmployeeID[0]->EmployeeID;
	}

}

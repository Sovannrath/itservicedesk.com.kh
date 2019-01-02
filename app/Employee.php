<?php

namespace App;
use App\Notification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class Employee extends Model
{
    use Notifiable;

	//protected $table = 'Employee';
    public $employees =[];
    protected $table = 'Employee';
	protected $primaryKey = 'EmployeeID';


	//public $timestamps = false;

	//const CREATED_AT = 'CreatedDate';
	//const UPDATED_AT = 'UpdatedDate';



    protected $fillabled = [
    	'employee_id','business_partner_type','first_name','middle_name','last_name','gender','job_title','position','department','division','branch','manager','user_code','sale_emp_id','business_unit_id','ref_emp_id','email','extention','profile_img','work_street','work_street_no','work_block','work_zip','work_city','work_province','work_country','work_state','home_street','home_block','home_zip','home_city','home_province','home_country','home_state','remarks','admin_start_date','admin_terminate_reason','admin_duration','attach1','attach2','attach3','attach4','attach5','attach6','attach7','attach8','attach9',
    ];
    // public static function all(){
    	
    // 	$employees = DB::table('Employee')->get();
    // 	return $employees;
    // }
    public static function getEmployeeByID($EmployeeID){
        $employee = DB::table('Employee')->where('EmployeeID', $EmployeeID)->first();
        if(coount($employee)>0){
	        return $employee;
        }
        return false;
    }
    public static function getEmployeeByEmail($Email)
    {
       $employee = DB::table('Employee')->where('Email', $Email)->first();
       if(count($employee) > 0){
	       return $employee;
       }
       return false;
    }

	public static function getEmployeeName($EmployeeID){
		$result = Employee::where('EmployeeID', '=', $EmployeeID)->first();
		if(count($result) > 0){
			return $result->LastName.' '.$result->FirstName;
		}
		return false;
	}

}

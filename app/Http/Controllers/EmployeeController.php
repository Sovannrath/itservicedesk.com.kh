<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Province;
use App\BusinessUnit;
use App\Department;
use Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Mail\sendNotifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Validation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class EmployeeController extends Controller
{
    /**
    Show employee page
     */
    public function index()
    {
        $employees = DB::table('Employee')->get();
        return view('admin.employees', compact('employees'));
    }
    /**
	Show register form
     */
    public function getRegisterForm()
    {
        $employees = Employee::all();
        $provinces = Province::all();
        $business_unit = BusinessUnit::all();
        $departments = Department::all();
        //return dd($departments);
        return view('forms.registerForm', ['provinces'=>$provinces,'departments'=>$departments,'business_unit'=>$business_unit, 'employees'=>$employees]);
    }

    /**
     Show employee detail using Ajax
     */
    public function ajaxShow($emp_id){
        $data = Employee::getEmployeeByID($emp_id);
        //$data = DB::select(DB::raw('EXEC usp_Employee_SearchByID :EmployeeID'),['EmployeeID'=>$emp_id]);
        $provinces = Province::all();
        $business_unit = BusinessUnit::all();
        $departments = Department::all();
        return view('admin.ajax.showEmployeeByID', ['data'=>array($data),'provinces'=>$provinces,'business_unit'=>$business_unit,'departments'=>$departments]);
    }
    public function ajaxGetEmployee($emp_id){
    	$data = Employee::where('EmployeeID','=',$emp_id)->first();
    	return $data->LastName;
    }
	/**
	Show employee detail
	 */
	public function ShowEmployee($EmployeeID){

		$data = Employee::getEmployeeByID($EmployeeID);
		$provinces = Province::all();
		$business_unit = BusinessUnit::all();
		$departments = Department::all();
//		$employee = json_encode(['data'=>$data, 'province'=>$provinces, 'business_unit'=>$business_unit, 'departments'=>$departments], true);
//		return response($employee, 200)->header('Content-Type','Application/json');
		return view('admin.ajax.employeeDetail',['data'=>array($data),'provinces'=>$provinces,'business_unit'=>$business_unit,'departments'=>$departments]);
	}

    /**
     Save register employee
     */
    public function store(Request $request)
    {
        $EmployeeID = $request->input('employee_id');
        $BusinessPartnerType = $request->input('business_partner_type');
        $FirstName =$request->input('first_name');
        $MiddleName = $request->input('middle_name');
        $LastName = $request->input('last_name');
        $Gender = $request->input('gender');
        $JobTitle = $request->input('job_title');
        $Position = $request->input('position');
        $DepartmentID = $request->input('department');
        $DivisionID = $request->input('division');
        $Branch = $request->input('branch');
        $Manager = $request->input('manager');
        $UserCode = $request->input('user_code');
        $SalesEmployeeID = $request->input('sale_emp_id');
        $BusinessUnitID = $request->input('business_unit_id');
        $RefEmployeeID = $request->input('ref_emp_id');
        $Email = $request->input('email');
        $Extention = $request->input('extention');
        if($request->hasfile('profile_img'))
         {
            $file = $request->file('profile_img');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/user-profile', $name);
            $ProfileImage = '/img/user-profile/'.$name;
         }
         else{
            $ProfileImage = null;
         }
        $WorkStreet = $request->input('work_street');
        $WorkStreetNo = $request->input('work_street_no');
        $WorkBlock = $request->input('work_block');
        $WorkZip = $request->input('work_zip');
        $WorkCity = $request->input('work_city');
        $WorkProvince = $request->input('work_province');
        $WorkCountry = $request->input('work_country');
        $WorkState = $request->input('work_state');
        $HomeStreet = $request->input('home_street');
        $HomeBlock = $request->input('home_block');
        $HomeZip = $request->input('home_zip');
        $HomeCity = $request->input('home_city');
        $HomeProvince = $request->input('home_province');
        $HomeCountry = $request->input('home_country');
        $HomeState = $request->input('home_state');
        $Remark = $request->input('remarks');
        $AdminStartDate = $request->input('admin_start_date');
        $AdminTerminateReason = $request->input('admin_terminate_reason');
        $AdminDuration = $request->input('admin_duration');
        if($request->hasfile('attach1'))
         {
            $file1 = $request->file('attach1');
            $name1=time().$file->getClientOriginalName();
            $file1->move(public_path().'/img/attachments', $name1);
            $Attach1 = '/img/attachments/'.$name1;
         }
         else{
            $Attach1 = null;
         }
         if($request->hasfile('attach2'))
         {
            $file2 = $request->file('attach2');
            $name2=time().$file->getClientOriginalName();
            $file2->move(public_path().'/img/attachments', $name2);
            $Attach2 = '/img/attachments/'.$name2;
         }
         else{
            $Attach2 = null;
         }
         if($request->hasfile('attach3'))
         {
            $file3 = $request->file('attach3');
            $name3=time().$file->getClientOriginalName();
            $file3->move(public_path().'/img/attachments', $name3);
            $Attach3 = '/img/attachments/'.$name3;
         }
         else{
            $Attach3 = null;
         }
         if($request->hasfile('attach4'))
         {
            $file4 = $request->file('attach4');
            $name4=time().$file->getClientOriginalName();
            $file4->move(public_path().'/img/attachments', $name4);
            $Attach4 = '/img/attachments/'.$name4;
         }
         else{
            $Attach4 = null;
         }
         if($request->hasfile('attach5'))
         {
            $file5 = $request->file('attach5');
            $name5=time().$file->getClientOriginalName();
            $file5->move(public_path().'/img/attachments', $name5);
            $Attach5 = '/img/attachments/'.$name5;
         }
         else{
            $Attach5 = null;
         }
         if($request->hasfile('attach6'))
         {
            $file6 = $request->file('attach6');
            $name6=time().$file->getClientOriginalName();
            $file6->move(public_path().'/img/attachments', $name6);
            $Attach6 = '/img/attachments/'.$name6;
         }
         else{
            $Attach6 = null;
         }
         if($request->hasfile('attach7'))
         {
            $file7 = $request->file('attach7');
            $name7=time().$file->getClientOriginalName();
            $file7->move(public_path().'/img/attachments', $name7);
            $Attach7 = '/img/attachments/'.$name7;
         }
         else{
            $Attach7 = null;
         }
         if($request->hasfile('attach8'))
         {
            $file8 = $request->file('attach8');
            $name8=time().$file->getClientOriginalName();
            $file8->move(public_path().'/img/attachments', $name8);
            $Attach8 = '/img/attachments/'.$name8;
         }
         else{
            $Attach8 = null;
         }
         if($request->hasfile('attach9'))
         {
            $file9 = $request->file('attach9');
            $name9=time().$file->getClientOriginalName();
            $file9->move(public_path().'/img/attachments', $name9);
            $Attach9 = '/img/attachments/'.$name9;
         }
         else{
            $Attach9 = null;
         }
        $UserMaintains = 'OPT001';

        if( $request->isMethod('POST') )
        {
            $this->validate(
                $request,
                [
                    'employee_id' => 'required',
                    'business_partner_type' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'gender' => 'required',
                    'department' => 'required',
                    'email' => 'required|email',
                    'manager' => 'required|integer',
                    'business_unit_id' => 'required'

                ]
            );
            $userData = 
            [
        $BusinessPartnerType,$EmployeeID,$FirstName,$MiddleName,$LastName,$Gender,$JobTitle,$Position,$DepartmentID,$DivisionID,$Branch,$Manager,$UserCode,$SalesEmployeeID,$BusinessUnitID,$RefEmployeeID,$Email,$Extention,$ProfileImage,$WorkStreet,$WorkStreetNo,$WorkBlock,$WorkZip,$WorkCity,$WorkProvince,$WorkCountry,$WorkState,$HomeStreet,$HomeBlock,$HomeZip,$HomeCity,$HomeProvince,$HomeCountry,$HomeState,$Remark,$AdminStartDate,$AdminTerminateReason,$AdminDuration,$Attach1,$Attach2,$Attach3,$Attach4,$Attach5,$Attach6,$Attach7,$Attach8,$Attach9,$UserMaintains
            ];
        }
        $result = DB::statement('EXEC usp_Employee_CreateBusinessObject ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', $userData);
        if($result){
            $Email = $request->input('email');
            $this->generateLoginConfirmation($Email);
            return redirect()->back()->with('alert-success', 'Employee has been registered!');
            }
        else{
            $request->session()->flash('alert-danger', 'Cannot insert');
           return back()->withInput();
        }
    }
    public function edit($EmployeeID)
    {
        $employees = DB::select(DB::raw('EXEC usp_Employee_SearchByID :EmployeeID'),['EmployeeID'=>$EmployeeID]);
        //return dd($employees);
        $departments = Department::all();
        $provinces = Province::all();
        $business_unit = BusinessUnit::all();
        return view('admin.show-employee', compact('employees', 'departments','business_unit','provinces'));
    }
    /**
     Method update employee detail
     */
    public function update(Request $request, $EmployeeID)
    {
        $Employee = DB::select(DB::raw('EXEC usp_Employee_SearchByID :EmployeeID'),['EmployeeID'=>$EmployeeID]);
        $dir = '/img/user-profile/';
        if($request->hasFile('profile_img'))
        {
            
            if($Employee[0]->ProfileImage !== '' && File::exists(public_path().$dir, $Employee[0]->ProfileImage))
                File::delete(public_path().$Employee[0]->ProfileImage);
                $file = $request->file('profile_img');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().$dir, $name);
                $ProfileImage = $dir.$name;
        }
        elseif($request->remove == 1 && File::exists(public_path().$dir, $Employee[0]->ProfileImage))
        {
            File::delete(public_path().$Employee[0]->ProfileImage);

            $ProfileImage = null;
        }
        else{
             $ProfileImage = $Employee[0]->ProfileImage;
        }
            $BusinessPartnerType = $request->input('business_partner_type');
            $FirstName =$request->input('first_name');
            $MiddleName = $request->input('middle_name');
            $LastName = $request->input('last_name');
            $Gender = $request->input('gender');
            $JobTitle = $request->input('job_title');
            $Position = $request->input('position');
            $DepartmentID = $request->input('department');
            $DivisionID = $request->input('division');
            $Branch = $request->input('branch');
            $Manager = $request->input('manager');
            $UserCode = $request->input('user_code');
            $SalesEmployeeID = $request->input('sale_emp_id');
            $BusinessUnitID = $request->input('business_unit_id');
            $RefEmployeeID = $request->input('ref_emp_id');
            $Email = $request->input('email');
            $Extention = $request->input('extention');
            $WorkStreet = $request->input('work_street');
            $WorkStreetNo = $request->input('work_street_no');
            $WorkBlock = $request->input('work_block');
            $WorkZip = $request->input('work_zip');
            $WorkCity = $request->input('work_city');
            $WorkProvince = $request->input('work_province');
            $WorkCountry = $request->input('work_country');
            $WorkState = $request->input('work_state');
            $HomeStreet = $request->input('home_street');
            $HomeBlock = $request->input('home_block');
            $HomeZip = $request->input('home_zip');
            $HomeCity = $request->input('home_city');
            $HomeProvince = $request->input('home_province');
            $HomeCountry = $request->input('home_country');
            $HomeState = $request->input('home_state');
            $Remark = $request->input('remarks');
            $AdminStartDate = $request->input('admin_start_date');
            $AdminTerminateReason = $request->input('admin_terminate_reason');
            $AdminDuration = $request->input('admin_duration');
            $Attach1 = $request->input('attach1');
            $Attach2 = $request->input('attach2');
            $Attach3 = $request->input('attach3');
            $Attach4 = $request->input('attach4');
            $Attach5 = $request->input('attach5');
            $Attach6 = $request->input('attach6');
            $Attach7 = $request->input('attach7');
            $Attach8 = $request->input('attach8');
            $Attach9 = $request->input('attach9');
            $UserMaintains = 'OPT001';

        $userData = [$EmployeeID, $BusinessPartnerType, $FirstName, $MiddleName, $LastName, $Gender, $JobTitle, $Position, $DepartmentID, $DivisionID, $Branch, $Manager, $UserCode, $SalesEmployeeID,$BusinessUnitID,$RefEmployeeID,$Email,$Extention,$ProfileImage,$WorkStreet,$WorkStreetNo,$WorkBlock,$WorkZip,$WorkCity,$WorkProvince,$WorkCountry,$WorkState,$HomeStreet,$HomeBlock,$HomeZip,$HomeCity,$HomeProvince,$HomeCountry,$HomeState,$Remark,$AdminStartDate,$AdminTerminateReason,$AdminDuration,$Attach1,$Attach2,$Attach3,$Attach4,$Attach5,$Attach6,$Attach7,$Attach8,$Attach9,$UserMaintains
            ];
        //return dd($userData);
        $result = DB::statement('EXEC usp_Employee_UpdateBusinessObject ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', $userData);
            if($result){
                //return dd($result);
            $request->session()->flash('alert-success', 'Employee has been updated successfully !');
            return redirect('/employees');
            }
            else{
                $request->session()->flash('alert-danger', 'Cannot Update');
                return redirect()->back()->withInput();
            }
    }
    /**
     Method to delete user
     */
    public function destroy(Request $request, $EmployeeID)
    {
        $EmployeeID = $request->EmployeeID;
        $UserMaintains = 'OPT001';
        $data = [$EmployeeID, $UserMaintains];
        DB::statement('EXEC usp_Employee_DeleteBusinessObject ?,?', $data);
        $request->session()->flash('alert-success', 'User was successful added!');

        return redirect('/employees');

    }

    /****
     ****************************** Other Function **************************************

    /**
    Function to get provice detail
     */
	public function getProvince()
	{
		$province = DB::select('EXEC BusinessObject_GetProvinces');
		return $this;
	}
    /*
    Function send link email to confirm login
     */
	public function sendEmail($userData, $Email){
		Mail::to($Email)->send(new sendNotifyEmail($userData));
		return redirect()->route('employees')->with('alert-success', 'Email has been sent!');
	}

	/**
	Function generate user login detail
	 */
	public function generateLoginConfirmation($Email){
		DB::statement(DB::raw('EXEC usp_GenerateLoginConfirmation :Email'),['Email'=>$Email]);
		return $this->generateLoginEmail($Email);
		//return var_dump(DB::statament(DB::raw('usp_GenerateLoginRequest: Email', ['Email'=>$EmailID])));
	}
	/**
	Function send link email to confirm login
	 */
	public function generateLoginEmail($Email)
	{
		$userData = DB::select(DB::raw('EXEC usp_GenerateLoginEmail :Email'),['Email'=>$Email]);
		return $this->sendEmail($userData, $Email);
	}

	public function encryptLink($user_id, $request_id){
		$userID = Crypt::encrypt($user_id);
		$requestID = Crypt::encrypt($request_id);
		return $userID;
	}
	public function decryptLink($user_id){
		$userID = Crypt::decrypt($user_id);
//		$requestID = Crypt::decrypt($request_id);
		return 'UserID='.$userID;
	}
	public function confirmEmail(Request $request, $user_id, $request_id){

//		return $user_id.' & '.$request_id;
		$client = new \GuzzleHttp\Client();
		$res = $client->request('POST','http://10.0.8.239:8888/api/user/approve?UserID='.$user_id.'&RequestID='.$request_id);
//      return $res;
		if($res){
//			$request->session()->flash('alert-success', 'Your account has been confirmed successfully !');
//			return redirect()->route('login');
			return redirect()->route('login');
		}
		else{
			return 'Something went wrong';
		}
//		$checkApproval ='http://10.0.8.239:8888/api/user/approve?UserID='.$user_id.'&RequestID='.$request_id;
	}
}

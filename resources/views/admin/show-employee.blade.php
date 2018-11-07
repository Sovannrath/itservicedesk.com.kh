@extends('layouts.master')
@section('template_title')
Edit Employee
@endsection
@section('content')
@foreach($employees as $employee)
<div id="content">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title txt-color-blueDark">
          {{-- PAGE HEADER --}}
          <i class="fa-fw fa fa-home"></i>
          {{$employee->FirstName}} {{$employee->LastName}}
          <span class="pull-right" style="padding-top:0px;">
							<a href="{{url('/employees/register')}}" title="Register New Employee"><button type="button" class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-user"></i></button></a>
							<a href="#" title="Follow Up"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-flag"></i></button></a>
							<a href="#" title="Print"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-print"></i></button></a>
          </span>
        </h1>
      </div>
    </div>
	{{-- Widget ID (each widget will need unique ID)--}}
    <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
      {{-- widget div--}}
      <div>
          {{-- widget edit box --}}
          <div class="jarviswidget-editbox">
            {{-- This area used as dropdown edit box --}}
          </div>{{-- end widget edit box --}}

          {{-- widget content --}}
          <div class="widget-body" style="min-height:850px">
            <form id="register_form" class="form-horizontal" method="POST" action="/employees/edit/{{$employee->EmployeeID}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <h2>
                General Information
              </h2>
              <hr class="simple">
              <div class="col-sm-10">
              <fieldset>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">EmployeeID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->EmployeeID}}" class="form-control" name="employee_id" disabled="disabled">
                      <label class="fa fa-lock" rel="tooltip" title="Employee ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Business Partner Type</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="business_partner_type">
                        <option value="0" disabled="disabled">Select Option</option>
                          <option value="1" {{ old('business_partner_type', $employee->BusinessPartnerType) == 1 ? 'selected' : '' }}>Employee</option>
                          <option value="2" {{ old('business_partner_type', $employee->BusinessPartnerType) == 2 ? 'selected' : '' }}>Customer</option>
                          <option value="3" {{ old('business_partner_type', $employee->BusinessPartnerType) == 3 ? 'selected' : '' }}>Partner</option>
                      </select>
                      <label class="fa fa-group" rel="tooltip" title="Business Partner Type"></label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">First Name</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->FirstName}}" class="form-control" name="first_name">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Middle Name</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->MiddleName}}" class="form-control" name="middle_name">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Last Name</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->LastName}}" class="form-control" name="last_name">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Gender</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="gender">
                          <option disabled="disabled">Select Option</option>
                          <option value="M" {{ old('gender', $employee->Gender) == 'M' ? 'selected' : '' }}>Male</option>
                          <option value="F" {{ old('gender', $employee->Gender) == 'F' ? 'selected' : '' }}>Female</option>
                      </select>
                      <label class="fa fa-male" rel="tooltip" title="Gender"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Job Title</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->JobTitle}}" class="form-control" name="job_title">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Position</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->Position}}" class="form-control" name="position">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Department</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="department">
                        <option value="0" disabled="disabled">Select department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->DepartmentID}}" {{ $department->DepartmentID == $employee->DepartmentID ? 'selected': ''}}>{{$department->Description}}</option>
                        @endforeach
                      </select>
                      <label class="fa fa-building" rel="tooltip" title="Department"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Division</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="division">
                        <option value="0" disabled="">Select Division</option> 
                        <option value="ERP" {{($employee->DivisionID == 'ERP') ? 'selected' : ''}}>ERP</option>
                        <option value="NET" {{($employee->DivisionID == 'NET') ? 'selected' : ''}}>Network</option>
                        <option value="CSR" {{($employee->DivisionID == 'CSR') ? 'selected' : ''}}>CSR</option>
                        <option value="FIN" {{($employee->DivisionID == 'FIN') ? 'selected' : ''}}>Finance</option>
                      </select>
                      <label class="glyphicon glyphicon-search" rel="tooltip" title="Division"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Branch</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="branch">
                        <option value="0" disabled="disabled">Select Branch</option>
                        <option value="1" {{ $employee->Branch== 1 ? 'selected' : '' }}>Central Office</option>
                        <option value="2" {{ $employee->Branch== 2 ? 'selected' : '' }}>Kob Srov</option>
                      </select>
                      <label class="glyphicon glyphicon-search" rel="tooltip" title="Branch"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Manager</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="manager">
                        <option value="0" selected="" disabled="disabled">Select Manager</option>
                        @foreach(\App\Employee::all() as $employees)
                        <option value="{{$employees->EmployeeID}}" {{ ($employee->Manager == $employees->EmployeeID) ? 'selected' : ''}}>{{$employees->LastName}} {{$employees->FirstName}}</option>
                        @endforeach
                      </select>
                      <label class="fa fa-user" rel="tooltip" title="Manager"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">User Code</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->UserCode}}" class="form-control" name="user_code">
                      <label class="fa fa-lock" rel="tooltip" title="User Code"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Sales Employee ID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->SalesEmployeeID}}" class="form-control" name="sale_emp_id">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Business Unit ID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="business_unit_id">
                          <option value="0" disabled="disabled">Select Option</option>
                          @foreach($business_unit as $business_unit)
                          <option value="{{$business_unit->BusinessUnitID}}" {{ $business_unit->BusinessUnitID == $employee->BusinessUnitID ? 'selected' : ''}}>{{$business_unit->Description}}</option>
                          @endforeach
                      </select>
                      <label class="fa fa-institution" rel="tooltip" title="Business Unit ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Ref. Employee ID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->RefEmployeeID}}" class="form-control" name="ref_emp_id">
                      <label class="fa fa-user" rel="tooltip" title="Ref. Employee ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Email</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->Email}}" class="form-control" name="email">
                      <label class="fa fa-envelope" rel="tooltip" title="Email"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" for="prepend">Extention</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{$employee->Extention}}" class="form-control" name="extention">
                      <label class="fa fa-code" rel="tooltip" title="Extention"></label>
                    </div>
                  </div>
                </div>
              </fieldset>
              </div>{{--end col-sm-10 --}}
              <div class="col-sm-2">
                <div>
                  <center>
                    <img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="{{ isset($employee) && $employee->ProfileImage !='' ? $employee->ProfileImage : '/img/user-profile/Male.png'}} " alt="Profile Image" />
                      <div class="upload-btn-wrapper">
                      <input type="file" id="profile_img" name="profile_img" style="display:none"class="form-control"/>
                      <a href="javascript:changeProfile();">Change</a> |
                          <a style="color: red" href="javascript:removeImage()">Remove</a>
                          <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                    </div>
                </center>
              </div>
            </div>{{-- end col-sm-2 --}}
          <div class="col-sm-12">
          <h2>
            More Details
          </h2>
          <hr class="simple">
              <ul id="myTab1" class="nav nav-tabs bordered">
                <li class="active">
                  <a href="#s1" data-toggle="tab"><i class="fa fa-fw fa-building"></i>Work Address</a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-home"></i> Home Address</a>
                </li>
                <li>
                  <a href="#s3" data-toggle="tab"><i class="fa fa-fw fa-pencil"></i> Remark</a>
                </li>
                <li>
                  <a href="#s4" data-toggle="tab"><i class="fa fa-fw fa-user"></i> Administration</a>
                </li>
                <li>
                  <a href="#s5" data-toggle="tab"><i class="fa fa-fw fa-file"></i> Attachments</a>
                </li>
              </ul>
              <div id="myTabContent1" class="tab-content padding-10">
                <div class="tab-pane fade in active" id="s1">
                  <fieldset>
                    <div class="form-group col-md-4">
                      <label class="control-label col-md-4" for="prepend">Work Street</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkStreet}}" class="form-control" name="work_street">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Street No</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkStreetNo}}" class="form-control" name="work_street_no">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Block</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkBlock}}" class="form-control" name="work_block">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Zip</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkZip}}" class="form-control" name="work_zip">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work City</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkCity}}" class="form-control" name="work_city">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Province</label>
                      <div class="col-md-8">
                        <select class="form-control" name="WorkProvince">
                          <option value="0"selected="" disabled="disabled">Select Province</option>
                          @foreach($provinces as $province)
                          <option value="{{$province->ProvinceID}}"{{ $province->ProvinceID == $employee->HomeProvince ? 'selected' : '' }}>{{$province->Description}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Country</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkCountry}}" class="form-control" name="work_country">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work State</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->WorkState}}" class="form-control" name="work_state">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="tab-pane fade" id="s2">
                  <fieldset>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Street</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->HomeStreet}}" class="form-control" name="home_street">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Block</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->HomeBlock}}" class="form-control" name="home_block">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Zip</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->HomeZip}}" class="form-control" name="home_zip">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home City</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->HomeCity}}" class="form-control" name="home_city">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Province</label>
                      <div class="col-md-8">
                        <select class="form-control" name="HomeProvince">
                          <option value="0"selected="" disabled="disabled">Select Province</option>
                          @foreach($provinces as $province)
                          <option value="{{$province->ProvinceID}}">{{$province->Description}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Country</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->HomeCountry}}" class="form-control" name="home_country">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home State</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->HomeState}}" class="form-control" name="home_state">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="tab-pane fade" id="s3">
                  <fieldset>
                    <div class="form-group col-sm-12">
                        <textarea class="form-control" rows="6" name="remarks">{{$employee->Remark}}</textarea>
                    </div>
                  </fieldset>
                </div>
                <div class="tab-pane fade" id="s4">
                  <fieldset>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Admin Start Date</label>
                      <div class="col-md-8">
                        <div>
                          <input type="text" value="{{$employee->AdminStartDate}}" class="form-control" name="admin_start_date">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Admin Terminate Reason</label>
                      <div class="col-md-8">
                        <div>
                          <input type="text" value="{{$employee->AdminTerminateReason}}" class="form-control" name="admin_terminate_reason">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Admin Duration</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" value="{{$employee->AdminDuration}}" class="form-control" name="admin_duration">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="tab-pane fade" id="s5">
                  <fieldset>
                    <label class="control-label" for="prepend">Upload Attachment</label><br>
                    <ul class="list-inline">
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach1" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach2" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach3" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach4" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach5" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach6" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach7" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach8" />
                        </div>
                      </li>
                      <li>
                        <div class="upload-btn-wrapper">
                          <button class="mybtn"><i class="glyphicon glyphicon-plus"></i></button>
                          <input type="file" name="attach9" />
                        </div>
                      </li>
                    </ul>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <br/>
              <footer>
                <button type="submit" class="btn btn-primary pull-right">
                    Update
                </button>
              </footer>
              <br/>
              <br/>
            </div>
        </form>        
        </div>{{-- end widget-body --}}        
      </div>
      {{-- end widget div --}} 
    </div>{{-- end jarviswidget --}}   
     @endforeach
</div>
{{-- end content --}}
@endsection
@section('script')
<script type="text/javascript">
      runAllForms();
      $(function() {
        // Validation
        $("#register_form").validate({
          // Rules for form validation
          rules : {
            employee_id: {
              required : true,
            },
            business_partner_type: {
              required : true,
            },
            first_name : {
              required : true,
            },
            last_name : {
              required : true,
            },
            gender : {
              required : true,
            },
            department : {
              required : true,
            },
            manager : {
              required : true,
            },
            business_unit_id : {
              required : true,
            },
            email : {
              required : true,
              email : true
            },
            password : {
              required : true,
              minlength : 6,
              maxlength : 20
            }
          },

          // Messages for form validation
          messages : {
            employee_id:{
              required : 'Please enter Employee ID',
            },
            business_partner_type:{
              required : 'Please select Business Partner Type',
            },
            first_name:{
              required : 'Please Enter your first name',
            },
            last_name:{
              required : 'Please Enter your last name',
            },
            gender:{
              required : 'Please choose gender!',
            },
            department:{
              required : 'Please choose your department !',
            },
            manager:{
              required : 'Manager is required!',
            },
            business_unit_id:{
              required : 'Please choose business unit or company!',
            },
            email : {
              required : 'Please enter your email address',
              email : 'Please using domain @vital.com.kh'
            },
            password : {
              required : 'Please enter your password'
            }
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.css('color','red');
            error.insertAfter(element.parent());
          }
        });
      });
    </script>
  <script>
        function changeProfile() {
            $('#profile_img').click();
        }
        $('#profile_img').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#remove').val(0);
                }
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{url('img/user-profile/Male.png')}}');
            $('#remove').val(1);
        }
</script>
@endsection
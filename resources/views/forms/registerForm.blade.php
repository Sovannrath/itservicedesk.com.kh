@extends('layouts.master')
@section('template_title')
Register Employee
@endsection
@section('content')
<div id="content" style="margin-top:0px">
    <div class="row">
        <h1 class="page-title txt-color-blueDark">
          {{-- PAGE HEADER --}}
          <i class="fa-fw fa fa-home"></i>
          Register Employee
          <span class="pull-right" style="padding-top:0px;">
              <a href="{{url('/employees/register')}}" title="Register New Employee"><button type="button" class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-user"></i></button></a>
              <a href="#" title="Follow Up"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-flag"></i></button></a>
              <a href="#" title="Print"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-print"></i></button></a>
          </span>
        </h1>
    </div>{{-- end row--}}

    <div class="row"> 
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
            <form id="register_form" class="form-horizontal" method="POST" action="{{url('employees/register')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <h2>General Information</h2>
              <hr class="simple">
              <div class="col-sm-12 col-md-10 col-lg-10">
                <fieldset>
                  <div id="alert_message"class="flash-message" data-expires="5000">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                      @endforeach
                  </div> {{-- end .flash-message --}}
                </fieldset>
                <fieldset>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" >EmployeeID<span class="text-danger"> *</span></label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" value="{{ old('employee_id')}}" placeholder="Ex: 0001" class="form-control" name="employee_id">
                      <small class="text-danger">{{$errors->first('employee_id')}}</small>
                      <label class="fa fa-lock" rel="tooltip" title="Employee ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                  <label class="control-label col-md-4" >Business Partner Type<span class="text-danger"> *</span></label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="business_partner_type">
                          <option selected="" value="0" disabled="disabled">Select Business Partner</option>
                          <option value="1" {{ old('business_partner_type') == 1 ? 'selected' : '' }}>Employee</option>
                          <option value="2" {{ old('business_partner_type') == 2 ? 'selected' : '' }}>Customer</option>
                          <option value="3" {{ old('business_partner_type') == 3 ? 'selected' : '' }}>Partner</option>
                      </select>
                      <small class="text-danger">{{$errors->first('business_partner_type')}}</small>
                      <label class="fa fa-group" rel="tooltip" title="Business Partner Type"></label>
                    </div>
                  </div>
                </div>
              </fieldset>
                <fieldset>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >First Name<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: Sovannrath" class="form-control" name="first_name" value="{{ old('first_name')}}">
                        <small class="text-danger">{{$errors->first('first_name')}}</small>
                        <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Middle Name</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: S" class="form-control" name="middle_name" value="{{ old('middle_name')}}">
                        <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Last Name<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: Hean" class="form-control" name="last_name" value="{{ old('last_name')}}">
                        <small class="text-danger">{{$errors->first('last_name')}}</small>
                        <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Gender<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <select class="form-control" name="gender">
                            <option value="0"selected="" disabled="disabled">Select Gender</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Female</option>
                        </select>
                        <small class="text-danger">{{$errors->first('gender')}}</small>
                        <label class="fa fa-male" rel="tooltip" title="Gender"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Job Title</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: IT Programmer" class="form-control" name="job_title" value="{{ old('job_title')}}">
                        <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Position</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: IT Programmer" class="form-control" name="position" value="{{ old('position')}}">
                        <label class="fa fa-user" rel="tooltip" title="Position"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Department <span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <select class="form-control" name="department">
                          <option value="0" selected="" disabled="disabled">Select department</option>
                          @foreach($departments as $department)
                            <option value="{{$department->DepartmentID}}" {{ old('department') == $department->DepartmentID ? 'selected' : '' }}>{{$department->Description}}</option>
                          @endforeach
                        </select>
                        <small class="text-danger">{{$errors->first('department')}}</small>
                        <label class="fa fa-building" rel="tooltip" title="Department"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Division <span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <select class="form-control" name="division">
                          <option value="0" selected="" disabled="">Select Division</option>
                          <option value="ERP">ERP</option>
                          <option value="NET">Network</option>
                          <option value="CSR">CSR</option>
                          <option value="FIN">Finance</option>
                        </select>
                        <label class="fa fa-building" rel="tooltip" title="Division"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Branch<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <select class="form-control" name="branch">
                          <option value="0" disabled="disabled" selected="">Select Branch</option>
                          <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Head Office</option>
                          <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Kob Srov</option>
                        </select>
                        <label class="fa fa-building" rel="tooltip" title="Branch"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Manager<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <select class="form-control" name="manager">
                          <option selected="" value="0" disabled="disabled">Select Manager</option>
                          @foreach($employees as $employee)  
                            <option value="{{$employee->EmployeeID}}">{{$employee->LastName}} {{$employee->FirstName}}</option>
                          @endforeach
                        </select>
                        <label class="fa fa-user" rel="tooltip" title="Manager"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >User Code</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: PRO01" class="form-control" name="user_code" value="{{ old('user_code')}}">
                        <label class="fa fa-lock" rel="tooltip" title="User Code"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Sales Employee ID</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="" class="form-control" name="sale_emp_id" value="{{ old('sale_emp_id')}}">
                        <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Business Unit ID<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <select class="form-control" name="business_unit_id">
                            <option value="0"selected="" disabled="disabled">Select Option</option>
                            @foreach($business_unit as $business_unit)
                            <option value="{{$business_unit->BusinessUnitID}}" {{ old('business_unit_id') == $business_unit->BusinessUnitID ? 'selected' : '' }}>{{$business_unit->Description}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{$errors->first('business_unit_id')}}</small>
                        <label class="fa fa-institution" rel="tooltip" title="Business Unit ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Ref. Employee ID</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: VT-1582" class="form-control" name="ref_emp_id" value="{{ old('ref_emp_id')}}">
                        <label class="fa fa-user" rel="tooltip" title="Ref. Employee ID"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Email<span class="text-danger"> *</span></label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="email" placeholder="sovannrath.hean@vital.com.kh" class="form-control" name="email" value="{{ old('email')}}">
                        <small class="text-danger">{{$errors->first('email')}}</small>
                        <label class="fa fa-envelope" rel="tooltip" title="Email"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label col-md-4" >Extention</label>
                    <div class="col-md-8">
                      <div class="icon-addon addon-sm">
                        <input type="text" placeholder="Ex: 123" class="form-control" name="extention" value="{{ old('extention')}}">
                        <label class="fa fa-code" rel="tooltip" title="Extention"></label>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="col-sm-12 col-md-2 col-lg-2">
                  <center>
                    <img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="/img/user-profile/Male.png" alt="Profile Image" />
                      <div class="upload-btn-wrapper">
                      <input type="file" name="profile_img" id="image" style="display:none"class="form-control"/>
                      <a href="javascript:changeProfile();">Change</a> |
                          <a style="color: red" href="javascript:removeImage()">Remove</a>
                          <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                      {{-- <input type="file" onchange="readURL(this);" name="profile_img" />--}}
                    </div>
                </center>
              </div>
              <div class="col-sm-12">
                <h2>More Details</h2>
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
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work Street</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_street" value="{{ old('work_street')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work Street No</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_street_no" value="{{ old('work_street_no')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work Block</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_block" value="{{ old('work_block')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work Zip</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_zip" value="{{ old('work_zip')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work City</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_city" value="{{ old('work_city')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work Province</label>
                          <div class="col-md-8">
                            <select class="select2 form-control" name="WorkProvince">
                              <option value="0"selected="selected" disabled="disabled">Select Province</option>
                              @foreach($provinces as $province)
                              <option value="{{$province->ProvinceID}}">{{$province->Description}}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work Country</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_country" value="{{ old('work_country')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Work State</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="work_state" value="{{ old('work_state')}}">
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="tab-pane fade" id="s2">
                      <fieldset>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home Street</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="home_street" value="{{ old('home_street')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home Block</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="home_block" value="{{ old('home_block')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home Zip</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="home_zip" value="{{ old('home_zip')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home City</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="home_city" value="{{ old('home_city')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home Province</label>
                          <div class="col-md-8">
                            <select class="select2 form-control" name="home_province">
                              <option value="0"selected="selected" disabled="disabled">Select Province</option>
                              @foreach($provinces as $province)
                              <option value="{{$province->ProvinceID}}" {{ old('home_province') == $province->ProvinceID ? 'selected' : '' }}>{{$province->Description}}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home Country</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="home_country" value="{{ old('home_country')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Home State</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="home_state" value="{{ old('home_state')}}">
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="tab-pane fade" id="s3">
                      <fieldset>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-12">
                            <textarea class="form-control" placeholder="Enter remarks here!" rows="5" name="remarks" value="{{ old('remarks')}}"></textarea>
                            </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="tab-pane fade" id="s4">
                      <fieldset>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Admin Start Date</label>
                          <div class="col-md-8">
                            <div>
                              <input type="text" placeholder="" class="form-control" name="admin_start_date" id="datepicker" value="{{ old('admin_start_date')}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-8">
                          <label class="control-label col-md-4" >Admin Terminate Reason</label>
                          <div class="col-md-8">
                            <div>
                              <textarea class="form-control" placeholder="Enter remarks here!" rows="3" name="admin_terminate_reason" value="{{ old('admin_terminate_reason')}}"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label col-md-4" >Admin Duration</label>
                          <div class="col-md-8">
                            <div >
                              <input type="text" placeholder="" class="form-control" name="admin_duration" value="{{ old('admin_duration')}}">
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="tab-pane fade" id="s5">
                      <fieldset>
                        <label class="control-label" >Upload Attachment</label><br>
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
              </div>{{-- end col-sm-12 --}}
              <div class="col-sm-12">
                <br/>
                <footer>
                  <button type="submit" class="btn btn-primary pull-right">
                      Register
                  </button>
                </footer>
                <br/>
                <br/>
              </div>
            </form>        
          </div>{{-- end widget body --}}        
        </div>{{-- end widget div --}} 
      </div>{{-- end jarviswidget --}}
    </div>{{-- end row --}}
</div>{{-- end contents --}} 
@endsection
@section('script')
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
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
            $('#image').click();
        }
        $('#image').change(function () {
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
@extends('layouts.master')
@section('template_title')
@endsection
@section('content')
<div id="content">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title txt-color-blueDark">
          <!-- PAGE HEADER -->
          <i class="fa-fw fa fa-home"></i>
          Employee Account<span class="pull-right" style="padding-top:0px; padding-bottom: 10px;">
							<a href="{{url('/user/register')}}" title="Create Incident"><button type="button" class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-user"></i></button></a>
							<a href="{{url('/incidents/new')}}" title="Follow Up"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-flag"></i></button></a>
							<a href="{{url('/incidents/print')}}" title="Print"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-print"></i></button></a></span>
        </h1>
      </div>
    </div>
    <div class="row">
	    <div class="col-sm-12">
	        <!-- Widget ID (each widget will need unique ID)-->
	        <div class="well">
	          <div class="row">
	            <div id="">
	            	
	            	<ul id="" class="list-inline"style="height:220px; overflow-x: auto;">
	            		@foreach($employees as $employees)
	                <li><a href="#" id="{{$employees->EmployeeID}}"><div class="text-center" style="padding: 5px; border: 1px solid #eee">
	                	<img src="{{asset('img/avatars/profile.png') }}" style="margin: 5px; width: 150px; height:auto; border-radius:100px; border:5px solid #eee;" alt="me" class="" /><br>
	                	{{$employees->EmployeeID}}
	                	{{ $employees->FirstName}}
	                	{{ $employees->LastName}}<br>
	                	{{ $employees->DepartmentID}}<br>
	                	{{ $employees->Email}}<br>
	                	</div></a>
	                </li>
	                @endforeach
	            	</ul>

	            </div>
	            <!-- end col-sm-12 -->
	        	</div>
	        	<!-- end row -->
	        </div>
	        <!-- end Well -->
		</div>
		<!-- end col-sm-12 -->
	</div>
	<!-- end row -->
	<!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">

      <!-- widget div-->
      <div>
          
          <!-- widget edit box -->
          <div class="jarviswidget-editbox">
            <!-- This area used as dropdown edit box -->
            
          </div>
          <!-- end widget edit box -->
          
          <!-- widget content -->
          <div class="widget-body">
            <form id="register_form" class="form-horizontal" method="">
              <h2>
                General Information
              </h2>
              <hr class="simple">
              <div class="col-sm-10">
                <fieldset>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">EmployeeID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="EM00000001" class="form-control" name="employee_id">
                      <label class="fa fa-lock" rel="tooltip" title="Employee ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Business Partner Type</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="business_partner_type">
                          <option selected="selected" disabled="disabled">Select Option</option>
                          <option value="1">Employee</option>
                          <option value="1">Customer</option>
                          <option value="2">Partner</option>
                      </select>
                      <label class="fa fa-group" rel="tooltip" title="Business Partner Type"></label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">First Name</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: Sovannrath" class="form-control" name="first_name">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Middle Name</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: S" class="form-control" name="middle_name">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Last Name</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: Hean" class="form-control" name="last_name">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Gender</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="gender">
                          <option selected="selected" disabled="disabled">Select Option</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                      <label class="fa fa-male" rel="tooltip" title="Gender"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Job Title</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: IT Programmer" class="form-control" name="job_title">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Position</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: IT Programmer" class="form-control" name="position">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Department</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="department">
                        <option value="0" selected="" disabled="">Select department</option>
                        <option value="1">Admin</option>
                        <option value="1">Sale</option>
                        <option value="2">Marketing</option>
                        <option value="2">Finance</option>
                        <option value="2">IT</option>
                      </select>
                      <label class="fa fa-building" rel="tooltip" title="Department"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Division</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="division">
                        <option value="0" selected="selected" disabled="">Select Division</option>
                        <option value="1">ERP</option>
                        <option value="2">Network</option>
                      </select>
                      <label class="glyphicon glyphicon-search" rel="tooltip" title="Division"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Branch</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="branch">
                        <option value="0" selected="selected" disabled="disabled">Select Branch</option>
                        <option value="1">Central Office</option>
                        <option value="2">Kob Srov</option>
                      </select>
                      <label class="glyphicon glyphicon-search" rel="tooltip" title="Branch"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Manager</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="sy.kosal@vital.com.kh" class="form-control" name="manager">
                      <label class="fa fa-user" rel="tooltip" title="Manager"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">User Code</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: Code" class="form-control" name="user_code">
                      <label class="fa fa-lock" rel="tooltip" title="User Code"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Sales Employee ID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: ID" class="form-control" name="sale_emp_id">
                      <label class="fa fa-user" rel="tooltip" title="Business partner ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Business Unit ID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <select class="form-control" name="business_unit_id">
                          <option value="0"selected="selected" disabled="disabled">Select Option</option>
                          <option value="1">NVC Corporation</option>
                          <option value="1">One More Restaurant</option>
                          <option value="2">One More Limited</option>
                      </select>
                      <label class="fa fa-institution" rel="tooltip" title="Business Unit ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Ref. Employee ID</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="Ex: Ref" class="form-control" name="ref_emp_id">
                      <label class="fa fa-user" rel="tooltip" title="Ref. Employee ID"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Email</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="sovannrath.hean@vital.com.kh" class="form-control" name="email">
                      <label class="fa fa-envelope" rel="tooltip" title="Email"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <label class="control-label col-md-4" for="prepend">Extention</label>
                  <div class="col-md-8">
                    <div class="icon-addon addon-sm">
                      <input type="text" placeholder="" class="form-control"name="extention">
                      <label class="fa fa-code" rel="tooltip" title="Extention"></label>
                    </div>
                  </div>
                </div>
              </fieldset>
              </div>
              <div class="col-sm-2">
                <div><img style="width: 150px; height:150px; border: 3px solid grey; border-radius: 100%;" id="blah" src="{{asset('img/avatars/profile.png')}}" alt="your image" /></div>
                <div class="upload-btn-wrapper">
                <button class="btn btn-primary">Choose Profile Image</button>
                <input type="file" onchange="readURL(this);" name="profile_img" />
                </div>
              </div>
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
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Street</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. Name" class="form-control" name="work_street">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Street No</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_street_no">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Block</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_block">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Zip</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_zip">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work City</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_city">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Province</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_province">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work Country</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_country">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Work State</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="work_state">
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
                          <input type="text" placeholder="St. Name" class="form-control" name="home_street">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Block</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="home_block">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Zip</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="home_zip">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home City</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="home_city">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Province</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="home_province">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home Country</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="home_country">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Home State</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="home_state">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="tab-pane fade" id="s3">
                  <fieldset>
                    <div class="form-group col-sm-12">
                      <label class="control-label col-sm-3" for="prepend">Remarks</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Enter remarks here!" rows="6" name="remarks"></textarea>
                        </div>
                    </div>
                  </fieldset>
                </div>
                <div class="tab-pane fade" id="s4">
                  <fieldset>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Admin Start Date</label>
                      <div class="col-md-8">
                        <div>
                          <input type="text" placeholder="St. No" class="form-control" name="admin_start_date">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Admin Terminate Reason</label>
                      <div class="col-md-8">
                        <div>
                          <input type="text" placeholder="St. No" class="form-control" name="admin_terminate_reason">
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="control-label col-md-4" for="prepend">Admin Duration</label>
                      <div class="col-md-8">
                        <div >
                          <input type="text" placeholder="St. No" class="form-control" name="admin_duration">
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
                    Register
                </button>
              </footer>
              <br/>
              <br/>
            </div>
        </form>        
        </div>
        <!-- end widget div -->        
      </div>
      <!-- end widget --> 
    </div>     
    <!-- end widget -->   
</div>
<!-- end content -->

@endsection

<script type="text/javascript">
  
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
       

</script>
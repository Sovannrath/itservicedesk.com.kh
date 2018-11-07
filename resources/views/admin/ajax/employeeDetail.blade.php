
<!-- widget content -->
<div class="widget-body" id="Emp_Details" style="background-color: #ffffff">
	@foreach($data as $value)
	@php
	$managerID = $value->Manager;
	$manager = App\Employee::where('EmployeeID','=', $managerID)->first();
	$managerFullName = $manager->LastName.' '.$manager->FirstName;
	@endphp
	<div class="col-sm-8">
		<dl class="dl-horizontal">
			<dt>Employee ID : </dt>
			<dd><em>{{$value->EmployeeID}}</em></dd>
			<dt>Business Partner Type :</dt>
			@if($value->BusinessPartnerType == 1)
			<dd><em>Employee</em></dd>
			@elseif($value->BusinessPartnerType == 2)
			<dd><em>Customer</em></dd>
			@elseif($value->BusinessPartnerType == 3)
			<dd><em>Partner</em></dd>
			@endif
			<dt>First Name :</dt>
			<dd><em>{{$value->FirstName}}</em></dd>
			<dt>Middle Name :</dt>
			<dd><em>{{$value->MiddleName}}</em></dd>
			<dt>Last Name :</dt>
			<dd><em>{{$value->LastName}}</em></dd>
			<dt>Gender :</dt>
			@if($value->Gender == 'M')
			<dd><em>Male</em></dd>
			@elseif($value->Gender == 'F')
			<dd><em>Female</em></dd>
			@endif
			<dt>Job Title :</dt>
			<dd><em>{{$value->JobTitle}}</em></dd>
			<dt>Position :</dt>
			<dd><em>{{$value->Position}}</em></dd>
			<dt>Department :</dt>
			@foreach($departments as $department)
			@if($department->DepartmentID == $value->DepartmentID)
			<dd><em>{{$department->Description}}</em></dd>
			@endif
			@endforeach
		</dl>
		<dl class="dl-horizontal">
			<dt>Division ID : </dt>
            <dd><em>{{$value->DivisionID}}</em></dd>
			<dt>Branch :</dt>
			@if($value->Branch == '1')
			<dd><em>Head Office</em></dd>
			@elseif($value->Branch == '2')
			<dd><em>Kob Srov</em></dd>
			@endif
			<dt>Manager :</dt>
			<dd><em>{{ $managerFullName }}</em></dd>
			<dt>User Code :</dt>
			<dd><em>{{$value->UserCode}}</em></dd>
			<dt>Sales Employee ID :</dt>
			<dd><em>{{$value->SalesEmployeeID}}</em></dd>
			<dt>Business Unit ID :</dt>
			@foreach($business_unit as $business_unit)
			@if($business_unit->BusinessUnitID == $value->BusinessUnitID)
			<dd><em>{{$business_unit->Description}}</em></dd>
			@endif
			@endforeach
			<dt>Ref. Employee ID :</dt>
			<dd><em>{{$value->RefEmployeeID}}</em></dd>
			<dt>Email :</dt>
			<dd><em>{{$value->Email}}</em></dd>
			<dt>Extention :</dt>
			<dd><em>{{$value->Extention}}</em></dd>
		</dl>
	</div>
	<div class="col-sm-4">
		<div class="pull-right">
			@if($value->ProfileImage != null)
			<img src="{{$value->ProfileImage}}" style="margin: 5px; width: 150px; height:150px; border-radius:100px; border:5px solid #eee;" alt="me" class="" />
			@elseif($value->ProfileImage == 'F')
			<img style="width: 150px; height:150px; border: 3px solid grey; border-radius: 100%;" id="blah" src="{{asset('img/user-profile/Female.png')}}" alt="your image" />
			@else
			<img style="width: 150px; height:150px; border: 3px solid grey; border-radius: 100%;" id="blah" src="{{asset('img/user-profile/Male.png')}}" alt="your image" />
			@endif
			<div class="upload-btn-wrapper">
			</div>
		</div>
		<!-- Dynamic Modal -->
		<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4>Delete employee</h4>
					</div>
					<div class="modal-body">
						<h4 class="modal-title" id="myModalLabel">Do you want to delete employee ID: {{ $value->EmployeeID}}</h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancel
						</button>
						<a class="btn btn-primary" href="/employees/delete/{{$value->EmployeeID}}">Delete</a>
					</div>
				</div><!-- /.modal-content -->
			</div>
		</div>
		<!-- /.modal -->
	</div>
	<div class="col-sm-12">
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
					<dl class="dl-horizontal">
						<dt>Work Street : </dt>
						<dd><em>{{$value->WorkStreet}}</em></dd>
						<dt>Work Street No :</dt>
						<dd><em>{{$value->WorkStreetNo}}</em></dd>
						<dt>Work Block :</dt>
						<dd><em>{{$value->WorkBlock}}</em></dd>
						<dt>Work Zip :</dt>
						<dd><em>{{$value->WorkZip}}</em></dd>
						<dt>Work City :</dt>
						<dd><em>{{$value->WorkCity}}</em></dd>
						<dt>Work Province :</dt>
						@foreach($provinces as $province)
						@if($province->ProvinceID == $value->WorkProvince)
						<dd><em>{{$province->Description}}</em></dd>
						@endif
						@endforeach
						<dt>Work Country :</dt>
						<dd><em>{{$value->WorkCountry}}</em></dd>
						<dt>Work State :</dt>
						<dd><em>{{$value->WorkState}}</em></dd>
					</dl>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="s2">
				<fieldset>
					<dl class="dl-horizontal">
						<dt>Home Street : </dt>
						<dd><em>{{$value->HomeStreet}}</em></dd>
						<dt>Home Block :</dt>
						<dd><em>{{$value->HomeBlock}}</em></dd>
						<dt>Home Zip :</dt>
						<dd><em>{{$value->HomeZip}}</em></dd>
						<dt>Home City :</dt>
						<dd><em>{{$value->HomeCity}}</em></dd>
						<dt>Home Province :</dt>
						@foreach($provinces as $province)
						@if($province->ProvinceID == $value->HomeProvince)
						<dd><em>{{$province->Description}}</em></dd>
						@endif
						@endforeach
						<dt>Home Country :</dt>
						<dd><em>{{$value->HomeCountry}}</em></dd>
						<dt>Home State :</dt>
						<dd><em>{{$value->HomeState}}</em></dd>
					</dl>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="s3">
				<fieldset>
					<div class="form-group col-sm-12">
						<p>{{$value->Remark}}</p>
					</div>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="s4">
				<fieldset>
					<dl class="dl-horizontal col-sm-4">
						<dt>Admin Start Date : </dt>
						<dd><em>{{$value->AdminStartDate}}</em></dd>
					</dl>
					<dl class="dl-horizontal col-sm-4">
						<dt style="width: 50%;">Admin Terminate Reason : </dt>
						<dd><em>{{$value->AdminTerminateReason}}</em></dd>
					</dl>
					<dl class="dl-horizontal col-sm-4">
						<dt>Admin Duration : </dt>
						<dd><em>{{$value->AdminDuration}}</em></dd>
					</dl>
				</fieldset>
			</div>
			<div class="tab-pane fade" id="s5">
				<fieldset>
					@if($value->Attach1 != null)
					<label class="control-label" for="prepend"><a href="{{$value->Attach1}}">Attach1</a></label><br>
					@else
					<label class="control-label" for="prepend">No Attach File</label><br>
					@endif
				</fieldset>
			</div>
		</div>
	</div>
	@endforeach
	<div class="col-sm-12">
	</div>
</div>
<!-- end widget div -->
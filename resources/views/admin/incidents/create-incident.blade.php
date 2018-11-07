@extends('layouts.master')
@section('template_title')
Incident Management
@endsection
@section('sub_title')
Incident Creation
@endsection
@section('content')
<div id="content" style="padding-top:0px;">
	<div class="row">
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				{{-- PAGE HEADER --}}
				<i class="fa-fw fa fa-home"></i>Incident Creation
			</h1>
		</div>{{-- end col --}}

		{{-- col --}}
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <div class="pull-right">
                <a href="{{route('create.incident')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" style="color:#FF9800"></span>Create</a>
                <a href="{{route('investigate')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-question-sign img-circle" style="color:#FF9800"></span>Investigate</a>
                <a href="{{route('investigate')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-th-list img-circle" style="color:#FF9800"></span>Assign</a>
            </div>
		</div>{{-- end col --}}
	</div>{{--end row--}}
	{{-- widget grid --}}
	<section id="widget-grid" class="">
		{{-- row --}}
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget" id="" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Incident Creation Form</h2>
					</header>
					{{-- widget div--}}
					<div>
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
						</div>
						{{-- end widget edit box --}}

						{{-- widget content --}}
						<div class="widget-body">
							<form action="{{route('store.incident')}}" method="post" id="fm_incident" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}
								@php
								date_default_timezone_set("Asia/Bangkok");
								$dayToSeconds = 86400;
								$cur_date = date("Y-m-d h:i:s");
								@endphp
								<fieldset>
									<div id="alert_message"class="flash-message" data-expires="5000">
										@foreach (['danger', 'warning', 'success', 'info'] as $msg)
										@if(Session::has('alert-' . $msg))
										<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
										@endif
										@endforeach
									</div> {{-- end .flash-message --}}
									<div class="form-group">
										<label class="control-label col-md-2 col-lg-2">Subject <span class="text-danger">*</span></label>
										<div class="col-md-10 col-lg-10">
											<div class="icon-addon addon-sm">
												<input type="text" placeholder="Enter subject of your incident" style="background-color: #fafafa" class="form-control" name="subject" required="">
												<label class="fa fa-book" rel="tooltip" title="Subject"></label>
											</div>
										</div>
									</div>
                                </fieldset>
                                <fieldset>
									<div class="form-group">
										<label class="control-label col-md-2">Requested By <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
                                                <select class="form-control" name="created_by" style="background-color: #fafafa">
                                                    @php
                                                        $emailID = Session::get('user.0.EmailID');
                                                        $selectUser = App\Employee::where('Email', '=', $emailID)->first();
                                                    @endphp
                                                    @foreach(App\Employee::all() as $emp)
                                                    <option value="{{$emp->EmployeeID}}" {{ ($emp->EmployeeID == $selectUser->EmployeeID) ? 'selected' : '' }}>{{$emp->LastName}} {{$emp->FirstName}}</option>
                                                    @endforeach
                                                </select>
                                                <label class="fa fa-user" rel="tooltip" title="Created By"></label>
											</div>
										</div>
                                        <label class="control-label col-md-2">Requested Date <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <input type="text" value="{{$cur_date}}" class="form-control" name="created_date" style="background-color: #fafafa" readonly="readonly">
                                                <label class="fa fa-calendar" rel="tooltip" title="Created Date"></label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Status <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <select class="form-control " name="status" style="background-color: #fafafa">
                                                    <option value="1">Open</option>
                                                    <option value="2">Rejected</option>
                                                    <option value="3">Internal</option>
                                                    <option value="4">In Process</option>
                                                    <option value="5">In Progress</option>
                                                    <option value="6">On Hold</option>
                                                    <option value="7">Resolved</option>
                                                    <option value="8">Pending</option>
                                                    <option value="9">Re-opened</option>
                                                    <option value="10">Closed</option>
                                                </select>
                                                <label class="fa fa-tasks" rel="tooltip" title="Status"></label>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2">Impact <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <select class="form-control" name="impact" style="background-color: #fafafa">
                                                    <option value="1">Low</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">High</option>
                                                </select>
                                                <label class="fa fa-flash" rel="tooltip" title="Impact"></label>
                                            </div>
                                        </div>
									</div>
                                </fieldset>
                                <fieldset>
									<div class="form-group">
										<label class="control-label col-md-2">Urgency <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
												<select class="form-control" name="urgency" style="background-color: #fafafa">
													<option value="1">Low</option>
													<option value="2">Medium</option>
													<option value="3">High</option>
												</select>
												<label class="fa fa-fire" rel="tooltip" title="Urgency"></label>
											</div>
										</div>
                                        <label class="control-label col-md-2">Priority <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <select class="form-control" name="priority" style="background-color: #fafafa">
                                                    <option value="1">Low</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">High</option>
                                                    <option value="4">Very High</option>
                                                    <option value="5">Urgent</option>
                                                </select>
                                                <label class="fa fa-fire" rel="tooltip" title="Urgency"></label>
                                            </div>
                                        </div>
									</div>
                                </fieldset>
                                <fieldset>
									<div class="form-group">
										<label class="control-label col-md-2 col-lg-2">Description <span class="text-danger">*</span></label>
										<div class="col-md-10 col-lg-10">
											<textarea class="form-control" rows="4" name="description" style="background-color: #fafafa"></textarea>
											<small class="text-danger">{{$errors->first('description')}}</small>
										</div>
									</div>
                                </fieldset>
                                <fieldset>
									<div class="form-group">
										<label class="control-label col-md-2">Assigned To <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
												<i class="icon-append fa fa-user"></i>
                                                <select class="form-control" name="assign" style="background-color: #fafafa">
                                                    <optgroup label="Technician"></optgroup>
                                                    @foreach(App\Operator::selectOperatorType(1) as $operator)
                                                    <option value="{{ ($operator->OperatorID == 'OPT003')? 'selected': ''}}">{{ $operator->LastName}} {{ $operator->FirstName }}</option>
                                                    @endforeach
                                                    <optgroup label="Developer"></optgroup>
                                                    @foreach(App\Operator::selectOperatorType(2) as $operator)
                                                    <option value="{{ $operator->OperatorID }}">{{ $operator->LastName}} {{ $operator->FirstName }}</option>
                                                    @endforeach
                                                    <optgroup label="Service Group"></optgroup>
                                                    @foreach(App\Operator::selectOperatorType(3) as $SG)
                                                    <option value="{{ $SG->OperatorID }}">{{ $SG->LastName}} {{ $SG->FirstName }}</option>
                                                    @endforeach
                                                </select>
											</div>
										</div>
                                        <label class="control-label col-md-2">Attach files</label>
                                        <div class="col-md-4">
                                            <div class="">
                                                <a href="#" id="btn" class="btn btn-primary" onclick="chooseFile()">Attach file</a>
                                                <label id="preview"></label>
                                                <input id="attach_file" class="form-control" style="display:none; background-color: #fafafa" type="file" name="attach">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Source From <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <select class="form-control" name="source" style="background-color: #fafafa">
                                                    <option value="1">Inbound Call</option>
                                                    <option value="2" selected>Interact</option>
                                                    <option value="3">Email</option>
                                                </select>
                                                <label class="fa fa-dot-circle-o" rel="tooltip" title="Urgency"></label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
									<div class="form-group">
										<label class="control-label control-label col-md-2 col-lg-2"></label>
										<div class="checkbox col-md-10 col-lg-10">
											<div class="icon-addon addon-sm">
												<label>
													<input id="ccManager" class="" value="1" type="checkbox" name="cc_manager">CC to Manager (Optional)
												</label>
											</div>
										</div>
									</div>
                                </fieldset>
                                <fieldset>
									<div class="form-group">
										<label class="control-label col-md-2 col-lg-2"></label>
										<div class="col-md-10 col-lg-10">
											<button type="submit" class="btn btn-primary">Create</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>{{-- end widget content --}}
					</div>{{-- end widget div --}}
				</div>{{-- end widget --}}
			</article>
		</div>{{-- end row --}}
	</section>{{-- end section --}}
</div>
@endsection
@section('script')
<script src="{{asset('js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{asset('js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{asset('js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>

<script src="{{asset('js/plugin/bootstrapvalidator/bootstrapValidator.min.js') }}"></script>
<script>
    /* Validate*/
    $('#fm_incident').bootstrapValidator({
        // feedbackIcons : {
        //     valid : 'glyphicon glyphicon-ok',
        //     invalid : 'glyphicon glyphicon-remove',
        //     validating : 'glyphicon glyphicon-refresh',
        // },
        fields : {
            subject : {
                group : '.col-md-10',
                validators : {
                    notEmpty : {
                        message : 'Please input subject of your incident!'
                    },
                }
            },
            description : {
                group : '.col-md-10',
                validators : {
                    notEmpty : {
                        message : 'Please describe your incident'
                    },
                }
            }
        }
    });

    /* Upload files*/
    function chooseFile() {
        $('#attach_file').click();
    }
    $('#attach_file').change(function () {
        var imgPath = $(this)[0].value;
        var size = this.files[0].size / 1024 / 1024;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "pdf" || ext == "xls" || ext == "xlsx"|| ext == "docx" || ext == "png" || ext == "jpg" || ext == "jpeg")
        {
            if(size > 5) {
                alert("Your file is bigger than maximum 5MB.");
                this.value = "";
            }else {
                readURL(this);
                // console.log(size);
            }

        }
        else
        {
            alert("Please select file types (jpg, jpeg, png, gif, docx, xls, xlsx, pdf)")
        }
    });
    function readURL(input) {
        var file = $('input[type=file]').val();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {

                $('#preview').html('<label>'+file+'</label>');
                // $('#remove').val(0);
            }
        }
    }
    function removeImage() {
        $('#preview').attr('src', '{{url('img/user-profile/Male.png')}}');
        $('#remove').val(1);
    }

</script>
@endsection
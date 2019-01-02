@extends('layouts.master')
@section('template_title')
Incident Management
@endsection
@section('sub_title')
Incident Edition
@endsection
@section('content')

<div id="content" style="padding-top:0px;">
	<div class="row">
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				{{-- PAGE HEADER --}}
				<i class="fa-fw fa fa-home"></i>Incident Edition
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
						<h2>Incident Edition Form</h2>
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
							@foreach($incident as $Incident)
							<form id="fm_incident" action="/{{$Incident->CaseID}}/update-incident" method="post" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}

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
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-lg-2">Subject <span class="text-danger">*</span></label>
                                        <div class="col-md-10 col-lg-10">
                                            <div class="icon-addon addon-sm">
                                                <input type="text" value="{{ $Incident->Subject}}" style="background-color: #fafafa" class="form-control" name="subject">
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
                                                    @foreach(App\Employee::where('EmployeeID', '=', $Incident->EmployeeID)->get() as $emp)
                                                    <option readonly="" value="{{$emp->EmployeeID}}" {{ ($emp->EmployeeID == $Incident->EmployeeID) ? 'selected' : '' }}>{{$emp->LastName}} {{$emp->FirstName}}</option>
                                                    @endforeach
                                                </select>
                                                <label class="fa fa-user" rel="tooltip" title="Created By"></label>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2">Created Date <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <input type="text" value="{{ App\GlobalDeclare::setDateFormat($Incident->CreatedDate) }}" class="form-control" name="created_date" style="background-color: #fafafa" readonly="readonly">
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
                                                <select class="form-control " id="status" name="status" style="background-color: #fafafa">
                                                    <option value="1" {{($Incident->Status == 1)? 'selected' : ''}}>Open</option>
                                                    <option value="2" {{($Incident->Status == 2)? 'selected' : ''}}>Rejected</option>
                                                    <option value="3" {{($Incident->Status == 3)? 'selected' : ''}}>Internal</option>
                                                    <option value="4" {{($Incident->Status == 4)? 'selected' : ''}}>In Process</option>
                                                    <option value="5" {{($Incident->Status == 5)? 'selected' : ''}}>In Progress</option>
                                                    <option value="6" {{($Incident->Status == 6)? 'selected' : ''}}>On Hold</option>
                                                    <option value="7" {{($Incident->Status == 7)? 'selected' : ''}}>Resolved</option>
                                                    <option value="8" {{($Incident->Status == 8)? 'selected' : ''}}>Pending</option>
                                                    <option value="9" {{($Incident->Status == 9)? 'selected' : ''}}>Re-opened</option>
                                                    <option value="10" {{($Incident->Status == 10)? 'selected' : ''}}>Closed</option>
                                                </select>
                                                <label class="fa fa-tasks" rel="tooltip" title="Status"></label>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2">Impact <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <select class="form-control" name="impact" style="background-color: #fafafa">
                                                    <option value="1" {{ ($Incident->Impact == 1) ? 'selected' : '' }}>Low</option>
                                                    <option value="2" {{ ($Incident->Impact == 2) ? 'selected' : '' }}>Medium</option>
                                                    <option value="3" {{ ($Incident->Impact == 3) ? 'selected' : '' }}>High</option>
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
                                                    <option value="1" {{ ($Incident->Urgency == 1) ? 'selected' : '' }}>Low</option>
                                                    <option value="2" {{ ($Incident->Urgency == 2) ? 'selected' : '' }}>Medium</option>
                                                    <option value="3" {{ ($Incident->Urgency == 3) ? 'selected' : '' }}>High</option>
                                                </select>
                                                <label class="fa fa-fire" rel="tooltip" title="Urgency"></label>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2">Priority <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <select class="form-control" name="priority" style="background-color: #fafafa">
                                                    <option value="1" {{ ($Incident->Priority == 1) ? 'selected' : '' }}>Low</option>
                                                    <option value="2" {{ ($Incident->Priority == 2) ? 'selected' : '' }}>Medium</option>
                                                    <option value="3" {{ ($Incident->Priority == 3) ? 'selected' : '' }}>High</option>
                                                    <option value="4" {{ ($Incident->Priority == 4) ? 'selected' : '' }}>Very High</option>
                                                    <option value="5" {{ ($Incident->Priority == 5) ? 'selected' : '' }}>Urgent</option>
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
                                            <textarea class="form-control" rows="4" name="description" style="background-color: #fafafa">{{ $Incident->Description}}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-lg-2">Comment</label>
                                        <div class="col-md-8 col-lg-10">
                                            <textarea class="form-control" rows="3" name="comment" style="background-color: #fafafa;">{{ $Incident->Comment}}</textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset id="rejected" hidden>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-lg-2">Reason for rejected <span class="text-danger">*</span></label>
                                        <div class="col-md-8 col-lg-10">
                                            <textarea class="form-control" rows="3" name="reason" style="background-color: #fafafa;"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Assigned To <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <div class="icon-addon addon-sm">
                                                <i class="icon-append fa fa-user"></i>
                                                <input type="text" class="form-control"  value="{{ App\Employee::getEmployeeName($Incident->AssignedTo) }}" name="assign" style="background-color: #fafafa" readonly>
                                            </div>
                                        </div>
                                        <label class="control-label col-md-2">Attach files</label>
                                        <div class="col-md-4">
                                            <div class="">
                                                <a href="#" id="btn" class="btn btn-primary" onclick="chooseFile()">Attach file</a>
                                                <label id="preview">{{$Incident->AttachFile}}</label>
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
                                                    <option value="1" {{($Incident->SourceFrom == 1) ? 'selected' : ''}}>Inbound Call</option>
                                                    <option value="2" {{($Incident->SourceFrom == 2) ? 'selected' : ''}}>Interact</option>
                                                    <option value="3" {{($Incident->SourceFrom == 3) ? 'selected' : ''}}>Email</option>
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
                                                    <input class="" value="1" {{ ($Incident->CcManager == 1) ? 'checked' : '' }} type="checkbox" name="cc_manager">CC to Manager (Optional)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
									<div class="form-group col-sm-12 col-md-12 col-lg-12">
										<label class="control-label col-md-2 col-lg-2"></label>
										<div class="col-md-10 col-lg-10">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</div>
								</fieldset>
							</form>
							@endforeach
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
$(document).ready(function() {
    $('#fm_incident').bootstrapValidator({
        // feedbackIcons: {
        //     valid: 'glyphicon glyphicon-ok',
        //     invalid: 'glyphicon glyphicon-remove',
        //     validating: 'glyphicon glyphicon-refresh'
        // },
        fields: {
            subject: {
                group: '.col-md-10',
                validators: {
                    notEmpty: {
                        message: 'Please input subject of your incident!'
                    },
                }
            },
            description: {
                group: '.col-md-10',
                validators: {
                    notEmpty: {
                        message: 'Please describe your incident'
                    },
                }
            }
        }
    });
});
</script>
<script>
    $('#status').change(function () {
        var status = document.getElementById('status').value;
        console.log(status);

        if(status == 2){
            $('#rejected').removeAttr('hidden');
            console.log(status);
        }
        else{
            $('#rejected').attr('hidden');
        }
        console.log(status);
    });
    function chooseFile() {
        $('#attach_file').click();
    }

    $('#attach_file').change(function () {
        var imgPath = $(this)[0].value;
        var size = this.files[0].size / 1024 / 1024;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "pdf" || ext == "xls" || ext == "xlsx" || ext == "docx" || ext == "png" || ext == "jpg" || ext == "jpeg") {
            if (size > 5) {
                alert("Your file is bigger than maximum 5MB.");
                this.value = "";
            } else {
                readURL(this);
                // console.log(size);
            }

        }
        else {
            alert("Please select file types (jpg, jpeg, png, gif, docx, xls, xlsx, pdf)");
            this.value = "";
        }
    });

    function readURL(input) {
        var file = $('input[type=file]').val();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {

                $('#preview').html('<label>' + file + '</label>');
                // $('#remove').val(0);
            }
        }
    }
</script>
@endsection
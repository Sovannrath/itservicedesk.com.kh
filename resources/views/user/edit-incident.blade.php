@extends('layouts.user-master')
@section('page_title')
IT Service Desk
@endsection
@section('sub_title')
Edit Incident
@endsection
@section('content')

<div id="content" style="margin-top:0px">
	<div class="row">
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				{{-- PAGE HEADER --}}
				<i class="fa-fw fa fa-home"></i>Edit Incident
			</h1>
		</div>{{-- end col --}}

		{{-- col --}}
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<div class="pull-right">
				<a href="{{route('incident.create')}}" title="New Incident"><button type="button" class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-plus-sign"></i></button>
					<a href="#" title="Follow Up"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-flag"></i></button></a>
					<a href="#" title="Print"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-print"></i></button></a>
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
						<h2>Form edit incident</h2>
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
							<form action="/user/incident/{{ $Incident->CaseID}}/update" method="post" id="fm_incident" class="form-horizontal" enctype="multipart/form-data">
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
									<div class="form-group col-sm-12 col-md-12 col-lg-12">
										<label class="control-label col-md-4 col-lg-2">Subject <span class="text-danger">*</span></label>
										<div class="col-md-8 col-lg-10">
											<div class="icon-addon addon-sm">
												<input type="text" value="{{ $Incident->Subject}}" style="background-color: #fafafa" class="form-control" name="subject" required="">
												<label class="fa fa-book" rel="tooltip" title="Subject"></label>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Created By <span class="text-danger">*</span></label>
										<div class="col-md-8">
											<div class="icon-addon addon-sm">
												<input type="text" value="{{ App\GlobalDeclare::getEmployeeName($Incident->EmployeeID)}}" class="form-control" style="background-color: #fafafa"name="created_by" readonly>
												<label class="fa fa-user" rel="tooltip" title="Created By"></label>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Created Date <span class="text-danger">*</span></label>
										<div class="col-md-8">
											<div class="icon-addon addon-sm">
												<input type="text" value="{{$cur_date}}" class="form-control" name="created_date" style="background-color: #fafafa" readonly="readonly">
												<label class="fa fa-calendar" rel="tooltip" title="Created Date"></label>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Status <span class="text-danger">*</span></label>
										<div class="col-md-8">
                                            <div class="icon-addon addon-sm">
                                                <input class="form-control" type="text" name="status" value="Open" style="background-color: #fafafa" readonly>
                                                <label class="fa fa-tasks" rel="tooltip" title="Status"></label>
                                            </div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Impact <span class="text-danger">*</span></label>
										<div class="col-md-8">
											<div class="icon-addon addon-sm">
												<select class="form-control" name="impact" style="background-color: #fafafa" disabled="">
													<option value="1" {{ ($Incident->Impact == 1) ? 'selected' : '' }}>Low</option>
													<option value="2" {{ ($Incident->Impact == 2) ? 'selected' : '' }}>Medium</option>
													<option value="3" {{ ($Incident->Impact == 3) ? 'selected' : '' }}>High</option>
												</select>
												<label class="fa fa-flash" rel="tooltip" title="Impact"></label>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Urgency <span class="text-danger">*</span></label>
										<div class="col-md-8">
											<div class="icon-addon addon-sm">
												<select class="form-control" name="urgency" style="background-color: #fafafa" disabled="">
													<option value="1" {{ ($Incident->Urgency == 1) ? 'selected' : '' }}>Low</option>
													<option value="2" {{ ($Incident->Urgency == 2) ? 'selected' : '' }}>Medium</option>
													<option value="3" {{ ($Incident->Urgency == 3) ? 'selected' : '' }}>High</option>
												</select>
												<label class="fa fa-fire" rel="tooltip" title="Urgency"></label>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-12">
										<label class="control-label col-md-4 col-lg-2">Description <span class="text-danger">*</span></label>
										<div class="col-md-8 col-lg-10">
											<textarea class="form-control" rows="4" name="description" style="background-color: #fafafa">{{ $Incident->Description}}</textarea>
											<small class="text-danger">{{$errors->first('description')}}</small>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Assign to :</label>
										<div class="col-md-8">
											<div class="icon-addon addon-sm">
												<i class="icon-append fa fa-user"></i>
												<input type="text" name="assign" style="background-color: #fafafa" class="form-control" value="OP001" disabled="">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-6">
										<label class="control-label col-md-4">Attach files</label>
										<div class="col-md-8">
											<div class="">
												<a href="#" id="btn" class="btn btn-primary" onclick="chooseFile()">Attach file</a>
												<label id="preview">{{$Incident->AttachFile}}</label>
												<input id="attach_file" class="form-control" style="display:none; background-color: #fafafa" type="file" name="attach">
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-12">
										<label class="control-label control-label col-md-4 col-lg-2"></label>
										<div class="checkbox col-md-8 col-lg-10">
											<div class="icon-addon addon-sm">
												<label>
													<input class="" value="1" {{($Incident->CcManager == 1) ? 'checked' : '' }} type="checkbox" name="cc_manager">CC to Manager (Optional)
												</label>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-12 col-md-12 col-lg-12">
										<label class="control-label col-md-4 col-lg-2"></label>
										<div class="col-md-8 col-lg-10">
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
<script src="{{asset('UserSite/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>

<script src="{{asset('UserSite/js/plugin/bootstrapvalidator/bootstrapValidator.min.js') }}"></script>
<script>
    $('#fm_incident').bootstrapValidator({
        // feedbackIcons : {
        // 	valid : 'glyphicon glyphicon-ok',
        // 	invalid : 'glyphicon glyphicon-remove',
        // 	validating : 'glyphicon glyphicon-refresh'
        // },
        fields : {
            subject : {
                group : '.col-md-8',
                validators : {
                    notEmpty : {
                        message : 'Please input subject of your incident!'
                    },
                }
            },
            description : {
                group : '.col-md-8',
                validators : {
                    notEmpty : {
                        message : 'Please describe your incident'
                    },
                }
            }
        }
    });
</script>
<script>
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
                console.log(size);
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
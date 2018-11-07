@extends('layouts.master')
@section('template_title')
Incident Management
@endsection
@section('sub_title')
Ticket Creation
@endsection
@section('content')
<div id="content" style="padding-top:0px;">
	<div class="row">
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				{{-- PAGE HEADER --}}
				<i class="fa-fw fa fa-home"></i>Ticket Creation
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
						<h2>Ticket Creation Form</h2>
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
							<form action="{{route('ticket.store')}}" method="post" id="fm_incident" class="form-horizontal" enctype="multipart/form-data">
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
										<label class="control-label col-md-2 col-lg-2">Ticket Number <span class="text-danger">*</span></label>
										<div class="col-md-4 col-lg-4">
											<div class="icon-addon addon-sm">
												<input type="text" value="TS0001" readonly style="background-color: #fafafa" class="form-control" name="subject">
												<label class="fa fa-key" rel="tooltip" title="Subject"></label>
											</div>
										</div>
										<label class="control-label col-md-2 col-lg-2">Investigate Number <span class="text-danger">*</span></label>
										<div class="col-md-4 col-lg-4">
											<div class="icon-addon addon-sm">
												<input type="text" value="INV0001" style="background-color: #fafafa" class="form-control" name="subject" required="">
												<label class="fa fa-key" rel="tooltip" title="Subject"></label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Company <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
												<select class="form-control" name="created_by" style="background-color: #fafafa">
													<option value="1">NVC</option>
												</select>
												<label class="fa fa-building" rel="tooltip" title="Created By"></label>
											</div>
										</div>
										<label class="control-label col-md-2">Responsible Dept <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
												<select class="form-control" name="created_by" style="background-color: #fafafa">
													<option value="1">Network</option>
													<option value="1">ERP</option>
												</select>
												<label class="fa fa-building" rel="tooltip" title="Created By"></label>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group">
										<label class="control-label col-md-2 col-lg-2">Comment <span class="text-danger">*</span></label>
										<div class="col-md-10 col-lg-10">
											<textarea class="form-control" rows="4" name="description" style="background-color: #fafafa"></textarea>
											<small class="text-danger">{{$errors->first('description')}}</small>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group">
										<label class="control-label col-md-2">Created Date <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
												<input type="text" readonly value="27/10/2018" style="background-color: #fafafa" class="form-control" name="subject" required="">
												<label class="fa fa-calendar" rel="tooltip" title="Subject"></label>
											</div>
										</div>
										<label class="control-label col-md-2">Status <span class="text-danger">*</span></label>
										<div class="col-md-4">
											<div class="icon-addon addon-sm">
												<select class="form-control" name="created_by" style="background-color: #fafafa">
													<option value="1">Open</option>
													<option value="2">Closed</option>
												</select>
												<label class="fa fa-tasks" rel="tooltip" title="Created By"></label>
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
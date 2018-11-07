@php
use Carbon\Carbon;
@endphp
@extends('layouts.master')
@section('template_title')
Investigation Creation
@endsection
@section('sub_title')
Investigation Creation
@endsection

@section('style_css')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('dist/jquery-confirm.min.css') }}">
@endsection
@section('content')
<div id="content" style="padding-top:0px;">
    <div class="row">
        {{-- col --}}
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                {{-- PAGE HEADER --}}
                <i class="fa-fw fa fa-home"></i>Investigation Creation
            </h1>
        </div>{{-- end col --}}

        {{-- col --}}
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <div class="pull-right">
                <a href="{{route('create.incident')}}" title="New Investigation" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" style="color:#FF9800"></span>Create</a>
                <a href="{{route('investigate')}}" title="Investigation" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-question-sign img-circle" style="color:#FF9800"></span>Investigate</a>
                <a href="{{route('investigate')}}" title="Assign Ticket" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-th-list img-circle" style="color:#FF9800"></span>Assign</a>
            </div>
        </div>{{-- end col --}}
    </div>{{--end row--}}

    {{-- widget grid --}}
    <section id="widget-grid" class="">
      {{-- row --}}
      <div class="row">
        {{-- NEW WIDGET START --}}
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          {{-- Widget ID (each widget will need unique ID)--}}
          <div class="jarviswidget" id="" data-widget-editbutton="false" data-widget-deletebutton="false">
            <header>
              <span class="widget-icon"> <i class="fa fa-crosshairs"></i> </span>
              <h2>Investigation Creation Form</h2>
            </header>
            <div class="widget-body">
                <form class="form-horizontal" id="fm_investigate">
                    {{ csrf_field() }}
                    <fieldset style="border: 1px dashed #EEE9E9; padding: 10px; margin:10px">
                        <div class="form-group">
                            <label class="control-label col-md-2">Incident N<sup>o</sup> <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <div class="icon-addon addon-sm">
                                    <select class="form-control select2" id="select_case" name="case_id">
                                        <option value="" disabled selected>Please select Incident Number</option>
                                        @foreach(App\Incident::all() as $incident)
                                        <option value="{{ $incident->CaseID }}">{{$incident->CaseID}} - {{$incident->Subject}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fa fa-key" rel="tooltip" title="Case ID"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="inc_detail">

                        </div>
                        <div id="success-alert"></div>
                    </fieldset>
                    <div style="border: 1px dashed #EEE9E9; padding: 10px; margin:10px">
                        <fieldset>
                            <div class="form-group">
                                <label class="control-label col-md-2">Investigate ID <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <input type="text" readonly value="{{$investigate}}" style="background-color: #fafafa" class="form-control" id="inv_id" name="inv_id" required="">
                                        <label class="fa fa-key" rel="tooltip" title="Investigate ID"></label>
                                    </div>
                                </div>
                                <label class="control-label col-md-2">Investigate Name <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <input type="text" id="inv_name" placeholder="Investigation name" style="background-color: #fafafa" class="form-control" name="name">
                                        <label class="fa fa-question-circle" rel="tooltip" title="Investigate Name"></label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="control-label col-md-2">Website</label>
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <input type="text" placeholder="ex. https://www.google.com?..." style="background-color: #fafafa" class="form-control" name="website" id="website">
                                        <label class="fa fa-globe" rel="tooltip" title="Website"></label>
                                    </div>
                                </div>
                                <label class="control-label col-md-2">Source</label>
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <input type="text" placeholder="ex. Ebook, YouTube" style="background-color: #fafafa" class="form-control" name="source" id="source">
                                        <label class="fa fa-file" rel="tooltip" title="Source"></label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="control-label col-md-2">Status</label>
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <select class="form-control" style="background-color: #fafafa" name="status" id="status">
                                            <option value="1">Open</option>
                                            <option value="0">Closed</option>
                                        </select>
                                        <label class="fa fa-tasks" rel="tooltip" title="Status"></label>
                                    </div>
                                </div>
                                <label class="control-label col-md-2">Created Date</label>
                                @php
                                $date = Carbon::now();
                                @endphp
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <input type="text" readonly value="{{$date}}" style="background-color: #fafafa" class="form-control" name="inv_date" id="inv_date">
                                        <label class="fa fa-calendar" rel="tooltip" title="Date"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Remote Desktop IP</label>
                                <div class="col-md-4">
                                    <div class="icon-addon addon-sm">
                                        <input type="text" value="10.0.3.196" style="background-color: #fafafa" class="form-control" name="remote_pc" id="remote_pc">
                                        <label class="fa fa-desktop" rel="tooltip" title="Remote Desktop ID"></label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="show_step" style="border: 1px dashed #EEE9E9; padding: 10px; margin:10px">
                        <a href="#" title="Add step" id="add" class="btn btn-xs btn-default"><i class="fa fa-plus"></i> Add Step</a>
                        <div id="load-table" style="margin-top: 10px">

                        </div>
                        <fieldset>
                                <div class="form-group" style="margin-top: 10px">
                                    <div class="col-sm-12">
                                        <button type="button" id="save" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                </form>
            </div>
          </div>{{-- end jarviswidget --}}
        </article>{{-- WIDGET END --}}
      </div>{{-- end row --}}
    </section>
</div>{{-- end content --}}
@endsection
@section('script')
  @include('admin.scripts.dataTable')
<script src="{{asset('dist/jquery-confirm.min.js') }}"></script>
<script src="{{asset('js/plugin/select2/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#load-table').load('/ajax/inv-line', function () {
            var table = $('#tbl_investigate').DataTable({
                paging: false,
                searching:false,
                info:false,
                ordering:false,
                scrollX:true,
            });

            $('#tbl_investigate').on('click','#tr_investigate #inv_edit', function () {
                var id=$(this).attr("data-id");
                $.confirm({
                    title:'Edit step',
                    content: 'url:/ajax/inv-line/new',
                    type: 'blue',
                    buttons: {
                        Update:{
                            text:'Update',
                            btnClass: 'btn btn-blue',
                            action: function () {
                                
                            }
                        },
                        Cancel: function () {
                            
                        }
                    }

                });

            });

            // Remove
            $('#tbl_investigate').on('click','#tr_investigate #inv_remove', function () {
                var id=$(this).attr("data-id");
                $.confirm({
                    title:false,
                    content: 'Do you want to delete?',
                    type: 'red',
                    closeIcon: true,
                    buttons: {
                        Delete:{
                            text:'Delete',
                            btnClass: 'btn-red',
                            action: function () {
                                $.ajax({
                                    url:'/ajax/inv-line/delete/'+id,
                                    type: 'get',
                                    data: 'step_id='+id,
                                    success: function () {
                                        $('#load-table').load('/ajax/inv-line');
                                    },
                                    complete: function () {
                                        $('#load-table').load('/ajax/inv-line');
                                    }
                                })
                            }
                        }
                    }

                });

            });

        });
        $('#save').click(function () {
            var inv_id = $('#inv_id').val();
            var case_id = $('#select_case').val();
            var inv_name = $('#inv_name').val();
            var website = $('#website').val();
            var source = $('#source').val();
            var status = $('#status').val();
            var remote_pc = $('#remote_pc').val();
            // $.alert(remote_pc);
            if(!case_id){
                $.dialog({
                    title:false,
                    type: 'red',
                    content:'Please select <strong>Incident N<sup>o</sup> </strong>!',
                    animation: 'scale',
                    animateFromElement: false,
                    buttons: {
                        Close: {
                            text: 'Close',
                            btnClass: 'btn-default',
                            action: function(){
                            }
                        }
                    }
                });
            }else if(!inv_name){
                $.dialog({
                    title:false,
                    type: 'red',
                    content:'Please input <strong>Investigate Name </strong>!',
                    animation: 'scale',
                    animateFromElement: false,
                    buttons: {
                        Close: {
                            text: 'Close',
                            btnClass: 'btn-default',
                            action: function(){
                            }
                        }
                    }
                });
            }else{
                $.ajax({
                    type: 'POST',
                    url: '{{url("/ajax/investigate/save")}}',
                    data: "case_id=" + case_id + "&inv_id=" + inv_id + "&name=" + inv_name + "&website=" +website+ "&source=" +source+ "&status=" +status+ "&remote_pc=" +remote_pc,
                    success: function() {
                        $.smallBox({
                            title : "Your investigate has been created successfully!",
                            content : "<i class='fa fa-clock-o'></i> <i>{{Carbon::now()->format('d / m / Y h:s A')}}</i>",
                            color : "#97c51b",
                            iconSmall : "fa fa-bell bounce animated",
                            timeout : 4000
                        });
                    },
                    error: function () {
                        $.smallBox({
                            title : "Something went wrong, please try again!",
                            content : "<i class='fa fa-clock-o'></i> <i>{{Carbon::now()->format('d / m / Y h:s A')}}</i>",
                            color : "#990009",
                            iconSmall : "fa fa-bell bounce animated",
                            timeout : 4000
                        });
                    }
                })
            }
        });
        $('#add').click(function () {
            var case_id = $('#select_case').val();
            if(!case_id)
                $.dialog({
                    title:false,
                    type: 'red',
                    content:'Please select <strong>Incident N<sup>o</sup> </strong>!',
                    animation: 'scale',
                    animateFromElement: false,
                    buttons: {
                        Close: {
                            text: 'Close',
                            btnClass: 'btn-default',
                            action: function(){
                            }
                        }
                    }
                })
            else
            $.confirm({
                title: 'Add step',
                type: 'blue',
                content: 'url:/ajax/inv-line/new',
                columnClass: 'col-md-6 col-md-offset-4',
                animation: 'scale',
                animateFromElement: false,
                buttons: {
                    Add: {
                        text: 'Add',
                        btnClass: 'btn btn-primary',
                        action: function () {
                            var inv_id = '{{$investigate}}';
                            var description = this.$content.find('#description').val();
                            var reference = this.$content.find('#reference').val();
                            var comment = this.$content.find('#comment').val();
                            var status = this.$content.find('#status').val();
                            $.ajax({
                                type: 'POST',
                                url: '/ajax/inv-line/save',
                                data: "description="+ description +"&reference="+ reference + "&comment="+ comment +"&status="+ status +"&inv_id=" +inv_id,
                                success: function () {
                                    $('#load-table').load('/ajax/inv-line');
                                },
                                error: function () {
                                    $.alert('Something went wrong!');
                                }
                            })
                        }

                    },
                    Cancel: function () {
                        //close
                    }

                }
            });
        });


        $('#select_case').change(function () {
            var case_id = $(this).val();
            console.log(case_id);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '/ajax/incidents/show/' + case_id,
                data: 'case_id'+case_id,
                success: function (data) {
                    var getData = JSON.parse(data);
                    $('#inc_detail').html('' +
                        '<div class="col-md-offset-2 col-md-10"> '+
                        '<ul class="list-unstyled">' +
                        '<li><div class="col-md-3"><i class="fa fa-book"></i> Subject </div><div class="col-md-9"> '+ getData["data"][0].Subject +'</div></li>'+
                        '<li><div class="col-md-3"><i class="fa fa-pencil"></i> Description </div><div class="col-md-9">'+ getData["data"][0].Description +'</div></li>'+
                        '<li><div class="col-md-3"><i class="fa fa-user"></i> Requested By </div><div class="col-md-9">'+ getData["data"][0].EmployeeID +'</div></li>'+
                        '<li><div class="col-md-3"><i class="fa fa-calendar"></i> Requested Date </div><div class="col-md-9">'+ getData["data"][0].CreatedDate +'</div></li>'+
                        '</ul>'+
                        '</div>'
                    );
                }
            })
        })
    });
</script>
@endsection
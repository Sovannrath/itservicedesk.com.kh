@extends('layouts.master')
@section('template_title')
Incident Management
@endsection
@section('content')
@section('style_css')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('dist/jquery-confirm.min.css') }}">
<style>
    table td{
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .product-image-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: none;
    }

    .product-image-overlay .product-image-overlay-close {
        display: block;
        position: absolute;
        top: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid #eee;
        line-height: 35px;
        font-size: 20px;
        color: #eee;
        text-align: center;
        cursor: pointer;
    }

    .product-image-overlay img {
        width: auto;
        max-width: 80%;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>
@endsection
<div id="content" style="padding-top:0px;">
  <div class="row">
    {{-- col --}}
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
      <h1 class="page-title txt-color-blueDark">
          {{-- PAGE HEADER --}}
          <i class="fa-fw fa fa-home"></i>Incident Management
      </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <div class="pull-right">
            <a href="{{route('create.incident')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" style="color:#FF9800"></span>Create</a>
            <a href="{{route('investigate')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-question-sign img-circle" style="color:#FF9800"></span>Investigate</a>
            <a href="{{route('investigate')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-th-list img-circle" style="color:#FF9800"></span>Assign</a>
        </div>
    </div>
    {{-- end col --}}
  </div>

    {{-- widget grid --}}
        <section id="widget-grid" class="">
          {{-- row --}}
          <div class="row">
            {{-- List Incidents --}}
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              {{-- Widget ID (each widget will need unique ID)--}}
              <div class="jarviswidget" id="" data-widget-editbutton="false" data-widget-deletebutton="false">
                <header>
                  <span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
                  <h2>All Incidents </h2>
                </header>
                {{-- widget div--}}
                <div>
                  {{-- widget edit box --}}
                  <div class="jarviswidget-editbox">
                    {{-- This area used as dropdown edit box --}}
                    <input class="form-control" type="text">  
                  </div>{{-- end widget edit box --}}

                  {{-- widget content --}}
                  <div class="widget-body no-padding">
                    <table class="table-bordered table-striped table-condensed display" id="incidents_tbl" width="100%">
                      <thead>
                      <tr>
                      <th width="40"></th>
                      <th data-hide="phone">CaseID</th>
                      <th data-hide="phone">Subject</th>
                      <th data-class="expand">Description</th>
                      <th data-hide="phone,tablet">Status</th>
                      <th data-hide="phone,tablet">Priority</th>
                      <th data-hide="phone,tablet">Created Date</th>
                      <th data-hide="phone,tablet">Attachments</th>
                    </tr>
                    </thead>
                    </table>  
                  </div>{{-- end widget content --}}
                </div>{{-- end widget div --}}
              </div>{{-- end jarviswidget --}}

              <div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                <header>
                  <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                  <h2>Operator Management </h2>        
                </header>
                {{-- widget div--}}
                <div>
                  {{-- widget edit box --}}
                  <div class="jarviswidget-editbox">
                    {{-- This area used as dropdown edit box --}}
                    <input class="form-control" type="text">  
                  </div>{{-- end widget edit box --}}

                  {{-- widget content --}}
                  <div class="widget-body">
                    <div class="col-md-3">
                      <span> {{--User image size is adjusted inside CSS, it should stay as is --}}
                        <img src="{{asset('img/user-profile/Male.png') }}" style="width: 150px; height:auto; border-radius:100px; border:5px solid #eee;" alt="me" class=""/>
                      </span>
                      <table class="table" style="margin-top:20px">
                        <tr><td>Operator ID</td><td>: OPT0001</td></tr>
                        <tr><td>Name</td><td>: Sy Kosal</td></tr>
                        <tr><td>Position</td><td>: ERP Project</td></tr>
                      </table>

                    </div>
                    <div class="col-md-9">
                        <div class="" style="padding-bottom:5px;">
                          <div style="float:left">Description</div>
                          <div style="float:right">Completion</div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-6">
                            <dl class="dl-horizontal">
                              <dt>Incident ID : </dt>
                              <dd>CASE0000001</dd>
                              <dt>Subject :</dt>
                              <dd>Network</dd>
                              <dt>Description : </dt>
                              <dd>My internet Connection is Error</dd>
                              <dt>Created Date :</dt>
                              <dd>15-June-2018</dd>
                              <dt>Updated Date :</dt>
                              <dd>29-June-2018</dd>
                              <dt>Status :</dt>
                              <dd>In-Progress</dd>
                            </dl>
                          </div>

                          <div class="col-sm-6">
                            
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="well well-sm well-light">
                              <h4 class="txt-color-blue">Active<a href="#" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                              <br>
                              <div class="text-center">
                                <div style="font-size:50px;" class="txt-color-blue display-inline">

                                </div>
                              </div>
                              <hr class="simple">
                              <a href="#">More information</a>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="well well-sm well-light">
                              <h4 class="txt-color-blue">Reject<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                              <br>
                              <div class="text-center">
                                <div style="font-size:50px;" class="txt-color-blue display-inline">

                                </div>
                              </div>
                              <hr class="simple">
                              <a href="#">More information</a>
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="well well-sm well-light">
                              <h4 class="txt-color-blue">Resolved<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                              <br>
                              <div class="text-center">
                                <div style="font-size:50px;" class="txt-color-blue display-inline">

                                </div>
                              </div>
                              <hr class="simple">
                              <a href="#">More information</a>

                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="well well-sm well-light">
                              <h4 class="txt-color-blue">Closed<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                              <br>
                              <div class="text-center">
                                <div style="font-size:50px;" class="txt-color-blue display-inline">

                                </div>
                              </div>
                              <hr class="simple">
                              <a href="#">More information</a>

                            </div>
                          </div>
                        </div>
                    </div>
                  </div>{{-- end widget content --}}
                </div>{{-- end widget div --}}
              </div>{{-- end jarviswidget --}}

            </article>{{-- WIDGET END --}}
          </div>{{-- end row --}}

          {{-- row --}}
          <div class="row">
            {{-- a blank row to get started --}}
            <div class="col-sm-12">
              {{-- your contents here --}}
            </div>
          </div>{{-- end row --}}
        </section>
</div>{{-- end content --}}

<div id="Emp_Details" class="widget-body" style="margin-bottom:20px" title="Employee Detail">
</div>

<div id="Edit_Incident" title="Edit incident">

</div>
{{-- --}}
<div id="deleteCase_Details">
</div>
@endsection
@section('script')
<script src="{{asset('js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{asset('js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{asset('js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
<script src="{{asset('js/plugin/bootstrapvalidator/bootstrapValidator.min.js') }}"></script>
<script src="{{asset('dist/jquery-confirm.min.js') }}"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/dataRender/ellipsis.js"></script>
<script>
    $(document).ready(function() {
        pageSetUp();
        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        /* Formatting function for row details - modify as you need */
        function format(d) {
            if (d.AttachFile == null) {
                file_src = '';
                attach = 'No File';
                download = '';
            }else{
                var file_src = d.AttachFile;
                var ext = file_src.substring(file_src.lastIndexOf('.') + 1).toLowerCase();
                if(ext == "jpeg" || ext == "png" || ext == "jpg"){
                    var attach = '<img id="attach" src="attach/files/'+d.AttachFile+'" height="150px" width="150px">';
                    var download = '<a href="/attachment/download/'+d.AttachFile+'" target="_blank">Download</a>';
                }else{
                    var attach = '<img id="attach" src="images/downloads.png" height="" width="150px">';
                    var download = '<a href="/attachment/download/'+d.AttachFile+'" target="_blank">Download</a>';
                }
            }
            if(d.ProfileImage != null){
                var profile = d.ProfileImage;
            }
            else{
                var profile = '/img/avatars/male.png';
            }
            // `d` is the original data object for the row
            return ''+
                '<div class="well-light" style="margin:25px; margin-top:0px">' +
                    '<h2 class="email-open-header" style="padding:10px;">' +
                        '<i class="fa fa-book"></i> '+ d.Subject +
                        '<span class="pull-right" style="background:transparent">' +
                            '<div class="text-right">' +
                                '<div class="btn-group text-left" style="margin-top:-13px">' +
                                    '<a  href="/'+d.CaseID+'/edit-incident" id="Edit' + d.CaseID + '" class="btn btn-primary btn-sm replythis"><i class="fa fa-pencil"></i> Edit</a>' +
                                    '<button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></button>' +
                                    '<ul class="dropdown-menu pull-right">' +
                                    '<li><a href="#" class="replythis" id="deleteCase' + d.CaseID + '"><i class="fa fa-trash"></i> Delete</a></li>' +
                                    '<li><a href="#" id="assign'+d.CaseID+'" class="replythis" id="deleteCase' + d.CaseID + '"><i class="fa fa-arrow-circle-right"></i> Assign</a></li>' +
                                    '<li><a href="javascript:void(0);" class="replythis"><i class="fa fa-check"></i> Resolve</a></li>' +
                                    '<li><a href="/'+d.CaseID+'/investigate" class="replythis"><i class="fa fa-search"></i> Investigate</a></li>' +
                                    '</ul>' +
                                '</div>' +
                            '</div>' +
                        '</span>'+
                    '</h2>' +
                '<div class="inbox-info-bar" style="padding:10px; margin-right:0px;">'+
                    '<div>'+
                        '<img src="'+ profile +'" alt="me" class="away">'+
                        '<a href="#" id="Employee' + d.EmployeeID + '"><strong>'+ d.EmployeeName +'</strong></a>'+
                        '<span class="hidden-mobile" style="padding-left:50px">  <i class="fa fa-calendar"></i> '+ d.Timestamp+'</span>'+
                    '</div>'+
                '</div>'+
                '<div class="inbox-message" style="margin:0px; padding:10px; background:transparent"><i class="fa fa-pencil"></i><strong> Description</strong>'+
                '<br>'+
                    '<br>'+
                    '<p>'+d.Description +'</p>'+
                '</div>'+
                '<hr class="simple">'+
                '<div class="inbox-download" style="padding:10px; margin:0px"><strong><i class="fa fa-paperclip"></i> Attach File</strong>'+
                    '<ul class="inbox-download-list">'+
                        '<li><div class="well well-sm text-center"><span>'+ attach +'</span><br>'+
                        download +
                    '</ul>' +
                '</div>'+
                '</div>';
        }


        // clears the variable if left blank
        var table = $('#incidents_tbl').DataTable({

            "autoWidth": "true",
            "scrollX": true,
            "columnDefs": [
                {
                    "targets": [2,3,7],
                    "render": function(data, type, row) {
                        if ( type === 'display') {
                            return renderedData = $.fn.dataTable.render.ellipsis(30)(data, type, row);
                        }
                        return data;
                    }
                }
            ],
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "ajax": "/ajax/incidents",
            "bDestroy": true,
            "language": { "loadingRecords": "Please wait - loading..." },
            "iDisplayLength": 10,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "columns":
                [
                    {
                        "class": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {"data": "CaseID"},
                    {"data": "Subject"},
                    {"data": "Description"},
                    {"data": "Status"},
                    {"data": "Priority"},
                    {"data": "CreatedDate"},
                    {"data": "AttachFile"},
                ],
            "order": [[1, 'desc']],
            "fnDrawCallback": function (oSettings) {
                runAllCharts()
            }
        });
        // Add event listener for opening and closing details
        $('#incidents_tbl tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var d = table.row(this).data();
            var mycase = d['CaseID'];
            var emp = d['EmployeeID'];
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
                $('#Employee'+emp).on('click',function () {
                    var emp_id = emp;
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '/employee/' + emp_id + '/profile',
                        data: 'emp_id=' + emp_id,
                        success: function (response) {
                            // var data = JSON.parse(response);
                            $.dialog({
                                title:'Employee Detail',
                                icon: 'fa fa-info',
                                animateFromElement: false,
                                content: 'url:/employee/' + emp_id + '/profile',
                                type: 'blue',
                                columnClass: 'col-md-8 col-md-offset-2',
                                buttons: {
                                    Close: function () {
                                        //close
                                    },
                                },
                            })
                        }
                    });
                });
                $('#deleteCase'+mycase).on('click',function () {
                    var case_id = mycase;
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '/ajax/incidents/show/' + case_id,
                        data: 'case_id=' + case_id,
                        success: function (response) {
                            var data = JSON.parse(response);
                            $.confirm({
                                title: 'Are you sure to delete this incident?',
                                icon: 'fa fa-trash',
                                type: 'red',
                                animateFromElement: false,
                                content: '' +
                                '<form action="/'+case_id+'/reject-incident" id="fm_complaint_add" method="post">' +
                                '{{ csrf_field() }}'+
                                '<div class="form-group">' +
                                '<label class="control-label">Enter the reason!</label>'+
                                '<textarea class="form-control text-info" name="reason" id="reason" rows="3"></textarea>' +
                                '</div>' +
                                '</form>',
                                columnClass: 'col-md-6 col-md-offset-4',
                                buttons: {
                                    formSubmit: {
                                        text: 'Delete',
                                        btnClass: 'btn-red',
                                        action: function () {
                                            var name = this.$content.find('#reason').val();
                                            if(!name){
                                                $.alert('Please choose your reason!');
                                                return false;
                                            }
                                            $('#fm_complaint_add').submit();
                                            // $.alert('Your reason is <strong>' + reason + '</strong>');
                                        }
                                    },
                                    Cancel: function () {
                                        //close
                                    },
                                },
                            });
                            // $('#deleteCase_Details').html(response).dialog('open');
                        }
                    });
                });
                $('#assign'+mycase).on('click', function () {
                    var case_id = mycase;
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '/ajax/incidents/assign/' + case_id,
                        data: 'case_id=' + case_id,
                        success: function (response) {
                            $.confirm({
                                animateFromElement: false,
                                title:'Incident Assignment',
                                content: 'url:/ajax/incidents/assign/' + case_id,
                                type: 'blue',
                                columnClass: 'col-md-6 col-md-offset-4',
                                buttons:{
                                    formSubmit: {
                                        text: 'Assign',
                                        btnClass: 'btn btn-primary',
                                        action: function () {
                                            this.$content.find('#fm_incident').submit();
                                            // this.$content.find('#fm_ticket').submit();
                                        }
                                    },
                                    Cancel: function () {
                                        //close
                                    },
                                },
                            })

                        }
                    })

                });
            // View attachment
                $('body').append('<div class="product-image-overlay"><span class="product-image-overlay-close">x</span><img src="" /></div>');
                // var productImage = $('#attach');
                var productOverlay = $('.product-image-overlay');
                var productOverlayImage = $('.product-image-overlay img');
                $('#attach').click(function () {
                    var productImageSource = $(this).attr('src');
                    productOverlayImage.attr('src', productImageSource);
                    console.log(productOverlayImage);
                    productOverlay.fadeIn(100);
                    $('body').css('overflow', 'hidden');

                    $('.product-image-overlay-close').click(function () {
                        productOverlay.fadeOut(100);
                        $('body').css('overflow', 'auto');
                    });
                });
            }//end else
        });
    });
</script>

@endsection
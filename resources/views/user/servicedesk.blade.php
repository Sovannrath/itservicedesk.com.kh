@php
use App\GlobalDeclare;
@endphp
@extends('layouts.user-master')
@section('page_title')
  IT Service Desk
@endsection
@section('style')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/dist/jquery-confirm.min.css') }}">
@endsection
@section('content')
<div id="content">
  <div class="row">
    {{-- col --}}
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
      <h1 class="page-title txt-color-blueDark">
          {{-- PAGE HEADER --}}
          <i class="fa-fw fa fa-home"></i>IT Service Desk
      </h1>
    </div>{{-- end col --}}

    {{-- col --}}
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
      <div class="pull-right">
          <a href="{{route('incident.create')}}" title="New Incident" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" style="color:#FF9800"></span>Create</a>
            <a href="#" title="Follow Up" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px"><span class="glyphicon btn-glyphicon glyphicon-flag img-circle" style="color:#FF9800"></span>Follow</a>
          <a href="#" title="Print" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px"><span class="glyphicon btn-glyphicon glyphicon-print img-circle" style="color:#FF9800"></span>Print</a>
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
            <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
            <h2>Technician or Programmer</h2>
          </header>
          <div class="">
            <div class="jarviswidget-editbox">
            </div>
            {{-- widget-body --}}
            <div class="widget-body">
                @foreach($last_inc as $data)
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                  <div style="text-align: center"> {{-- User image size is adjusted inside CSS, it should stay as is --}}
                      @if($data->ProfileImage != null)
                      <img class="img-circle" src="{{$data->ProfileImage}}" style="width: 150px; height:auto; border:5px solid #eee;" alt="me" class=""/>
                      <hr>
                      <table align="center" class="table-condensed">
                          <tr>
                              <th class="text-right">Operator ID : </th>
                              <td class="text-left"> {{$data->OperatorID}}</td>
                          </tr>
                          <tr>
                              <th class="text-right">Operator Name : </th>
                              <td class="text-left"> {{$data->LastName}} {{$data->FirstName}}</td>
                          </tr>
                          <tr>
                              <th class="text-right">Position : </th>
                              <td class="text-left"> {{$data->Position}}</td>
                          </tr>
                      </table>
                      @else
                    <img class="img-circle" src="{{asset('img/user-profile/Male.png')}}" style="width: 150px; height:auto; border:5px solid #eee;" alt="me" class=""/>
                      <hr>
                      <p class="text-warning">Your incident not yet assign to any technician or developer.</p>
                      @endif
                  </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="col-sm-12">
                        <div class="pull-left">Description</div> <div class="pull-right">Completion</div>
                        <hr class="">
                        <div class="col-sm-8">
                            <dl class="dl-horizontal">
                                <dt>Incident ID : </dt>
                                <dd>{{$data->CaseID}}</dd>
                                <dt>Subject :</dt>
                                <dd>{{$data->Subject}}</dd>
                                <dt>Description : </dt>
                                <dd>{{$data->Description}}</dd>
                                <dt>Created Date :</dt>
                                <dd>{{ GlobalDeclare::setDateFormat($data->CreatedDate) }}</dd>
                                <dt>Updated Date :</dt>
                                <dd>{{ GlobalDeclare::setDateFormat($data->Timestamp) }}</dd>
                                <dt>Status :</dt>
                                <dd>{{ GlobalDeclare::getStatus($data->Status)}}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-right">
                                <ul class="list-inline">
                                    <li>
                                        <div class="easy-pie-chart txt-color-blueDark easyPieChart" data-percent="{{App\GlobalDeclare::getPercentage($data->Status)}}" data-pie-size="140">
                                            <span class="percent percent-sign txt-color-pinkDark font-lg semi-bold">{{App\GlobalDeclare::getPercentage($data->Status)}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="well well-sm well-light">
                            <h4 class="txt-color-blue">Active<a href="#" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                            <br>
                            <div class="text-center">
                                <div style="font-size:50px;" class="txt-color-blue display-inline">
                                    {{ count($active) }}
                                </div>
                            </div>
                            <hr class="simple">
                            <a href="#">More information</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="well well-sm well-light">
                            <h4 class="txt-color-blue">Rejected<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
                            <br>
                            <div class="text-center">
                                <div style="font-size:50px;" class="txt-color-blue display-inline">
                                    {{ count($reject) }}
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
                                    {{ count($resolved) }}
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
                                    {{ count($closed) }}
                                </div>
                            </div>
                            <hr class="simple">
                            <a href="#">More information</a>
                        </div>
                    </div>
                </div>
            </div>{{-- end row --}}
        @endforeach
          </div>{{--end div --}}
        </div>{{-- end jarviswidget --}}
      </article>
      <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="" data-widget-editbutton="false" data-widget-deletebutton="false">
          <header>
            <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
            <h2>Your Tickets</h2>
          </header>
          <div>
            <div class="jarviswidget-editbox">
            </div>
            <div class="widget-body no-padding">        
              <table id="dt_basic" class="table-bordered table-striped table-condensed table-hover dataTable no-footer" width="100%"  style="cursor:pointer">
                <thead>                     
                  <tr>
                    <th data-hide="phone">Case ID</th>
                    <th data-hide="phone"> Subject</th>
                    <th data-class="expand"> Status</th>
                    <th data-hide="phone,tablet">Created Date</th>
                    <th  > %Complete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($incidents as $incident)
                  <tr>
                    <td>{{ $incident->CaseID}}</td>
                    <td>{{ $incident->Subject}}</td>
                      <td>{{GlobalDeclare::getStatusColor($incident->Status)}}<span id="status"> {{ GlobalDeclare::getStatus($incident->Status)}}</span></td>
                    <td>{{ GlobalDeclare::setDateFormat($incident->CreatedDate)}}</td>
                      @php
                      switch($percent = $incident->Status){
                      case 1:
                      $percent = 0;
                      break;
                      case 2:
                      $percent = 100;
                      break;
                      case 3:
                      $percent = 10;
                      break;
                      case 4:
                      $percent = 30;
                      break;
                      case 5:
                      $percent = 50;
                      break;
                      case 6:
                      $percent = 50;
                      break;
                      case 7:
                      $percent = 90;
                      break;
                      case 8:
                      $percent =  50;
                      break;
                      case 9:
                      $percent = 0;
                      break;
                      case 10:
                      $percent = 100;
                      break;
                      default:
                      $percent = 0;
                      }
                      @endphp
                    <td><div class='progress progress-xs' data-progressbar-value='{{$percent}}'><div class='progress-bar bg-color-blue'></div></div></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>{{-- end widget body --}}
          </div>{{-- end widget div --}}  
        </div>{{-- end jarviswidget --}}
      <div id="incidentDetails">

      </div>
      </article>
              </div>{{-- end col-md-9}}
            </div>{{--end widget-body--}}
          </div>{{--end no-padding--}}
        </div>{{--end jarviswidget--}}
      </article>
    </div>{{-- end row --}}
  </section>{{-- end section --}}
</div>{{--end content--}}
@endsection
@section('script')
{{-- EASY PIE CHARTS --}}
<script src="{{asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>
<script src="https://cdn.datatables.net/v/dt/cr-1.5.0/datatables.min.js"></script>
<script src="{{asset('UserSite/dist/jquery-confirm.min.js') }}"></script>
  <script>
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function() {
      pageSetUp();
      /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;
        
        var breakpointDefinition = {
          tablet : 1024,
          phone : 480
        };
        var table = $('#dt_basic').DataTable(
            {
                "dom": "Rlfrtip",
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                  "autoWidth" : true,
                      "oLanguage": {
                      "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                  },
                  "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                      responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                    }
                  },
                  "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                  },
                  "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                  },
                    "order": [[0, 'desc']],
                "colReorder": true,
                "colResize": true,

            }
        );
        $('#dt_basic tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            var case_id = data[0];
            var getStatus = data[2]
            // console.log(getStatus);
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '/user/Ajax-incident/'+case_id,
                data: 'case_id=' +case_id,
                success:function(response){
                    $.confirm({
                        title: 'Incident Details',
                        type: 'blue',
                        content: 'url: /user/Ajax-incident/'+case_id,
                        columnClass: 'col-md-8 col-md-offset-2',
                        buttons: {
                            Update:{
                                btnClass: 'btn-blue',
                                action: function(){
                                    var Status = this.$content.find('#status').val();
                                    console.log(Status);
                                    if(Status == 'Open'){
                                        $('#fm_incident').submit();
                                    }else{
                                        $.confirm({
                                            title: 'Error',
                                            icon: 'fa fa-warning',
                                            type: 'red',
                                            content:'You cannot update this incident!',
                                            buttons:{
                                                Close: function () {
                                                    //
                                                }
                                            }
                                        });
                                    }
                                },
                            },
                            Cancel: function () {
                                //close
                            },
                        },
                    });
                    // if(status == '<span> <i class="fa fa-circle font-xs" style="color:grey"></i> </span>Open'){
                    //     document.getElementById("Edit").disabled = false;
                    // }
                    // else{
                    //     document.getElementById("Edit").disabled = true;
                    // }
                    // // console.log(response);
                    // $("#incidentDetails").html(response).dialog('open');
                }
            });
        } );
        $('#incidentDetails').dialog({
            autoOpen : false,
            show: {
                effect: "drop",
                duration: 200,
                direction: "up"
            },
            hide: {
                effect: "drop",
                duration: 200,
                direction: "up"
            },
            width : 800,
            resizable : false,
            modal : true,
            title: "Incident Detail",
            position: { my: "center top+80",
                at: "center top",

            },
            buttons : [{
                "id" : "Edit",
                html : "<i class='fa fa-pencil'></i>&nbsp; Edit",
                "class" : "btn btn-warning",
                click : function() {
                    $(this).find('.form-control').removeAttr("disabled");
                    $('#subject').focus();
                    $('#Edit').addClass('hidden');
                    $('#Save').removeClass('hidden');
                }
            },
                {
                    "id": "Save",
                    html: "<i class='fa fa-hdd-o'></i>&nbsp; Save",
                    "class": "btn btn-primary hidden",
                    click: function () {
                        $('#fm_incident').submit();
                    }
                },
                    {
                html : "<i class='fa fa-times'></i>&nbsp; Cancel",
                "class" : "btn btn-default",
                click : function() {
                    $('#Edit').removeClass('hidden');
                    $('#Save').addClass('hidden');
                    $(this).dialog("close");
                }
            }],
            clickOutside: true, // clicking outside the dialog will close it
            clickOutsideTrigger: "#incidentDetails"
            });
      /* END BASIC */
      })
</script>
@endsection

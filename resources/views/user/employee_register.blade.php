@extends('layouts.user-master')
@section('page_title')
  Employee Register
@endsection
@section('content')
<div id="content">
	<div class="row">
    {{-- col --}}
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            {{-- PAGE HEADER --}}
            <i class="fa-fw fa fa-home"></i>Employee Register
        </h1>
      </div>
      {{-- end col --}}
      {{-- col --}}
      <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <div class="pull-right">
          <a href="#" title="Create"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-plus"></i></button></a>
              <a href="#" title="Update"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-folder-open"></i></button></a>
              <a href="#" title="Delete"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-trash"></i></button></a>
              <a href="#" title="Email"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-envelope"></i></button></a>
        </div>
      </div>
      {{-- end col --}}
  	</div>
    {{-- widget grid --}}
    <section id="widget-grid" class="">
    <div class="row">
      <article class="col-sm-12">
        {{-- Widget ID (each widget will need unique ID)--}}
        <div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false">
          <header>
            <span class="widget-icon"> <i class="fa fa-exclamation-circle"></i> </span>
            <h2>Login Information</h2>
          </header>
          {{-- widget div--}}
          <div>
              
              {{-- widget edit box --}}
              <div class="jarviswidget-editbox">
                {{-- This area used as dropdown edit box --}}
                
              </div>
              {{-- end widget edit box --}}
              
              {{-- widget content --}}
              <div class="widget-body" id="emp_detail" style="min-height:420px">
                <div class="row">
                  <div class="col-sm-8">
                    <dl class="dl-horizontal">
                      @foreach($data as $data)
                        <dt>Request ID :</dt>
                          <dd><em>{{$data->RequestID}}</em></dd>
                        <dt>Request Type :</dt>
                          <dd><em>{{$data->RequestType}}</em></dd>
                        <dt>Business Unit :</dt>
                        <dd><em>{{$data->BusinessUnitID}}</em></dd>
                        <dt>Business Partner ID :</dt>
                        <dd><em>{{$data->BusinessPartnerID}}</em></dd>
                        <dt>Document ID :</dt>
                        <dd><em>{{$data->DocumentID}}</em></dd>
                        <dt>Department :</dt>
                        <dd><em>{{$data->DepartmentID}}</em></dd>
                        <dt>Function :</dt>
                        <dd><em></em></dd>
                        <dt>Division :</dt>
                        <dd><em></em></dd>
                        <dt>Name (English) :</dt>
                        <dd><em>{{$data->NameENG}}</em></dd>
                        <dt>Name (Khmer) :</dt>
                        <dd><em>{{$data->NameKHM}}</em></dd>
                        <br>
                        <dt>Request :</dt>
                        <dd><em></em></dd>
                        <dt>Email ID :</dt>
                        <dd><em>{{$data->EmailID}}</em></dd>
                        <dt>HP01 :</dt>
                        <dd><em>{{$data->HP01}}</em></dd>
                        <dt>HP02 :</dt>
                        <dd><em>{{$data->HP02}}</em></dd>
                        <dt>Reason :</dt>
                        <dd><em>{{$data->Reason}}</em></dd>
                    </dl>
                   @endforeach
                  </div>{{-- end col-sm-8 --}}
                  <div class="col-sm-4">
                       <ul class="list-inline">
                      <li>&nbsp;&nbsp;&nbsp;
                        <div class="easy-pie-chart txt-color-blue easyPieChart" data-percent="90" data-pie-size="150">
                          <span class="percent percent-sign txt-color-blue font-xl semi-bold">Pending</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                      </li>
                    </ul>
                  </div>{{--end col-sm-4--}}
                </div>
                {{-- end row --}}
                <div class="row">
                  <div class="col-sm-8 pull-right">
                    <div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                      <header>
                      <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
                      <h2>User</h2>
                    </header>
                      <div>
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body">
                          
                            
                          
                          <table id="dt_basic" class="table-hover table-striped table-condensed" width="100%">
                            <thead>                     
                              <tr>
                                <th>App ID</th>
                                <th>Description</th>
                                <th>Audit Users</th>
                                <th>Comment</th>
                                <th>Created Date</th>
                                <th>Access</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php
                              $i = 0;
                              @endphp
                              @foreach($authorizeApp as $UserApp)
                                <tr>
                                <td>{{ $i+=1 }}</td>
                                <td>{{ $UserApp->BusinessDesc }}</td>
                                <td>ERP Department</td>
                                <td></td>
                                <td>{{ $UserApp->CreatedDate }}</td>
                                @if($UserApp->Access == 'False')
                                <td><a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="Tooltip Left" title="Request Access" class="label label-xs label-danger"><i class="fa fa-times" style="padding-left:5px; padding-right:5px"></i></a></td>
                                @else
                                <td ><a href="javascript:void(0)" rel="tooltip" data-placement="top" data-original-title="Aready access" class="label label-xs label-success"><i class="fa fa-check" style="padding-left:5px; padding-right:5px"></i></a></td>
                                @endif
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div></div>
                        </div>{{--end widget-body--}}
                      </div>{{--end div--}}
                    </div>
                  </div>
                </div>{{-- end row--}}
                <div class="row">
                  <div class="col-sm-12 pull-right">
                    <div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
                        <header>
                          <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
                          <h2>Manager</h2>
                        </header>
                          <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body">
                              <table id="dt_basic" class="table-hover table-striped table-condensed" width="100%">
                              <thead> 
                                <tr>
                                  <th>Subject</th>
                                  <th>Date</th>
                                  <th>From</th>
                                  <th>App ID</th>
                                  <th>Description</th>
                                  <th>Audit Users</th>
                                  <th>Comment</th>
                                  <th>Created Date</th>
                                  <th>Access</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Reason</td>
                                  <td>DateRquest</td>
                                  <td>Email</td>
                                  <td>1</td>
                                  <td>Enterprise Resource Planning</td>
                                  <td>ERP Department</td>
                                  <td></td>
                                  <td>10-June-2018</td>
                                  <td>False</td>
                                </tr>
                                <tr>
                                  <td>Reason</td>
                                  <td>DateRquest</td>
                                  <td>Email</td>
                                  <td>2</td>
                                  <td>Customer Relation Management</td>
                                  <td>ERP Department</td>
                                  <td></td>
                                  <td>10-June-2018</td>
                                  <td>False</td>
                                </tr>
                                <tr>
                                  <td>Reason</td>
                                  <td>DateRquest</td>
                                  <td>Email</td>
                                  <td>3</td>
                                  <td>Human Resource Management</td>
                                  <td>ERP Department</td>
                                  <td></td>
                                  <td>10-June-2018</td>
                                  <td>True</td>
                                </tr>
                                 <tr>
                                  <td>Reason</td>
                                  <td>DateRquest</td>
                                  <td>Email</td>
                                  <td>4</td>
                                  <td>IT Service Desk Application</td>
                                  <td>ERP Department</td>
                                  <td></td>
                                  <td>10-June-2018</td>
                                  <td>True</td>
                                </tr>
                                <tr>
                                  <td>Reason</td>
                                  <td>DateRquest</td>
                                  <td>Email</td>
                                  <td>5</td>
                                  <td>Business Intelligent Applicatio</td>
                                  <td>ERP Department</td>
                                  <td></td>
                                  <td>10-June-2018</td>
                                  <td>True</td>
                                </tr>
                              </tbody>
                              </table>
                            </div>{{--end widget-body--}}
                          </div>{{--end div--}}
                    </div>{{--end jarviswidget--}}
                  </div>{{--end jarviswidget--}}
                </div>{{--end row--}}
                <div class="alert alert-block alert-info"><p>This request will send to your manager in next 20 mins and you will confirm for your application here.
If you have anything concerned please contact IT Administrator within email – operation.it@vita.com.kh</p></div>
            </div>
          </div>
        </div>
      </article>								
  	</div>{{-- end row--}}
</div>{{--end content--}}
@endsection
@section('script')
<script src="{{asset('UserSite/js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.colVis.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.tableTools.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/datatable-responsive/datatables.responsive.min.js') }}"></script>

@endsection
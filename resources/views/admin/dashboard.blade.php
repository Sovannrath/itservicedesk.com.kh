@extends('layouts.master')
@section('template_title')
	Dashboard
@endsection
@section('content')

@php
    use App\GlobalDeclare;
    use Carbon\Carbon;
@endphp

{{-- #MAIN CONTENT --}}
<div id="content">
	<div class="row">
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
		      {{-- PAGE HEADER --}}
		      <i class="fa-fw fa fa-home"></i>Dashboard
			</h1>
		</div>
		{{-- end col --}}
		{{-- col --}}
	</div>

	{{-- widget grid --}}
	<section id="widget-grid" class="">
		{{-- row --}}
		<div class="row">
			{{-- DASHBOARD ICON --}}
			<article class="col-sm-6 col-md-6 col-lg-3">
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Total inbound call today</h2>
					</header>
					<div class="no-padding">
						<div class="jarviswidget-editbox">
                            @php
                            $today = Carbon::today()->toFormattedDateString();
                            $open_today = App\Incident::whereDate('CreatedDate', '=',$today)->where('Status', '=', '1')->get();
                            $inc_call = App\Incident::whereDate('CreatedDate', '=',$today)->where('Status', '=', '1')->where('SourceFrom', '=', 1)->get();
                            $inc_interact = App\Incident::whereDate('CreatedDate', '=',$today)->where('SourceFrom', '=', 2)->get();
                            $inc_email = App\Incident::whereDate('CreatedDate', '=',$today)->where('Status', '=', '1')->where('SourceFrom', '=', 3)->get();
                            @endphp
						</div>
						{{-- widget-body --}}
						<div class="widget-body">
							<div class="icon-wrap product-wrap clearfix">
								<div class="row">
									<div class="col-sm-5">
										<div class="text-center">
											<img class="img-responsive" src="{{asset('images/inbound-call-centre.svg')}}">
										</div>
									</div>
									<div class="col-sm-7">
										<div class="">
										<p class="price-container"><span style="font-size:60px;">{{count($inc_call)}}</span></p>
										<p style="margin-top:-25px;">Cases</p>
										</div>
										<hr class="simple">
										<div class="description">
											<a href="#">More information</a>
										</div>
									</div>
								</div>
							</div>
						</div>{{-- end widget-body --}}
					</div>{{-- end no-padding --}}
				</div>{{--end jarviswidget--}}
			</article>			
			{{-- DASHBOARD ICON --}}
			<article class="col-sm-6 col-md-6 col-lg-3">
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Total interactions today</h2>
					</header>
					<div class="no-padding">
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body">
							<div class="icon-wrap product-wrap clearfix">
								<div class="row">
									<div class="col-sm-5">
										<div class="text-center">
											<img class="img-responsive" src="{{asset('images/call_features.png')}}">
										</div>
									</div>
									<div class="col-sm-7">
										<div class="">
										<p class="price-container"><span style="font-size:60px;">{{count($inc_interact)}}</span></p>
										<p style="margin-top:-25px;">Cases</p>
										</div>
										<hr class="simple">
										<div class="description">
											<a href="#">More information</a>
										</div>
									</div>
								</div>
							</div>
						</div>{{-- end widget-body --}}
					</div>{{-- end no-padding --}}
				</div>{{--end jarviswidget--}}
			</article>
			{{-- DASHBOARD ICON --}}
			<article class="col-sm-6 col-md-6 col-lg-3">
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Total inbound email today</h2>
					</header>
					<div class="no-padding">
						<div class="jarviswidget-editbox">
							test
						</div>
						<div class="widget-body">
							<div class="icon-wrap product-wrap clearfix">
								<div class="row">
									<div class="col-sm-5">
										<div class="text-center">
											<img class="img-responsive" src="{{asset('images/call_features.png')}}">
										</div>
									</div>
									<div class="col-sm-7">
										<div class="">
										<p class="price-container"><span style="font-size:60px;">{{count($inc_email)}}</span></p>
										<p style="margin-top:-25px;">Cases</p>
										</div>
										<hr class="simple">
										<div class="description">
											<a href="#">More information</a>
										</div>
									</div>
								</div>
							</div>
						</div>{{-- end widget-body --}}
					</div>{{-- end no-padding --}}
				</div>{{--end jarviswidget--}}
			</article>
			{{-- DASHBOARD ICON --}}
			<article class="col-sm-6 col-md-6 col-lg-3">
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Total opening cases today</h2>
					</header>
					<div class="no-padding">
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body">
							<div class="icon-wrap product-wrap clearfix">
								<div class="row">
									<div class="col-sm-5">
										<div class="text-center">
											<img class="img-responsive" src="{{asset('images/call_features.png')}}">
										</div>
									</div>
									<div class="col-sm-7">
										<div class="">
										<p class="price-container"><span style="font-size:60px;">{{count($open_today)}}</span></p>
										<p style="margin-top:-25px;">Cases</p>
										</div>
										<hr class="simple">
										<div class="description">
											<a href="#">More information</a>
										</div>
									</div>
								</div>
							</div>
						</div>{{-- end widget-body --}}
					</div>{{-- end no-padding --}}
				</div>{{--end jarviswidget--}}
			</article>
			{{--Incidents Table--}}
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget" id="" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>All Incidents</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body no-padding">				
							<table id="dt_basic" class="table-bordered table-striped table-condensed table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone"> Case ID</th>
										<th data-class="expand"> Subject</th>
										<th data-hide="phone"> Status</th>
										<th data-hide="phone,tablet"> Priority</th>
										<th data-hide="phone,tablet"> Ticket ID</th>
										<th data-hide="phone,tablet"> %Completion</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($incidents as $incident)
									<tr>
										<td>{{$incident->CaseID}}</td>
										<td>{{$incident->Subject}}</td>
                                        <td><span>{{GlobalDeclare::getStatusColor($incident->Status)}}</span> {{GlobalDeclare::getStatus($incident->Status)}}</td>
                                        <td><span>{{GlobalDeclare::getPriorityColor($incident->Priority)}}</span> {{GlobalDeclare::getPriority($incident->Priority)}}</td>
										<td>TS00011</td>
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
			</article>
			{{-- Incident Table--}}
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget" id="" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
						<h2>Incidents</h2> <h2 class="pull-right"><span style="margin-right:10px"> Filter by: <div class="btn-group">
										{{-- add: non-hidden - to disable auto hide --}}
										<div class="btn-group">
											<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
												Month <i class="fa fa-caret-down"></i>
											</button>
											<ul class="dropdown-menu js-status-update pull-right">
												<li>
													<a href="javascript:void(0);" id="ag">Day</a>
												</li>
												<li>
													<a href="javascript:void(0);" id="mt">Month</a>
												</li>
												<li>
													<a href="javascript:void(0);" id="td">Year</a>
												</li>
											</ul>
										</div>
									</div></span></h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body">
							<div class="col-sm-12 col-md-12 col-lg-6">{{-- this is what the user will see --}}
							<div id="columnchart_values"></div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6">{{-- this is what the user will see --}}
							<div id="columnchart_values2"></div>
							</div>
						</div>{{-- end widget body --}}
					</div>{{-- end widget div --}}
				</div>{{-- end jarviswidget --}}

			</article>{{--End Incidents Table--}}
			{{--Tickets Services--}}
			<article class="col-sm-12 col-md-12 col-lg-6">
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-ticket txt-color-darken"></i> </span>
						<h2>My Tickets Services</h2><h2 class="pull-right"><span style="margin-right:10px"> Filter by:<a href="#"> IT Network</a> | <a href="#"> IT Programming</a></span></h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">	
						</div>
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-12 col-md-8 col-lg-8">
									<div class="col-md-6 col-lg-6">
										<div class="well well-sm" style="margin-bottom: 10px">Open<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													18
												</div>
											</div>
										<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="well well-sm" style="margin-bottom: 10px">Closed<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													9
												</div>
											</div>
											<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="well well-sm" style="margin-bottom: 10px">All Tickets<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													27
												</div>
											</div>
											<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
							</div>{{-- end col-sm-12 col-md-8 col-lg-8 --}}
							<div class="col-sm-12 col-md-4 col-lg-4">
								<ul class="list-inline text-center">
									<li>&nbsp;&nbsp;&nbsp;
										@php 
										$close =9; 
										$open = 18;
										$percent = ($close/($open+$close))*100; 
										@endphp
										<div class="easy-pie-chart txt-color-blue easyPieChart" data-percent="@php echo $percent @endphp" data-pie-size="140">
											<span class="percent percent-sign txt-color-blue font-xl semi-bold">@php echo $percent @endphp</span>
										</div>
										&nbsp;&nbsp;&nbsp;
									</li>
										<p class="text-center">Recent tickets complete</p>
										<p class="text-center">#TS-0001</p>
										<p class="text-center">Networking Checking at site KOB SROV</p>
								</ul>
							</div>{{-- col-sm-12 col-md-4 col-lg-4 --}}
						</div> {{-- end row --}}
						</div>{{-- end widget body --}}
					</div>{{-- end widget div --}}
				</div>{{--endjarviswidget--}}
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-ticket txt-color-darken"></i> </span>
						<h2>Incidents</h2><h2 class="pull-right"><span style="margin-right:10px"> Filter by:<a href="#"> IT Network</a> | <a href="#"> IT Programming</a></span></h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">	
						</div>
						<div class="widget-body">
							<div class="row">
								<div class="col-sm-12 col-md-8 col-lg-12">
									<div class="col-md-6 col-lg-4">
										<div class="well well-sm" style="margin-bottom: 10px">Open<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													18
												</div>
											</div>
										<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										<div class="well well-sm" style="margin-bottom: 10px">Reject<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													9
												</div>
											</div>
											<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										<div class="well well-sm" style="margin-bottom: 10px">In Progress<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													27
												</div>
											</div>
											<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										<div class="well well-sm" style="margin-bottom: 10px">Resolved<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													27
												</div>
											</div>
											<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
									<div class="col-md-6 col-lg-4">
										<div class="well well-sm" style="margin-bottom: 10px">Re-Open<br>
											<div class="text-center">
												<div style="font-size:25px;" class="txt-color-blue display-inline">
													27
												</div>
											</div>
											<hr class="simple"><a href="#">More information</a>
										</div>
									</div>
							</div>{{-- end col-sm-12 col-md-8 col-lg-12 --}}
						</div> {{-- end row --}}
						</div>{{-- end widget body --}}
					</div>{{-- end widget div --}}
				</div>{{--endjarviswidget--}}
				{{-- new widget --}}
				<div class="jarviswidget" id="" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-togglebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-calendar txt-color-darken"></i> </span>
						<h2> My Events </h2>
					</header>
					{{-- widget div--}}
					<div>
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							<input class="form-control" type="text">
						</div>
						{{-- end widget edit box --}}
						<div class="widget-body no-padding">
							{{-- content goes here --}}
							<div class="widget-body-toolbar">

								<div id="calendar-buttons">

									<div class="btn-group">
										{{-- add: non-hidden - to disable auto hide --}}
										<div class="btn-group">
											<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
												Showing <i class="fa fa-caret-down"></i>
											</button>
											<ul class="dropdown-menu js-status-update pull-right">
												<li>
													<a href="javascript:void(0);" id="mt">Month</a>
												</li>
												<li>
													<a href="javascript:void(0);" id="ag">Agenda</a>
												</li>
												<li>
													<a href="javascript:void(0);" id="td">Today</a>
												</li>
											</ul>
										</div>
										<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
										<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							<div id="calendar"></div>
							{{-- end content --}}
						</div>
					</div>
					{{-- end widget div --}}
				</div>{{-- end jarviswidget --}}
			</article>
			{{--Tickets Services by Departments--}}
			<article class="col-sm-12 col-md-12 col-lg-6">
				{{--Tickets Services by Application--}}
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-ticket txt-color-darken"></i> </span>
						<h2>Tickets Services by Departments</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">		
						</div>
						<div class="widget-body">
							{{-- this is what the user will see --}}
							<div id="donutchart2" style="height:300px"></div>
						</div>{{-- end widget body --}}
					</div>{{-- end widget div --}}
				</div>{{-- end jarviswidget --}}
				{{--Tickets Services by Application--}}
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-ticket txt-color-darken"></i> </span>
						<h2>Tickets Services by Application</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">		
						</div>
						<div class="widget-body">
							{{-- this is what the user will see --}}
							<div id="donutchart1" style="height:300px"></div>
						</div>{{-- end widget body --}}
					</div>{{-- end widget div --}}
				</div>{{-- end jarviswidget --}}
				{{--Technician and Developers--}}
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-group txt-color-darken"></i> </span>
						<h2>Technician and Developers</h2>
                        <h2 class="pull-right">
                            <span style="margin-right:10px">Filter by: <div class="btn-group">
							{{-- add: non-hidden - to disable auto hide --}}
							<div class="btn-group">
								<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
												IT Network <i class="fa fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu js-status-update pull-right">
                                    <li>
                                        <a href="javascript:void(0);" id="ag">IT Network</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" id="mt">IT Programming</a>
                                    </li>
                                </ul>
                            </div>
						    </span>
                        </h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">	
						</div>
						<div class="widget-body">
							<ul id="" class="list-inline" style="height:240px; overflow-x: auto;">
		            		@foreach(App\Employee::all() as $employees)
				                <li><div id="Employee{{$employees->EmployeeID}}" data-value="{{$employees->EmployeeID}}" class="text-center" style="padding: 2px; border: 1px solid #eee">
				                    @if($employees->ProfileImage != null)
				                    	<img src="{{asset($employees->ProfileImage)}}" style="margin: 5px; width: 150px; height:150px; border-radius:100px; border:5px solid #eee;" alt="Profile Image" class="" />
				                    @elseif($employees->Gender == 'F')
					                	<img src="{{asset('img/user-profile/Female.png') }}" style="margin: 5px; width: 150px; height:150px; border-radius:100px; border:5px solid #eee;" alt="Profile Image" class="" />
				                    @else($employees->Gender == 'M')
				                    	<img src="{{asset('img/user-profile/Male.png') }}" style="margin: 5px; width: 150px; height:150px; border-radius:100px; border:5px solid #eee;" alt="Profile Image" class="" />
				                    @endif
				                    <br>
				                	Employee ID : {{ $employees->EmployeeID}}<br>
				                	{{ $employees->FirstName}}
				                	{{ $employees->LastName}}<br>
				                	Department : {{ $employees->DepartmentID}}<br>
				                	{{ $employees->Email}}<br>
				                	</div>
				                </li>
			                @endforeach
			            	</ul>
						</div>{{-- end widget body --}}
					</div>{{-- end widget div --}}
				</div>{{-- end jarviswidget --}}
		</article>
	  </div>
	  {{-- end row --}}
	</section>
</div>
{{-- END #MAIN CONTENT --}}

@endsection
@section('script')
{{-- SmartChat UI : plugin --}}
<script src="{{ asset('js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ asset('js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	@include('admin.scripts.google-chart')
	@include('admin.scripts.column-chart')
	@include('admin.scripts.calendar-script')
	@include('admin.scripts.dataTable')
@endsection
@extends('layouts.master')
@section('template_title')
Investigation
@endsection
@section('content')
<div id="content" style="padding-top:0px;">
    <div class="row">
        {{-- col --}}
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                {{-- PAGE HEADER --}}
                <i class="fa-fw fa fa-home"></i>Investigation
            </h1>
        </div>{{-- end col --}}

        {{-- col --}}
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <div class="pull-right">
                <a href="{{route('investigate.create')}}" title="New Investigation" class="btn icon-btn btn-lg btn-warning" style="font-size: 12px;"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle" style="color:#FF9800"></span>Create</a>
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
				<div class="jarviswidget" id="" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
						<h2>Incidents investigation by operator</h2>
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
                            <div class="panel-group smart-accordion-default" id="accordion-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-1"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> INV000001 </a></h4>
                                    </div>
                                    <div id="collapseOne-1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <dl class="dl-horizontal">
                                                        <dt>Investigate ID  : </dt>
                                                        <dd>INE-0000001</dd>
                                                        <dt>Topic   : </dt>
                                                        <dd>Networking of Database Traffic</dd>
                                                        <dt>Website : </dt>
                                                        <dd>www.google.com/….</dd>
                                                        <dt>Source    : </dt>
                                                        <dd>Mr. / Operator or IT Supports</dd>
                                                        <dt>Clients IP Address  : </dt>
                                                        <dd>10.0.8.246</dd>
                                                        <dt>Created Date  : </dt>
                                                        <dd>09-July-2018</dd>
                                                        <dt>Expected Date : </dt>
                                                        <dd>15-july-2018</dd>
                                                        <dt>Timestamp   : </dt>
                                                        <dd>11:41 AM</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div>
                                                        <center>
                                                            <img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="{{ isset($employee) && $employee->ProfileImage !='' ? $employee->ProfileImage : '/img/user-profile/Male.png'}} " alt="Profile Image" />
                                                            <div class="upload-btn-wrapper">
                                                                <p>Employee ID – OPT0001<br>Name : Kosal (Sy)<br>Position : ERP Project Manager</p>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>{{-- end row --}}
                                            <table id="" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                                                <thead>
                                                <tr>
                                                    <th data-hide="phone">Step ID</th>
                                                    <th data-class="expand"> Description</th>
                                                    <th data-hide="phone"> Comment</th>
                                                    <th data-hide="phone,tablet"> References</th>
                                                    <th data-hide="phone,tablet"> Status</th>
                                                    <th data-hide="phone,tablet"> Created Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=1; $i<=5; $i++)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>ERP Price List</td>
                                                    <td>My application were error</td>
                                                    <td>Reference </td>
                                                    <td><label class="label label-danger">Open</label></td>
                                                    <td>11-July-2018</td>
                                                </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> INV000002 </a></h4>
                                    </div>
                                    <div id="collapseTwo-1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseThree-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> INV000003 </a></h4>
                                    </div>
                                    <div id="collapseThree-1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>{{-- end widget content --}}
					</div>{{-- end widget div --}}
				</div>{{-- end jarviswidget --}}
			</article>{{-- WIDGET END --}}
		</div>{{-- end row --}}
	</section>
</div>{{-- end content --}}
@endsection
@section('script')
@include('admin.scripts.dataTable')
@endsection
@extends('layouts.master')
@section('template_title')
Operator
@endsection
@section('content')
@section('style_css')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('dist/jquery-confirm.min.css') }}">
@endsection
<div id="content" style="padding-top:0px; min-height: 760px">
	<div class="row">
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				{{-- PAGE HEADER --}}
				<i class="fa-fw fa fa-home"></i>Operator
			</h1>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<div class="pull-right">
				<a href="#" id="new_comp" title="New Complaint"><button type="button" class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-plus-sign"></i></button>
					<a href="#" title="Update"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-import"></i></button></a>
					<a href="#" title="Assign"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-th-list"></i></button></a>
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
						<h2>All Operators </h2>
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
							<table class="table-bordered table-striped table-condensed table-hover" id="complaint_tbl" width="100%">
								<thead>
								<tr>
									<th data-hide="phone">Operator ID</th>
									<th data-hide="phone">Employee ID</th>
									<th data-class="expand">Operator Type</th>
									<th data-hide="phone,tablet">Home Phone</th>
									<th data-hide="phone,tablet">Email</th>
                                    <th data-hide="phone,tablet">ReportTo</th>
                                    <th data-hide="phone,tablet">LevelSupport</th>
                                    <th data-hide="phone,tablet">Available</th>
                                    <th data-hide="phone,tablet">Action</th>
								</tr>
								</thead>
                                <tbody>
                                @foreach($operators as $operator)
                                    <tr>
                                        <td>{{$operator->OperatorID}}</td>
                                        <td>{{$operator->EmployeeID}}</td>
                                        <td>{{$operator->OperatorType}}</td>
                                        <td>{{$operator->HP}}</td>
                                        <td>{{$operator->Email}}</td>
                                        <td>{{$operator->ReportTo}}</td>
                                        <td>{{$operator->LevelSupport}}</td>
                                        <td>{{$operator->Available}}</td>
                                        <td><button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </button></td>
                                    </tr>
                                @endforeach
                                </tbody>
							</table>
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
<div id="delete_comp">
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
@endsection
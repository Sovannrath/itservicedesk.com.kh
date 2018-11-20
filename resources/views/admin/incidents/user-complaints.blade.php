@extends('layouts.master')
@section('template_title')
Incident Management
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
				<i class="fa-fw fa fa-home"></i>User Complaint
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
							<table class="table-bordered table-striped table-condensed table-hover" id="complaint_tbl" width="100%">
								<thead>
								<tr>
									<th></th>
									<th data-hide="phone">Complain ID</th>
									<th data-hide="phone">Case ID</th>
									<th data-class="expand">Operator</th>
									<th data-hide="phone,tablet">Complaint Date</th>
									<th data-hide="phone,tablet">Transaction Date</th>
									<th data-hide="phone,tablet">Reason</th>
								</tr>
								</thead>
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
            // `d` is the original data object for the row
            // console.log(employee);
            var description = d.Description;
            var Desc = JSON.parse(description);
            var Subject = Desc['Subject'];
            // console.log(employee_id);
            var Description = Desc['Description'];
            var comDate = new Date(d.ComplaintDate);
            var complainDate = (comDate.getDate() + '/' + (comDate.getMonth()+1) + '/' +  comDate.getFullYear());
            // console.log(Description);
            return '<div class="well well-light">'+
                    '<dl class="dl-horizontal">'+
                    '<dt>Complaint Date</dt>'+'<dd>'+ complainDate +'</dd>'+
                    '<dt>Requested By</dt>'+'<dd>'+d.LastName+' '+ d.FirstName+'</dd>'+
                    '<dt>Subject</dt>'+'<dd>'+Subject+'</dd>'+
                    '<dt>Description</dt>'+'<dd>'+Description+'</dd>'+
                    '<dt>Rejected By</dt>'+'<dd>'+d.RejectedBy+'</dd>'+
                '</dl>'+
                '</div>';
        }

        // clears the variable if left blank
        var table = $('#complaint_tbl').DataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "ajax": "/AllComplaint",
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
                    {"data": "ComplaintID"},
                    {"data": "CaseID"},
                    {"data": "OperatorID"},
                    {"data": "ComplaintDate",
                        "render": function ( data, type, row, meta ) {
                            var d = new Date(data);
                            return (d.getDate() + '/' + (d.getMonth()+1) + '/' +  d.getFullYear());
                            // return d;
                        }
                    },
                    {"data": "TransactionDate",
                        "render": function ( data, type, row, meta ) {
                            var d = new Date(data);
                            return (d.getDate() + '/' + (d.getMonth()+1) + '/' +  d.getFullYear());
                            // return d;
                        }
                    },
                    {"data": "Reason"},
                ],
            "order": [[1, 'desc']],
            "fnDrawCallback": function (oSettings) {
                runAllCharts()
            }
        });
        // Add event listener for opening and closing details
        $('#complaint_tbl tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var d = table.row(this).data();
            var complaintID = d['ComplaintID'];
            // console.log(complaintID);
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }//end else
        });
    });
</script>
@endsection
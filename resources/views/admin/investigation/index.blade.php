@extends('layouts.master')
@section('template_title')
Investigation
@endsection

@section('style_css')
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('dist/jquery-confirm.min.css') }}">
<style>
    table tr.selected{
        background-color: #a5aabd;
    }
</style>
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
						<div class="widget-body">
                            <div id="InvestigateDetail" style="border: 1px dashed #ccc; padding:10px">
                                @if(!($investigate))
                                <div class="row">
                                    <div class="col-sm-8">
                                        <dl class="dl-horizontal">
                                            <dt>Investigate ID  : </dt>
                                            <dd></dd>
                                            <dt>Topic   : </dt>
                                            <dd></dd>
                                            <dt>Website : </dt>
                                            <dd></dd>
                                            <dt>Source    : </dt>
                                            <dd></dd>
                                            <dt>Clients IP Address  : </dt>
                                            <dd></dd>
                                            <dt>Created Date  : </dt>
                                            <dd></dd>
                                            <dt>Expected Date : </dt>
                                            <dd></dd>
                                            <dt>Timestamp   : </dt>
                                            <dd></dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-4">
                                        <div>
                                            <center>
                                                <img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="/img/user-profile/Male.png" alt="Profile Image" />
                                                <div class="upload-btn-wrapper">
                                                    <p>Employee ID – <br>Name : <br>Position : </p>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>{{-- end row --}}
                                @else
                                <div class="row">
                                    <div class="col-sm-8">
                                        <dl class="dl-horizontal">
                                            <dt>Investigate ID  : </dt>
                                            <dd>{{$investigate->InvestigateID}}</dd>
                                            <dt>Topic   : </dt>
                                            <dd>{{$investigate->Name}}</dd>
                                            <dt>Website : </dt>
                                            <dd>{{$investigate->Website}}</dd>
                                            <dt>Source    : </dt>
                                            <dd>{{$investigate->Source}}</dd>
                                            <dt>Clients IP Address  : </dt>
                                            <dd>{{$investigate->RemoteDesktopID}}</dd>
                                            <dt>Created Date  : </dt>
                                            <dd>{{ App\GlobalDeclare::setDateFormat($investigate->CreatedDate)}}</dd>
                                            <dt>Expected Date : </dt>
                                            <dd></dd>
                                            <dt>Timestamp   : </dt>
                                            <dd>{{$investigate->TimeStamp}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-4">
                                        <div>
                                            <center>
                                                <img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="{{ ($inv_opt[0]->ProfileImage != null)? $inv_opt[0]->ProfileImage : '/img/user-profile/Male.png' }}" alt="Profile Image" />
                                                <div class="upload-btn-wrapper">
                                                    <p>Employee ID – {{$inv_opt[0]->OperatorID}}<br>Name : {{$inv_opt[0]->FirstName}} ({{$inv_opt[0]->LastName}})<br>Position : {{$inv_opt[0]->Position}}</p>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="" class="table table-striped table-bordered table-condensed table-hover" width="100%">
                                            <thead>
                                            <tr>
                                                <th data-hide="phone">Step ID</th>
                                                <th data-class="expand"> Description</th>
                                                <th data-hide="phone,tablet"> References</th>
                                                <th data-hide="phone"> Comment</th>
                                                <th data-hide="phone,tablet"> Status</th>
                                                <th data-hide="phone,tablet"> Created Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($investigate_line as $inv_step)
                                            <tr>
                                                <td>{{$inv_step->StepID}}</td>
                                                <td>{{$inv_step->Description}}</td>
                                                <td>{{$inv_step->Reference}}</td>
                                                <td>{{$inv_step->Comment}}</td>
                                                <td>{{$inv_step->Status}}</td>
                                                <td>{{App\GlobalDeclare::setDateFormat($investigate->CreatedDate)}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div style="margin-top: 10px">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table-bordered table-condensed display" id="tbl_investigation" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="40"></th>
                                                <th data-hide="phone">InvestigateID</th>
                                                <th data-class="expand">CaseID</th>
                                                <th data-hide="phone,tablet">Name</th>
                                                <th data-hide="phone,tablet">InvestigateDate</th>
                                            </tr>
                                            </thead>
                                        </table>
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
<script src="{{asset('dist/jquery-confirm.min.js') }}"></script>
<script src="{{asset('js/plugin/select2/select2.min.js')}}"></script>
@include('admin.scripts.dataTable')
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


        // clears the variable if left blank
        var table = $('#tbl_investigation').DataTable({

            "autoWidth": "true",
            "scrollX": true,
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "ajax": "/ajax/investigate",
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
                    {"data": "InvestigateID"},
                    {"data": "CaseID"},
                    {"data": "Name"},
                    {"data": "InvestigateDate",
                        "render": function ( data, type, row, meta ) {
                        var d = new Date(data);
                            return (d.getDate() + '/' + (d.getMonth()+1) + '/' +  d.getFullYear());
                            // return d;
                        }
                    },
                ],
            "order": [[1, 'desc']],
            "fnDrawCallback": function (oSettings) {
                runAllCharts()
            }
        });
        // Add event listener for opening and closing details
        $('#tbl_investigation tbody').on('click', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var d = table.row(this).data();
            var inv_id = d["InvestigateID"];
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '/ajax/investigate/details/'+inv_id,
                data: 'inv_id=' + inv_id,
                success: function (response) {
                    // var data = JSON.parse(response);
                    // console.log(response);
                    $('#InvestigateDetail').replaceWith(response);
                    /*$.dialog({
                        title:'Employee Detail',
                        icon: 'fa fa-info',
                        animateFromElement: false,
                        content: 'HI',
                        type: 'blue',
                        columnClass: 'col-md-8 col-md-offset-2',
                        buttons: {
                            Close: function () {
                                //close
                            },
                        },
                    })*/
                }
            });
        });
    });
</script>
@endsection
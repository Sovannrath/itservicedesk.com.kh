@foreach($inv_header as $investigate)
<div id="InvestigateDetail" style="border: 1px dashed #ccc; padding:10px">
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
				<dd>{{ $investigate->TimeStamp}}</dd>
			</dl>
		</div>
		<div class="col-sm-4">
			<div>
				<center>
					<img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="{{ ($inv_opt[0]->ProfileImage != null)? $inv_opt[0]->ProfileImage : '/img/user-profile/Male.png' }}" alt="Profile Image" />
					<div class="upload-btn-wrapper">
                        <p> Employee ID – {{$inv_opt[0]->OperatorID}}<br>Name : {{$inv_opt[0]->FirstName}} ({{$inv_opt[0]->LastName}})<br>Position : {{$inv_opt[0]->Position}}</p>
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
					<th data-hide="phone"> Comment</th>
					<th data-hide="phone,tablet"> References</th>
					<th data-hide="phone,tablet"> Status</th>
					<th data-hide="phone,tablet"> Created Date</th>
				</tr>
				</thead>
				<tbody>
                @foreach($inv_line as $inv_step)
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
</div>
@endforeach
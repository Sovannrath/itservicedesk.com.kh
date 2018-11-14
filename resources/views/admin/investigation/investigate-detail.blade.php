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
				<dd>Mr. / Operator or IT Supports</dd>
				<dt>Clients IP Address  : </dt>
				<dd>{{$investigate->RemoteDesktopID}}</dd>
				<dt>Created Date  : </dt>
				<dd>{{ $investigate->CreatedDate}}</dd>
				<dt>Expected Date : </dt>
				<dd>15-july-2018</dd>
				<dt>Timestamp   : </dt>
				<dd>{{ $investigate->TimeStamp}}</dd>
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
@endforeach
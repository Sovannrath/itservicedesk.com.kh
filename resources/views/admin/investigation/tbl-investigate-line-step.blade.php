<table id="tbl_investigate" class="table table-condensed table-bordered display" style="width:100%; margin-top: 10px">
	<thead>
	<tr>
		<th>Step</th>
		<th>Description</th>
		<th>Reference</th>
		<th>Comment</th>
		<th>Status</th>
		<th width="10%">Add/Remove</th>
	</tr>
	</thead>
	<tbody>
	@foreach($inv_line as $inv_line)
		<tr>
            <td>{{ $inv_line->StepID }}</td>
			<td>{{$inv_line->Description}}</td>
			<td>{{$inv_line->Reference}}</td>
			<td>{{$inv_line->Comment}}</td>
			<td>{{$inv_line->Status}}</td>
			<td><a href="#" title="Edit" id="inv_edit{{$inv_line->StepID}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
				<a href="#" title="Remove" id="inv_remove{{$inv_line->StepID}}" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a></td>
		</tr>
	@endforeach
	</tbody>
</table>
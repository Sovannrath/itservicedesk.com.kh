@php
use App\GlobalDeclare;
use Carbon\Carbon;
@endphp
@foreach($incidents as $incident)
<form class="form-horizontal" id="fm_delete" method="post" action="{{$incident->CaseID}}/reject-incident" enctype="multipart/form-data">
	{{ csrf_field() }}
	<fieldset>
		<div class="form-group">
			<label class="col-md-2 control-label">Case ID</label>
			<div class="col-md-10">
				<input disabled="" name="case_id" readonly class="text-primary form-control" value="{{$incident->CaseID}}" type="text"  style="background-color: #fafafa">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Reason</label>
			<div class="col-md-10">
				<textarea id="reason" name="reason" class="text-primary form-control" rows="4" style="background-color: #fafafa"></textarea>
			</div>
		</div>
	</fieldset>
    <input id="submit" type="submit" name="submit" hidden>
</form>
@endforeach
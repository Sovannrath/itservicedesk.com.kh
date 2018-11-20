@php
use App\GlobalDeclare;
use Carbon\Carbon;
@endphp
@foreach($incident as $data)
<form class="form-horizontal" id="fm_incident" action="/user/incident/{{$data->CaseID}}/update" method="post">
    {{ csrf_field() }}
    <fieldset>
        <div class="form-group" hidden>
            <label class="col-md-2 control-label">Case ID</label>
            <div class="col-md-10">
                <input name="case_id" readonly class="text-primary form-control" value="{{$data->CaseID}}" type="text"  style="background-color: #fafafa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Subject</label>
            <div class="col-md-10">
                <input name="subject" id="subject" class="text-primary form-control" value="{{$data->Subject}}" type="text"style="background-color: #fafafa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Description</label>
            <div class="col-md-10">
                <textarea name="description" class="text-primary form-control" rows="4" style="background-color: #fafafa">{{$data->Description}}</textarea>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="col-md-2 control-label">Requested By</label>
            <div class="col-md-4">
                <input readonly name="created_by" class="text-primary form-control" value="{{GlobalDeclare::getEmployeeName($data->EmployeeID)}}" type="text"  style="background-color: #fafafa">
            </div>
            <label class="col-md-2 control-label">Requested Date</label>
            <div class="col-md-4">
                <input readonly name="created_date" class="text-primary form-control" value="{{ GlobalDeclare::setDateFormat($data->CreatedDate)}}" type="text"  style="background-color: #fafafa">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="col-md-2 control-label">Status</label>
            <div class="col-md-4">
                <input readonly name="status" id="status" class="text-primary form-control" value="{{ GlobalDeclare::getStatus($data->Status)}}" type="text"  style="background-color: #fafafa">
            </div>
            <label class="col-md-2 control-label">Assigned To</label>
            <div class="col-md-4">
                <input readonly name="assigned_to" class="text-primary form-control" value="{{ GlobalDeclare::getEmployeeName($data->AssignedTo)}}" type="text"  style="background-color: #fafafa">
            </div>
        </div>
    </fieldset>
</form>
@endforeach
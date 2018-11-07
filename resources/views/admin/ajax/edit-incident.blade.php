@foreach($incident as $Incident)
<form id="edit_incident" class="form-horizontal">
    {{ csrf_field() }}
    @php
    date_default_timezone_set("Asia/Bangkok");
    $dayToSeconds = 86400;
    $cur_date = date("Y-m-d h:i:s");
    @endphp

    <fieldset>
        <div id="alert_message"class="flash-message" data-expires="5000">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
            @endforeach
        </div> {{-- end .flash-message --}}
    </fieldset>
    <fieldset>
        <div class="form-group">
            <input type="text" value="{{ $Incident->CaseID}}" style="display: none" class="form-control" name="case_id">
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-lg-2">Subject <span class="text-danger">*</span></label>
            <div class="col-md-10 col-lg-10">
                <div class="icon-addon addon-sm">
                    <input type="text" value="{{ $Incident->Subject}}" style="background-color: #fafafa" class="form-control" name="subject">
                    <label class="fa fa-book" rel="tooltip" title="Subject"></label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2">Requested By <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <select class="form-control" name="created_by" style="background-color: #fafafa">
                        @foreach(App\Employee::where('EmployeeID', '=', $Incident->EmployeeID)->get() as $emp)
                        <option readonly="" value="{{$emp->EmployeeID}}" {{ ($emp->EmployeeID == $Incident->EmployeeID) ? 'selected' : '' }}>{{$emp->LastName}} {{$emp->FirstName}}</option>
                        @endforeach
                    </select>
                    <label class="fa fa-user" rel="tooltip" title="Created By"></label>
                </div>
            </div>
            <label class="control-label col-md-2">Created Date <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <input type="text" value="{{$cur_date}}" class="form-control" name="created_date" style="background-color: #fafafa" readonly="readonly">
                    <label class="fa fa-calendar" rel="tooltip" title="Created Date"></label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2">Status <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <select class="form-control " name="status" style="background-color: #fafafa">
                        <option value="1" {{($Incident->Status == 1)? 'selected' : ''}}>Open</option>
                        <option value="2" {{($Incident->Status == 2)? 'selected' : ''}}>Rejected</option>
                        <option value="3" {{($Incident->Status == 3)? 'selected' : ''}}>Internal</option>
                        <option value="4" {{($Incident->Status == 4)? 'selected' : ''}}>In Process</option>
                        <option value="5" {{($Incident->Status ==   5)? 'selected' : ''}}>In Progress</option>
                        <option value="6" {{($Incident->Status == 6)? 'selected' : ''}}>On Hold</option>
                        <option value="7" {{($Incident->Status == 7)? 'selected' : ''}}>Resolved</option>
                        <option value="8" {{($Incident->Status == 8)? 'selected' : ''}}>Pending</option>
                        <option value="9" {{($Incident->Status == 9)? 'selected' : ''}}>Re-opened</option>
                        <option value="10" {{($Incident->Status == 10)? 'selected' : ''}}>Closed</option>
                    </select>
                    <label class="fa fa-tasks" rel="tooltip" title="Status"></label>
                </div>
            </div>
            <label class="control-label col-md-2">Impact <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <select class="form-control" name="impact" style="background-color: #fafafa">
                        <option value="1" {{ ($Incident->Impact == 1) ? 'selected' : '' }}>Low</option>
                        <option value="2" {{ ($Incident->Impact == 2) ? 'selected' : '' }}>Medium</option>
                        <option value="3" {{ ($Incident->Impact == 3) ? 'selected' : '' }}>High</option>
                    </select>
                    <label class="fa fa-flash" rel="tooltip" title="Impact"></label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2">Urgency <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <select class="form-control" name="urgency" style="background-color: #fafafa">
                        <option value="1" {{ ($Incident->Urgency == 1) ? 'selected' : '' }}>Low</option>
                        <option value="2" {{ ($Incident->Urgency == 2) ? 'selected' : '' }}>Medium</option>
                        <option value="3" {{ ($Incident->Urgency == 3) ? 'selected' : '' }}>High</option>
                    </select>
                    <label class="fa fa-fire" rel="tooltip" title="Urgency"></label>
                </div>
            </div>
            <label class="control-label col-md-2">Priority <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <select class="form-control" name="priority" style="background-color: #fafafa">
                        <option value="1" {{ ($Incident->Priority == 1) ? 'selected' : '' }}>Low</option>
                        <option value="2" {{ ($Incident->Priority == 2) ? 'selected' : '' }}>Medium</option>
                        <option value="3" {{ ($Incident->Priority == 3) ? 'selected' : '' }}>High</option>
                        <option value="4" {{ ($Incident->Priority == 4) ? 'selected' : '' }}>Very High</option>
                        <option value="5" {{ ($Incident->Priority == 5) ? 'selected' : '' }}>Urgent</option>
                    </select>
                    <label class="fa fa-fire" rel="tooltip" title="Urgency"></label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-lg-2">Description <span class="text-danger">*</span></label>
            <div class="col-md-10 col-lg-10">
                <textarea class="form-control" rows="4" name="description" style="background-color: #fafafa">{{ $Incident->Description}}</textarea>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-4 col-lg-2">Comment</label>
            <div class="col-md-8 col-lg-10">
                <textarea class="form-control" rows="3" name="comment" style="background-color: #fafafa; font-style: italic">{{ $Incident->Comment}}</textarea>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2">Assigned To <span class="text-danger">*</span></label>
            <div class="col-md-4">
                <div class="icon-addon addon-sm">
                    <i class="icon-append fa fa-user"></i>
                    <select class="form-control" name="operator" style="background-color: #fafafa">
                        @foreach(App\Operator::selectOperatorAsName() as $operator)
                        <option value="{{ $operator->OperatorID }}">{{ $operator->LastName}} {{ $operator->FirstName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label class="control-label col-md-2">Attach files</label>
            <div class="col-md-4">
                <div class="">
<!--                    <input id="" class="form-control" style="background-color: #fafafa" type="file" name="attach">-->
                    <input type="file" name="file" id="myfile">
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group">
            <label class="control-label control-label col-md-2 col-lg-2"></label>
            <div class="checkbox col-md-10 col-lg-10">
                <div class="icon-addon addon-sm">
                    <label>
                        <input class="" value="1" {{ ($Incident->CcManager == 1) ? 'checked' : '' }} type="checkbox" name="cc_manager">CC to Manager (Optional)
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
<!--    <input type="submit" id="submit_btn" name="submit" style="display:none;" >-->
</form>
@endforeach


@foreach($incident as $Incident)
<!-- widget content -->
<div class="widget-body">
    <div class="step-content">
            <div class="step-pane active" id="step1">
                <!-- wizard form starts here -->
                <form id="fm_incident" action="/{{$Incident->CaseID}}/assign" method="post" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                        <dl class="dl-horizontal">
                            <dt>Subject</dt>
                            <dd>{{ $Incident->Subject}}</dd>
                            <dt>Description</dt>
                            <dd>{{ $Incident->Description}}</dd>
                            <dt>Comment</dt>
                            <dd>{{ $Incident->Comment}}</dd>
                            <dt>Status</dt>
                            <dd>{{ App\GlobalDeclare::getStatus($Incident->Status)}}</dd>
                            <dt>Impact</dt>
                            <dd>{{ App\GlobalDeclare::getImpactText($Incident->Impact)}}</dd>
                            <dt>Urgency</dt>
                            <dd>{{ App\GlobalDeclare::getUrgencyText($Incident->Urgency)}}</dd>
                            <dt>Priority</dt>
                            <dd>{{ App\GlobalDeclare::getPriority($Incident->Priority)}}</dd>
                            <dt>Requested By</dt>
                            <dd>{{ App\GlobalDeclare::getEmployeeName($Incident->EmployeeID)}}</dd>
                            <dt>Requested Date</dt>
                            <dd>{{ App\GlobalDeclare::setDateFormat($Incident->CreatedDate)}}</dd>
                        </dl>
                    </fieldset>
                    <hr class="simple">
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label col-md-2">Level 1 <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <div class="icon-addon addon-sm">
                                    <i class="icon-append fa fa-user"></i>
                                    <select class="form-control" name="assign" style="background-color: #fafafa">
                                        @foreach(App\Operator::selectOperatorType(1) as $operator)
                                        <option value="{{ $operator->EmployeeID }}">{{ $operator->LastName}} {{ $operator->FirstName }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <label class="control-label control-label col-md-2 col-lg-2"></label>
                            <div class="checkbox col-md-4 col-lg-4">
                                <div class="icon-addon addon-sm">
                                    <label>
                                        <input class="" value="1" {{ ($Incident->CcManager == 1) ? 'checked' : '' }} type="checkbox" name="cc_manager">CC to Manager (Optional)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
    </div>
</div>
@endforeach
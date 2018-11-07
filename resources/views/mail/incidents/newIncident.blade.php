@php
use App\Employee;
$employee = Employee::getEmployeeByID($incident->EmployeeID);
@endphp
@component('mail::message')
@php
@endphp
Hello,<br>
<strong>{{ $employee->FirstName }}</strong> created new incident. Please click button below to go to details.

@component('mail::button', ['url' => 'http://itservicedesk.com.kh:800/incidents'])
View Incident
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

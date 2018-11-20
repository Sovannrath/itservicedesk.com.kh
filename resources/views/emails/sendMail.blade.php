@component('mail::message')
<center>
<h4>Dear {{ $userData[0]->UserName }} ( UserID : {{ $userData[0]->UserID }})</h4><br>
<p>Welcome to our IT Service Desk – N.V.C Corporation Co., Ltd. Operator has been registered you are our employee. So if it was you, please confirm our link :</p>

@component('mail::button', ['url' => $url])
Click here to confirm your identity
@endcomponent

<p>Request ID: {{ $userData[0]->RequestID }}</p>
<p>Employee ID: {{ $userData[0]->EmployeeID }}</p>
<p>Default Password: ERP@2018</p>
<p>Reason: {{ $userData[0]->Reason }}</p>
<p>The link will be expired within a week and can be used only once. If the link above is not displayed or does not work, copy and paste the link below to the address bar of your browser:</p>
<p style="font-size: 12px; text-align: center">http://itservicedesk.com.kh:800/api/user/approve/UserID={{$userData[0]->UserID}}/RequestID={{$userData[0]->RequestID}}</p>

<p><center>Best Regards,<br>
IT Operator Service and Group</center></p>

<p style="font-size:11px;color: #A9A9A9;">This e-mail may contain trade secrets or privileged, undisclosed, or otherwise confidential information. If you have received this e-mail in error, you are hereby notified that any review, copying, or distribution of it is strictly prohibited. Please inform us immediately and destroy the original transmittal. Thank you for your cooperation.    
Click the button below to verify your email address and finish setting up your profile.</p>
</center>
@endcomponent
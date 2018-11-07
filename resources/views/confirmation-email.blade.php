@component('mail::messege')
Confirm your account!

Dear $employee->FirstName ! {{$employee->UserID}}

Welcom to our service desk – N.V.C Corporation Co., Ltd. Operator has been registered you are our employee so if was you please confirm our link :

@component('mail::button', ['url'=>'']);
@endcomponent

Click here to confirm your identity

The link expires in 2 hours, and can be used only once. If the link above is not displayed or does not work, copy and paste the link below to the address bar of your browser
Www.itservicedesk.com.kh\”UserID and Password with Encryption“\”RequestID=”


Best Regards, IT Operator Service and Group

This e-mail may contain trade secrets or privileged, undisclosed, or otherwise confidential information. If you have received this e-mail in error, you are hereby notified that any review, copying, or distribution of it is strictly prohibited. Please inform us immediately and destroy the original transmittal. Thank you for your cooperation.

@endcomponent
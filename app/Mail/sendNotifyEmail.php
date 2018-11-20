<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendNotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $userData;

    public function __construct($userData)
    {
        //
        $this->userData = $userData;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $employee = $this->userData;
//        dd($employee);
        $user_id = $employee[0]->UserID;
        $request_id = $employee[0]->RequestID;
        $url = route('email_confirm', ['user_id'=>$user_id, 'request_id'=>$request_id]);
//        dd($url);

        return $this->from('operator@itservicedesk.com.kh', 'Operator')
                ->subject('Confirm your registration account')
                ->markdown('emails.sendMail')
                ->with(['userData'=>$employee, 'url'=>$url]);
    }
}

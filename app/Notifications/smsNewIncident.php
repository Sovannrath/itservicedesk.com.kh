<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\NexmoMessage;

class smsNewIncident extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

	/**
	 * Get the Nexmo / SMS representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return NexmoMessage
	 */
	public function toNexmo($notifiable)
	{
		return (new NexmoMessage)
			->content('Your SMS message content')
			->from('85510557635');
	}
}

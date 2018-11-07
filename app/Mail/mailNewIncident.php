<?php

	namespace App\Mail;

	use Illuminate\Bus\Queueable;
	use Illuminate\Mail\Mailable;
	use Illuminate\Queue\SerializesModels;
	use Illuminate\Contracts\Queue\ShouldQueue;

	class mailNewIncident extends Mailable
	{
		use Queueable, SerializesModels;

		/**
		 * Create a new message instance.
		 *
		 * @return void
		 */

		public $incident;

		public function __construct($incident)
		{
			//
			$this->incident = $incident;

		}
		/**
		 * Build the message.
		 *
		 * @return $this
		 */
		public function build()
		{

			return $this->from('operator@itservicedesk.com.kh', 'Operator')
				->subject('New Incident created')
				->markdown('mail.incidents.newIncident')
				->with(['incident', $this->incident]);
		}
	}
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserComplaint extends Model
{
    //
	use Notifiable;

	protected $table = 'UserComplaints';

	protected $primaryKey = 'ComplaintID';
	public $incrementing = false;

	public $timestamps = false;
}

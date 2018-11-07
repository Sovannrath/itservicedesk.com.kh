<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
	use Notifiable;

    protected $table = 'Incident';
    public $timestamps = false;
    protected $primaryKey = 'CaseID';
	public $incrementing = false;

    protected $fillable = [
    	'CaseID','EmployeeID','Subject','Description','AttachFile','Status','CcManager'
    ];
    // public function select($id)
    // {
    // 	return Employee::table('Employee')->where('EmailID', $id);
    // }
}

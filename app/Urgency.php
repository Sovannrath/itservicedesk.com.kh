<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urgency extends Model
{
    protected $table = 'Urgency';
    protected $primaryKey = 'UrgencyID';

    public $timestamps = false;
}

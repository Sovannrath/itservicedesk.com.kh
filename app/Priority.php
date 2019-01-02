<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'Priority';
    protected $primaryKey = 'PriorityID';

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    protected $table = 'Impact';
    protected $primaryKey = 'ImpactID';

    public $timestamps = false;
}

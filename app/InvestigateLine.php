<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigateLine extends Model
{
    protected $table = 'InvestigateLine';
    public $primaryKey = 'StepID';
    public $timestamps = false;
}

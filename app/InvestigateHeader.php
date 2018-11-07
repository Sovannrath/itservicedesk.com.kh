<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigateHeader extends Model
{
	protected $table = 'InvestigateHeader';
    protected $primaryKey = 'InvestigateID';
    public $incrementing = false;

	public $timestamps = false;

//	const CREATED_AT = 'CreatedDate';
//	const UPDATED_AT = 'UpdatedDate';
}

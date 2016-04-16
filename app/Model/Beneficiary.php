<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends BaseModel
{
    protected $primaryKey = 'id';
	protected $table = 'beneficiaries';
	protected $fillable = array('beneficiary_num', 'firstname', 'lastname','date_of_birth','sex','marital_status', 'phone_number','address','state_of_origin','employment_status','occupation');

}

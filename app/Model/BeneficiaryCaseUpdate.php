<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryCaseUpdate extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'beneficiary_case_update';
    protected $fillable = array('case_id', 'updated_by','entry_date','comment');

}

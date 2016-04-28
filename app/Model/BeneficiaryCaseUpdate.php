<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryCaseUpdate extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'case_updates';
    protected $fillable = array('case_id', 'updated_by','entry_date','comment');

    public function beneficiaryCase()
    {
        return $this->belongsTo('App\Model\BeneficiaryCase','case_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by');
    }

}

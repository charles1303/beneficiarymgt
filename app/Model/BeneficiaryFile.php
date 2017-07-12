<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryFile extends Model
{
    protected $fillable = ['beneficiary_id', 'filename'];

    public function beneficiary()
    {
        return $this->belongsTo('App\Model\Beneficiary');
    }

    public static function getBeneficiaryFiles($beneficiaryId){
        $files = BeneficiaryFile::with('beneficiary')->where('beneficiary_id','=', $beneficiaryId)
            ->get();
        return $files;
    }

    public function getFileName(){
        return end(explode('/',$this->filename));
    }
}

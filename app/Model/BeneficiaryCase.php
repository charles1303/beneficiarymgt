<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryCase extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'beneficiary_case';
    protected $fillable = array('beneficiary_id', 'case_officer_id', 'back_up_case_officer_id','entry_date','comment','amount', 'case_status','case_num','case_type_id');

    public function beneficiary()
    {
        return $this->belongsTo('App\Model\Beneficiary');
    }

    public function caseOfficer()
    {
        return $this->belongsTo('App\User','case_officer_id');
    }

    public function backupCaseOfficer()
    {
        return $this->belongsTo('App\User','back_up_case_officer_id');
    }

    public function caseType()
    {
        return $this->belongsTo('App\Model\CaseType','case_type_id');
    }

    public function getCaseByCaseOfficer($case_officer_id){
        $cases = BeneficiaryCase::with('beneficiary')->with('caseOfficer')->with('backupCaseOfficer')->with('caseType')->where('case_officer_id','=', $case_officer_id)
                ->orderBy('entry_date', 'desc')
                ->get();


        return $cases;
    }

    public function getDuration()
    {
        $from=date_create(date('Y-m-d'));
        $to=date_create('2016-04-31');
        $diff=date_diff($from,$to);
        return $diff->format('%R%a ');
    }
}

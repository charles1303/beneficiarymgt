<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryCase extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'beneficiary_case';
    protected $fillable = array('beneficiary_id', 'case_officer_id', 'back_up_case_officer_id','entry_date','comment','amount','amount_released','amount_requested', 'case_status','case_num','case_type_id');

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


    public function getMyCases($currentUser){
        if($currentUser->group == '1') {
            $cases = $this->getCaseByCaseOfficer($currentUser->id);
        }elseif($currentUser->group == '3') {
            $cases = $this->getCasesForChurchOffice($currentUser->id);
        }else{
            $cases = $this->getCases();
        }
        return $cases;

    }

    private function getCaseByCaseOfficer($case_officer_id){
        $cases = BeneficiaryCase::with('beneficiary')->with('caseOfficer')->with('backupCaseOfficer')->with('caseType')->where('case_officer_id','=', $case_officer_id)
                ->orderBy('entry_date', 'desc')
                ->get();


        return $cases;
    }

    private function getCases(){
        $cases = BeneficiaryCase::with('beneficiary')->with('caseOfficer')->with('backupCaseOfficer')->with('caseType')
            ->orderBy('entry_date', 'desc')
            ->get();


        return $cases;
    }

    private function getCasesForChurchOffice($case_officer_id){
        $cases = BeneficiaryCase::with('beneficiary')->with('caseOfficer')->with('backupCaseOfficer')->with('caseType')->where('case_status','=', '1')
            ->orWhere('case_officer_id','=', $case_officer_id)
            ->orderBy('entry_date', 'desc')
            ->get();


        return $cases;
    }

    public function getDuration()
    {
        $from=date_create(date('Y-m-d'));
        $to=date_create($this->entry_date);
        $diff=date_diff($from,$to);
        return $diff->format('%R%a ');
    }

    public static function getBeneficiaryCaseByBeneficiaryId($currentUser,$id){

        if($currentUser->group == '1') {
            $cases = self::getCaseByBeneficiaryIdForCaseOfficer($currentUser,$id);
        }elseif($currentUser->group == '3') {
            $cases = self::getCaseByBeneficiaryIdForChurchOfficer($currentUser,$id);
        }else{
            $cases = self::getCaseByBeneficiaryId($id);
        }


        return $cases;
    }

    private static function getCaseByBeneficiaryId($id){
        $cases = BeneficiaryCase::with('beneficiary')->where('beneficiary_id','=', $id)
            ->get();
        return $cases;
    }

    private static function getCaseByBeneficiaryIdForCaseOfficer($currentUser,$id){
        $cases = BeneficiaryCase::with('beneficiary')->where('beneficiary_id','=', $id)
            ->where('case_officer_id','=', $currentUser->id)
            ->get();
        return $cases;
    }

    private static function getCaseByBeneficiaryIdForChurchOfficer($currentUser,$id){
        $cases = BeneficiaryCase::with('beneficiary')->where('beneficiary_id','=', $id)
            ->where('case_status','=', '1')
            ->where('case_officer_id','=', $currentUser->id)
            ->get();
        return $cases;
    }

    public function getMaxId(){
        $maxId = DB::table('beneficiary_case')
            ->select(DB::raw('max(id) as id'))
            ->get();
        return $maxId;
    }
}

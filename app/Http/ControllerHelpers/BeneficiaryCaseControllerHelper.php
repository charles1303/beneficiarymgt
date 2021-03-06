<?php
/**
 * Created by PhpStorm.
 * User: charles
 * Date: 4/23/16
 * Time: 2:52 PM
 */

namespace App\Http\ControllerHelpers;

use App\Http\Requests\BeneficiaryCaseRequest;

use App\Model\BeneficiaryCase;
use App\Model\Beneficiary;
use App\Model\BeneficiaryCaseUpdate;
use App\User;
use App\Model\CaseType;
use Auth;
use Carbon\Carbon as CarbonDate;


class BeneficiaryCaseControllerHelper {

    public function createBeneficiaryCaseObject(BeneficiaryCaseRequest $request){

        $currentUser = Auth::user();
        $case = new BeneficiaryCase();

        $beneficiary = Beneficiary::find($request->get('beneficiary_id'));
        $case->beneficiary()->associate($beneficiary);
        $case_officer = User::find($currentUser->id);
        $case->caseOfficer()->associate($case_officer);
        $back_up_case_officer = User::find($request->get('bkup_case_officer'));
        $case->backupCaseOfficer()->associate($back_up_case_officer);
        $case->entry_date = date("Y-m-d");
        $case->comment = $request->get('case_descr');
        $case->amount_requested = $request->get('amount_req');
        $case->case_status = '0';
        $case = $this->generateCasFileNum($case);
        $case_type = CaseType::find((int)$request->get('case_type'));
        $case->caseType()->associate($case_type);
        return $case;

    }

    public function updateBeneficiaryCaseObject(BeneficiaryCaseRequest $request){

        try{
            $currentUser = Auth::user();
            $caseUpdate = new BeneficiaryCaseUpdate();
            $beneficiaryCase = BeneficiaryCase::find($request->get('case_id'));
            $beneficiaryCase->amount_released = $request->get('amount_released');
            if($currentUser->group != '1'){
                $beneficiaryCase->case_status = $request->get('case_status');
            }
            $beneficiaryCase->save();
            $caseUpdate->beneficiaryCase()->associate($beneficiaryCase);
            $case_officer = User::find($currentUser->id);
            $caseUpdate->updatedBy()->associate($case_officer);
            $caseUpdate->comment = $request->get('case_update');
            $caseUpdate->entry_date = date('Y-m-d');
            $caseUpdate->save();

            return $caseUpdate;
        }catch (Exception $ex){
            throw $ex;
        }


    }

   private function generateCasFileNum(BeneficiaryCase $beneficiaryCase){
        $date = CarbonDate::now();
        $maxId = $beneficiaryCase->getMaxId();
        $id = $maxId[0]->id;
        if(!isset($id)){
            $id = 0;
        }
        $beneficiaryCase->case_num = $date->year . $date->month . ((int)$id+1);
        return $beneficiaryCase;


    }

    public function getCaseUpdates($case_id){
        $caseDetails = [];
        $beneficiaryCaseUpdate = new BeneficiaryCaseUpdate();
        $caseUpdates = $beneficiaryCaseUpdate->getCaseUpdates($case_id);
        $caseDetails['case'] = BeneficiaryCase::find($case_id);
        if(count($caseUpdates) > 0){
            $caseDetails['updates'] = $caseUpdates;
        }
        return $caseDetails;
    }

    public function getCases($request){
        $caseModel = new BeneficiaryCase();
        $start_date = $request->get('dt_start');
        $end_date = $request->get('dt_end');

        if(isset($start_date) && isset($end_date)){
            return $caseModel->getCasesByDateRange($start_date,$end_date);
        }else{
            return $caseModel->getCases();
        }
    }

}
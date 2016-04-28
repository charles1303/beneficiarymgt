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
        $case->amount = $request->get('amount_req');
        $case->case_status = '0';
        $case = $this->generateCasFileNum($case);
        $case_type = CaseType::find(1);
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
        $maxId = $beneficiaryCase->getMaxId();
        $id = $maxId[0]->id;
        $beneficiaryCase->case_num = 'CF' . '000' . $id;
        return $beneficiaryCase;


    }

}
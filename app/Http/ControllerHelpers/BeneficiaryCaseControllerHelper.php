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
        $case->case_status = $request->get('case_status');
        $case->case_num = 'XXXX';
        //$case_type = CaseType::find($request->get('case_type'));
        $case_type = CaseType::find(1);
        $case->caseType()->associate($case_type);
        return $case;

    }

}
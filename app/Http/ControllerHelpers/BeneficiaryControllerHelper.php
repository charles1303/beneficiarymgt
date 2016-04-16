<?php
/**
 * Created by PhpStorm.
 * User: charles
 * Date: 4/16/16
 * Time: 10:40 PM
 */

namespace App\Http\ControllerHelpers;

use App\Http\Requests\BeneficiaryFormRequest;

use App\Model\Beneficiary;


class BeneficiaryControllerHelper {

    public function createBeneficiaryObject(BeneficiaryFormRequest $request){

        $beneficiary = new Beneficiary();

        $beneficiary->beneficiary_num = $request->get('beneficiary_num');
        $beneficiary->firstname = $request->get('first_name');
        $beneficiary->lastname = $request->get('last_name');
        $date=date_create($request->get('date_of_birth'));
        $beneficiary->date_of_birth = date_format($date,"Y-m-d");
        $beneficiary->sex = $request->get('sex');
        $beneficiary->marital_status = $request->get('marital_status');
        $beneficiary->phone_number = $request->get('phone_no');
        $beneficiary->address = $request->get('address');
        $beneficiary->state_of_origin = $request->get('state_of_origin');
        $beneficiary->employment_status = $request->get('employment_status');
        $beneficiary->occupation = $request->get('occupation');

        return $beneficiary;

    }

}
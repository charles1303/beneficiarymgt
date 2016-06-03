<?php

namespace App\Http\Controllers;

use App\Http\ControllerHelpers\BeneficiaryCaseControllerHelper;
use App\Model\Beneficiary;
use App\Model\BeneficiaryCase;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AdminController extends Controller
{
    public function getAllUsers()
    {

        $currentUser = Auth::user();

        $users = User::all();
        return view('layouts/beneficiary/users',['users' => $users]);
    }

    public function getAllBeneficiaries()
    {

        $currentUser = Auth::user();

        $beneficiaries = Beneficiary::all();
        return view('layouts/beneficiary/beneficiaries',['beneficiaries' => $beneficiaries]);
    }

    public function getAllBeneficiaryCases(Request $request)
    {

        $caseCntrlHelper = new BeneficiaryCaseControllerHelper();
        $currentUser = Auth::user();
        $start_date = $request->get('dt_start');
        $end_date = $request->get('dt_end');

        $cases = $caseCntrlHelper->getCases($request);
        return view('layouts/beneficiary/beneficiarycases',['cases' => $cases,'start_date' => $start_date,'end_date' => $end_date]);
    }
}

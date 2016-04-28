<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use App\Model\BeneficiaryCase;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentUser = Auth::user();

        $beneficiaryCase = new BeneficiaryCase();
        if($currentUser->group == '1') {
            $cases = $beneficiaryCase->getCaseByCaseOfficer($currentUser->id);
        }elseif($currentUser->group == '3') {
            $cases = $beneficiaryCase->getCasesForChurchOffice($currentUser->id);
        }else{
            $cases = $beneficiaryCase->getCases();
        }

        return view('home',['cases' => $cases]);
    }
}

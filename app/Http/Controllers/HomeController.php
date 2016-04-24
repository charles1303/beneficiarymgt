<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        $beneficiaryCase = new BeneficiaryCase();
        $cases = $beneficiaryCase->getCaseByCaseOfficer(Auth::user()->id);
        return view('home',['cases' => $cases]);
    }
}

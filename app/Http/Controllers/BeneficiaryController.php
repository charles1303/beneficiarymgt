<?php

namespace App\Http\Controllers;

use App\Model\Beneficiary;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\BeneficiaryFormRequest;

use App\Http\ControllerHelpers\BeneficiaryControllerHelper;



class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return '';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts/beneficiary/createbeneficiary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BeneficiaryFormRequest $request)
    {

        $message = '';
        $messageClass = '';
        try{
            $beneficiaryControllerHelper = new BeneficiaryControllerHelper();
            $beneficiary = $beneficiaryControllerHelper->createBeneficiaryObject($request);
            $beneficiary->save();
            $message = 'Beneficiary has been created!';
            $messageClass = 'alert alert-success';
        }catch(Exception $ex){
            $message = 'Error creating beneficiary. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-danger';
            //throw $ex;
        }

        return view('layouts/beneficiary/createbeneficiary',array('message' =>$message,'messageClass' => $messageClass));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($name = null)
    {
        //return view('hello',array('name' => $name));
        return view('layouts/beneficiary/show',array('name' => $name,'message' =>'Your beneficiary has been created!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadAllBeneficiaries(){

        $allBeneficiaries = Beneficiary::all();
        return response()->json(['allBeneficiaries' => $allBeneficiaries->toArray()]);
    }

    public function searchBeneficiary(Request $request){

        $q = $request->get('q');
        $beneficiaryModel = new Beneficiary();
        $allBeneficiaries = $beneficiaryModel->searchBeneficiary($q);
        return response()->json($allBeneficiaries);
    }

    public function beneficiaryById(Request $request){
        $id = $request->get('id');
        $beneficiary = Beneficiary::find($id);
        return response()->json($beneficiary);

    }
}

<?php

namespace App\Http\Controllers;

use App\Model\BeneficiaryCase;
use App\Model\Beneficiary;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\BeneficiaryCaseRequest;
use Auth;

use App\Http\ControllerHelpers\BeneficiaryCaseControllerHelper;
use App\Http\Util\EmailUtil;
class BeneficiaryCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('layouts/beneficiary/mypendingcases');
    }

    public function getCase()
    {
        return view('layouts/beneficiary/updatecase');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts/beneficiary/createcase');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BeneficiaryCaseRequest $request)
    {


    }

    public function createCase(BeneficiaryCaseRequest $request)
    {
        $message = '';
        $messageClass = '';
        try{
            $beneficiaryCaseControllerHelper = new BeneficiaryCaseControllerHelper();
            $case = $beneficiaryCaseControllerHelper->createBeneficiaryCaseObject($request);
            $case->save();
            $message = 'Case has been created!';
            $messageClass = 'alert alert-success';
            EmailUtil::sendEmailReminder('recipient@gmail.com','A case has been created for beneficiary','Beneficiary Case');
        }catch(Exception $ex){
            $message = 'Error creating case. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-error';
            //throw $ex;
        }

        return view('layouts/beneficiary/createcase',array('message' =>$message,'messageClass' => $messageClass));

    }

    public function updateCase(BeneficiaryCaseRequest $request)
    {
        $message = '';
        $messageClass = '';
        try{
            $beneficiaryCaseControllerHelper = new BeneficiaryCaseControllerHelper();
            $case = $beneficiaryCaseControllerHelper->updateBeneficiaryCaseObject($request);
            if(isset($case->id)){
                $message = 'Case has been updated!';
                $messageClass = 'alert alert-success';
            }

            //EmailUtil::sendEmailReminder('recipient@gmail.com','A case has been created for beneficiary','Beneficiary Case');
        }catch(Exception $ex){
            $message = 'Error updating case. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-error';
            //throw $ex;
        }

        return view('layouts/beneficiary/updatecase',array('message' =>$message,'messageClass' => $messageClass));

    }

    public function viewCase($id)
    {

        $message = '';
        $messageClass = '';
        $caseUpdates = null;

        try{
            $beneficiaryCaseControllerHelper = new BeneficiaryCaseControllerHelper();
            $caseUpdates = $beneficiaryCaseControllerHelper->getCaseUpdates($id);
        }catch(Exception $ex){
            $message = 'Error updating case. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-error';
            //throw $ex;
        }

        return view('layouts/beneficiary/viewcaseupdates',array('caseUpdates'=>$caseUpdates,'message' =>$message,'messageClass' => $messageClass));

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

    public function beneficiaryCaseById(Request $request){
        $id = $request->get('id');
        //$beneficiaryCases = BeneficiaryCase::getCaseByBeneficiaryId($id);
        $currentUser = Auth::user();
        $beneficiaryCases = BeneficiaryCase::getBeneficiaryCaseByBeneficiaryId($currentUser,$id);
        $json = response()->json($beneficiaryCases);
        return $json;

    }

    public function searchBeneficiaryCaseByBeneficiary(Request $request){

        $q = $request->get('q');
        $beneficiaryModel = new Beneficiary();
        $allBeneficiaries = $beneficiaryModel->searchBeneficiary($q);
        return response()->json($allBeneficiaries);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\ControllerHelpers\UserControllerHelper;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\User;
use Exception;

class UserController extends Controller
{
    //
    public function searchCaseOfficer(Request $request){

        $q = $request->get('q');
        $userModel = new User();
        $allUsers = $userModel->searchUsers($q);
        return response()->json($allUsers);
    }

    public function resetUserStatus(){
        $userCntrlHelper = new UserControllerHelper();

        try{
            $data = Input::all();
            $userCntrlHelper->resetUserStatus($data);

            $response = array(
                'messageClass' => 'alert alert-success',
                'status' => 'success',
                'msg' => 'Action carried out Successfully!',
            );
        }catch (Exception $ex){
            $response = array(
                'messageClass' => 'alert alert-danger',
                'status' => 'error',
                'msg' => 'Error carrying out action!  Please Contact Administrator',
            );
        }

        return Response::json($response);
    }

    public function updateUser(Request $request){
        $userCntrlHelper = new UserControllerHelper();
        $message = '';
        $messageClass = '';

        try{
            $user = $userCntrlHelper->updateUser($request);
            $message = 'User has been updated!';
            $messageClass = 'alert alert-success';
        }catch (Exception $ex){
            $message = 'Error updating user. Please contact Administrator! ' . $ex->getMessage();
            $messageClass = 'alert alert-danger';
        }

        //return view('layouts/beneficiary/users',array('message' =>$message,'messageClass' => $messageClass,'user' => $user));
        return redirect('users');
    }

    public function viewUser($id)
    {
        try{
            $userCntrlHelper = new UserControllerHelper();
            $user = $userCntrlHelper->getUser($id);
        }catch(Exception $ex){
            throw $ex;
        }

        return view('layouts/beneficiary/updateuser',array('user'=>$user));

    }

    public function getUser(Request $request){

        $userId = $request->get('userid');
    }
}

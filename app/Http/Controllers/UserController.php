<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    //
    public function searchCaseOfficer(Request $request){

        $q = $request->get('q');
        $userModel = new User();
        $allUsers = $userModel->searchUsers($q);
        return response()->json($allUsers);
    }
}

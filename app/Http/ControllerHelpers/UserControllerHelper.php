<?php
/**
 * Created by PhpStorm.
 * User: charles
 * Date: 5/30/16
 * Time: 8:50 PM
 */

namespace app\Http\ControllerHelpers;

use Exception;

use App\User;

class UserControllerHelper {

    public function activateUser($userIdArray){
        try{
            //$data['userids']
            User::activateUser($userIdArray);
        }catch (Exception $ex){
            throw $ex;
        }

    }

    public function resetUserStatus($usersData){
        try{
            User::resetUserStatus($usersData['userids'],(int)$usersData['active']);
        }catch (Exception $ex){
            throw $ex;
        }

    }

    public function updateUser($usersDataRequest){
        $user = new User();
        try{
            $userid = $usersDataRequest->get('userid');
            if($userid){
                $user = User::find((int)$userid);
                //$user->id =  (int)$userid;
                $user->name =  $usersDataRequest->get('name');
                $user->email =  $usersDataRequest->get('email');
                $user->group =  $usersDataRequest->get('group');
                $user->active = 1;
                $user->update();

            }

        }catch (Exception $ex){
            throw $ex;
        }
        return $user;
    }

    public function getUser($user_id){
        $user = User::find($user_id);
        return $user;
    }

}
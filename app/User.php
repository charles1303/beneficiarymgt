<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function searchUsers($term){
        return DB::table('users')
            ->where('name', 'like', '%'.$term.'%')
            ->get();
        //return self::where('firstname', 'like', '%'.$term.'%')->lists('beneficiary_num','id')->toArray();
    }
}

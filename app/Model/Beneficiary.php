<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Beneficiary extends BaseModel
{
    protected $primaryKey = 'id';
	protected $table = 'beneficiaries';
	protected $fillable = array('beneficiary_num', 'firstname', 'lastname','date_of_birth','sex','marital_status', 'phone_number','address','state_of_origin','employment_status','occupation');

	public function searchBeneficiary($term){
		return DB::table('beneficiaries')
                ->where('firstname', 'like', '%'.$term.'%')
				->orWhere('lastname','like', '%'.$term.'%')
                ->get();
		//return self::where('firstname', 'like', '%'.$term.'%')->lists('beneficiary_num','id')->toArray();
	}

	public function getBeneficiaryById($term){
		return DB::table('beneficiaries')
			->where('firstname', 'like', '%'.$term.'%')
			->orWhere('lastname','like', '%'.$term.'%')
			->get();
		//return self::where('firstname', 'like', '%'.$term.'%')->lists('beneficiary_num','id')->toArray();
	}

	public function getMaxId(){
		$maxId = DB::table('beneficiaries')
			->select(DB::raw('max(id) as id'))
			->get();
		return $maxId;
	}

}

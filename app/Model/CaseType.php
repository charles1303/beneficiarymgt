<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'case_type';
    protected $fillable = array('description');
}

<?php

namespace App\Students;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
    	'adm_no',
    	'fname',
    	'lname',
    	'dob',
    	'doa',
    	'gender',
    	'religion',
    	'form_id',
    	'stream_id',
    	'kcpe_entry',
    	'parent_name',
    	'parent_contact',
    	'disability',
    	'special_condition',
    	'boarding',
        'photo',
    	'academic_year',
    ];
}

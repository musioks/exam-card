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
    	'gender',
    	'religion',
    	'form_id',
    	'course_id',
    	'parent_name',
    	'parent_contact',
        'photo',
    	'academic_year',
    ];
}

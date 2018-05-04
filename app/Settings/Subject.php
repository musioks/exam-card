<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['course_id','subject_code','subject_name'];
}

<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['group_id','subject_code','subject_name'];
}

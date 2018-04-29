<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class Grading_system extends Model
{
    protected $fillable=['name','grade_point','mark_from','mark_upto','comment'];
}

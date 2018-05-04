<?php

namespace App\Exams;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable=['unit_id','name','exam_date','out_of'];
}

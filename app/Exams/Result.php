<?php

namespace App\Exams;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable=['adm_no','year','term_id','exam_id','subject_id','form_id','stream_id','initials','score'];
}

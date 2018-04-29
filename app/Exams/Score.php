<?php

namespace App\Exams;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable=['adm_no','year','term_id','exam_id','form_id','stream_id','total'];
}

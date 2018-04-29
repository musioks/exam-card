<?php

namespace App\Students;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
   protected $fillable=([
   			'student_id','discipline_type','description','punishment','date_committed'
   ]);
}

<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table='courses';
  protected $fillable=['course_name','course_code','duration'];

}

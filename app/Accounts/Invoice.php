<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
    		'adm_no','year','term_id','form_id','course_id','amount','balance'
    ];
}

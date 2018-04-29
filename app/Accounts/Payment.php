<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
    	'payee_name','address','particulars','amount','payment_type','votehead_id','description'
    ];
}

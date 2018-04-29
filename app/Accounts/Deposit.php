<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
   protected $fillable=[
    	'payee_name','particulars','amount','payment_type','description'
    ];
}

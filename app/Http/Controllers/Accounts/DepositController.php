<?php

namespace App\Http\Controllers\Accounts;

use App\Accounts\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class DepositController extends Controller
{
    public function receivePayment()
    {
     return view('accounts.recievePayment');
    }
    public function getPayment(Request $request)
    {
     $request->validate([
       'payee_name'=>'required',
       'particulars'=>'required',
       'amount'=>'required',
       'payment_type'=>'required',
     ]);
     Deposit::create(array_merge($request->all()));
        return Redirect::route('allpayments')->with('info','The amount was created!');
    }
}

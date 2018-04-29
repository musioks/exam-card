<?php

namespace App\Http\Controllers\Accounts;

use App\Accounts\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PDF;

class PaymentController extends Controller
{
    public function allPayments()
       {
           $records = DB::table('payments')
                       ->join('voteheads', 'voteheads.id', '=', 'payments.votehead_id')
                       ->select('payments.*', 'payments.payee_name', 'payments.particulars','payments.description', 'payments.amount','payments.created_at','voteheads.name')
                       ->get();
           return view('accounts.allPayments')->with('records', $records);

       }
       public function getPayments()
       {
        $id=Input::get('id');
        $records = DB::table('payments')
                    ->join('voteheads', 'voteheads.id', '=', 'payments.votehead_id')
                    ->select('payments.*', 'payments.payee_name', 'payments.particulars','payments.description', 'payments.amount','payments.created_at','voteheads.name')
                    ->where('payments.id', '=', $id)
                    ->get();
        return view('accounts.getPayment')->with('records', $records)->with('id', $id);
       }
       public function printPayment(){
           $id=Input::get('id');
           $records = DB::table('payments')
                       ->join('voteheads', 'voteheads.id', '=', 'payments.votehead_id')
                       ->select('payments.*', 'payments.payee_name', 'payments.particulars','payments.description', 'payments.amount','payments.created_at','voteheads.name')
                       ->where('payments.id', '=', $id)
                       ->get();
           $pdf=PDF::loadView('accounts.paymentprint',[
                  'records'=>$records,
                ])->setPaper('a4', 'portrait');
              return $pdf->stream('payments.pdf');
       }

       /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
       public function makePayment()
       {
           $votes=\App\Settings\Votehead::all();
           return view('accounts.makePayment',['votes'=>$votes]);
       }

       public function makePay(Request $request)
       {
           $this->validate($request,[
               'payee_name'=>'required',
               'amount'=>'required',
               'votehead_id'=>'required',
               'payment_type'=>'required',
               'address'=>'required',
               'particulars'=>'required'

               ]);
           Payment::create(array_merge($request->all()));
           return Redirect::route('allpayments')->with('success','The Payment was successful!');
       }
}

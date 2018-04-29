<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accounts\Fee;
use App\Accounts\Deposit;
use App\Accounts\Payment;
use Illuminate\Support\Facades\DB;
class FinanceController extends Controller
{
    public function financeReport()
    {
    	return view('accounts.financeReport');
    }

    public function viewReport(Request $request)
    {
    	$request->validate([
    		'startDate'=>'required',
    		'endDate'=>'required'
    	]);
        $startDate= date("Y-m-d",strtotime($request->startDate));
        $endDate=date("Y-m-d",strtotime($request->endDate));
    	$deposits=Deposit::whereBetween(DB::raw("DATE(created_at)"),[$startDate,$endDate])
        ->get()->pluck('amount')->sum();

        $fees=Fee::whereBetween(DB::raw("DATE(created_at)"),[$startDate,$endDate])
        ->get()->pluck('amount')->sum();
     
        $payments=Payment::whereBetween(DB::raw("DATE(created_at)"),[$startDate,$endDate])
        ->get()->pluck('amount')->sum();
        $balance=$deposits+$fees-$payments;
        if (count($fees) > 0) {
           return view('accounts.viewFinanceReport')
                    ->withPayments($payments)
                    ->withFees($fees)
                    ->withDeposits($deposits)
                    ->withBalance($balance);
        }else
        {
            return redirect()->back()->with('error','There are no records found!');
            
        }  
    }
}

<?php

namespace App\Http\Controllers\Accounts;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Response\Accounts\PayResponse;
use App\Http\Response\Accounts\PaymentResponse;
use PDF;

class FeeController extends Controller
{
    public function payment()
    {
      return new PaymentResponse();
    }
      public function Pay(Request $request)
      {
          $this->validate($request,[
        'adm'=>'required',
        'year'=>'required',
        'votehead_id'=>'required',
        'termID'=>'required',
        'amount'=>'required',
        'payment_type'=>'required',
        ]);
          $invoice_available=\App\Accounts\Invoice::where(['adm_no'=>$request->adm, 'term_id'=>$request->termID])
          ->where('year',$request->year)
          ->first();
          if ($invoice_available) {
              DB::transaction(function() use($request,$invoice_available){
               $balance=($invoice_available->balance)-($request->amount);
               DB::table('invoices')->where(['term_id'=>$request->termID,'adm_no'=>$request->adm,'year'=>$request->year])
                  ->update(['balance' => $balance]);  
                  $fee=new \App\Accounts\Fee;
                  $fee->adm_no=$request->adm;
                  $fee->votehead_id=$request->votehead_id;
                  $fee->term_id=$request->termID;
                  $fee->year=$request->year;
                  $fee->amount=$request->amount;
                  $fee->payment_type=$request->payment_type;
                  $fee->save();
            });

          return redirect()->back()->with('info','Fees Payment has been recorded!');
      }else{
          return redirect()->back()->with('error','The student has not been invoiced!');
      }
          
      }
        public function feePerClass()
        {
            $term=\App\Settings\Term::all();
            $streams=\App\Settings\Stream::all();
            $classes=\App\Settings\Form::all();
            return view ( 'accounts.feePerClass')->with('term',$term)->with('classes',$classes)->with('streams', $streams);
        }
        public function getFeePerClass(Request $request)
        {
            
                    $c= $request->class;
                    $d= $request->streamID;
                    $t= $request->termID;
                    $y= $request->year;

                    $feeRecords=DB::table('students')
                                ->join('invoices','students.adm_no','invoices.adm_no')
                                ->select('students.*',
                                    DB::raw('sum(invoices.amount) as invoicetotal'),
                                    DB::raw('sum(invoices.balance) as balancetotal')
                                )
                                ->groupBy('invoices.adm_no')
                                ->where([
                                    'invoices.term_id'=>$t,
                                    'invoices.form_id'=>$c,
                                    'invoices.stream_id'=>$d
                                ])
                                ->where('invoices.year',$y)
                                ->get();
            if (count($feeRecords) > 0) {
                 return view ( 'accounts.getFeePerClass')
                 ->with('feeRecords',$feeRecords)->with('c',$c)->with('d',$d)->with('t',$t)->with('y',$y);
            }else{
              return redirect()->back()->with('error','There are no records found!');
            }
           
        }
        public function printFeePerClass(Request $request)
        {
                  $c= $request->form_id;
                  $d= $request->stream_id;
                  $t= $request->term_id;
                  $y= $request->year;

                  $feeRecords=DB::table('students')
                              ->join('invoices','students.adm_no','invoices.adm_no')
                              ->select('students.*',
                                  DB::raw('sum(invoices.amount) as invoicetotal'),
                                  DB::raw('sum(invoices.balance) as balancetotal')
                              )
                              ->groupBy('invoices.adm_no')
                              ->where([
                                  'invoices.term_id'=>$t,
                                  'invoices.form_id'=>$c,
                                  'invoices.stream_id'=>$d
                              ])
                              ->where('invoices.year',$y)
                              ->get();
               $pdf=PDF::loadView('accounts.printFeePerClass',[
                               'feeRecords'=>$feeRecords
                             ])->setPaper('a4', 'portrait');
                           return $pdf->stream('feepayment.pdf');
        }
        public function printRegister()
        {
            $adm=Input::get('adm');
           $year=date('Y');
           $pastYear=$year-1;
           $balanceBF=DB::table('invoices')->where('adm_no',$adm)->where('year',$pastYear)->pluck('balance')->sum();
           $pre=DB::table('invoices')->where(['adm_no'=>$adm,'year'=>$year])->pluck('amount')->first();
           $amountPaid=DB::table('fees')->where(['adm_no'=>$adm,'year'=>$year])->pluck('amount')->sum();
            $termFee3=DB::table('fees')
           ->where(['term_id'=>3,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->sum();
            $termFee2=DB::table('fees')
           ->where(['term_id'=>2,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->sum();

           $termFee1=DB::table('fees')
           ->where(['term_id'=>1,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->sum();
           $invo1=DB::table('invoices')
           ->where(['term_id'=>1,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->first();
           $invo2=DB::table('invoices')
           ->where(['term_id'=>2,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->first();
            $invo3=DB::table('invoices')
            ->where(['term_id'=>3,'adm_no'=>$adm,'year'=>$year])
            ->get()->pluck('amount')->first();
           $invoTotal=$invo1+$invo2+$invo3;
           $termTotal=$termFee3+$termFee1+$termFee2;
           $amountBalance=$invoTotal+$balanceBF-$termTotal;
           
            $fee=\App\Accounts\Fee::all();                    
            $records=DB::select('select s.fname, s.lname,t.term,t.id,i.term_id, i.amount,i.balance,i.adm_no,f.created_at,f.year,f.adm_no,f.term_id,
            sum(case when `votehead_id`=1 then f.amount else 0 end)tuition,
            sum(case when `votehead_id`=2 then f.amount else 0 end)boarding,
            sum(case when `votehead_id`=3 then f.amount else 0 end) activity,
            sum(case when `votehead_id`=4 then f.amount else 0 end) repairs,
            sum(case when `votehead_id`=5 then f.amount else 0 end) medical,
            sum(case when `votehead_id`=6 then f.amount else 0 end) local,
            sum(case when `votehead_id`=7 then f.amount else 0 end) ewc,
            sum(case when `votehead_id`=8 then f.amount else 0 end) personal ,
            sum(case when `votehead_id`=9 then f.amount else 0 end) development,
            sum(case when `votehead_id`=10 then f.amount else 0 end) examination,
            sum(case when `votehead_id`=11 then f.amount else 0 end) caution,
            sum(case when `votehead_id`=12 then f.amount else 0 end) contigencies,
            sum(case when `votehead_id`=13 then f.amount else 0 end) uniform,
            sum(case when `votehead_id`=14 then f.amount else 0 end) pta,
            sum(case when `votehead_id`=15 then f.amount else 0 end) fees,
            sum(case when `votehead_id`=16 then f.amount else 0 end) others
             from students s, terms t, invoices i, fees f where i.adm_no=:adm and s.adm_no=i.adm_no and t.id=i.term_id and f.adm_no=i.adm_no group by i.year',['adm'=>$adm]);
               $pdf=PDF::loadView('accounts.printFeeRegister',[
                'records'=>$records,
                'pre'=>$pre,
                'year'=>$year,
                'termFee1'=>$termFee1,
                'termFee2'=>$termFee2,
                'termFee3'=>$termFee3,
                'invo1'=>$invo1,
                'invo2'=>$invo2,
                'invo3'=>$invo3,
                'invoTotal'=>$invoTotal,
                'termTotal'=>$termTotal,
                'balanceBF'=>$balanceBF,
                'adm'=>$adm,
                'amountBalance'=>$amountBalance
              ])->setPaper('a4', 'portrait');
            return $pdf->stream('register.pdf');
          
        }
        public function allFeeRegister(Request $request)
        {
          $adm=$request->adm;
          $year=date('Y');
          $pastYear=$year-1;
          $balanceBF=DB::table('invoices')->where('adm_no',$adm)->where('year',$pastYear)->pluck('balance')->sum();
           $pre=DB::table('invoices')->where(['adm_no'=>$adm,'year'=>$year])->pluck('amount')->first();
           $amountPaid=DB::table('fees')->where(['adm_no'=>$adm,'year'=>$year])->pluck('amount')->sum();
          
           $termFee3=DB::table('fees')
           ->where(['term_id'=>3,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->sum();
            $termFee2=DB::table('fees')
           ->where(['term_id'=>2,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->sum();

           $termFee1=DB::table('fees')
           ->where(['term_id'=>1,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->sum();
           $invo1=DB::table('invoices')
           ->where(['term_id'=>1,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->first();
           $invo2=DB::table('invoices')
           ->where(['term_id'=>2,'adm_no'=>$adm,'year'=>$year])
           ->get()->pluck('amount')
           ->first();
            $invo3=DB::table('invoices')
            ->where(['term_id'=>3,'adm_no'=>$adm,'year'=>$year])
            ->get()->pluck('amount')->first();
           $invoTotal=$invo1+$invo2+$invo3;
           $termTotal=$termFee3+$termFee1+$termFee2;
           $amountBalance=$invoTotal+$balanceBF-$termTotal;
           
           $fee=\App\Accounts\Fee::all();                    
           $records=DB::select('select s.fname, s.lname,t.term,t.id,i.term_id, i.amount,i.balance,i.adm_no,f.created_at,f.year,f.adm_no,f.term_id,
           sum(case when `votehead_id`=1 then f.amount else 0 end)tuition,
           sum(case when `votehead_id`=2 then f.amount else 0 end)boarding,
           sum(case when `votehead_id`=3 then f.amount else 0 end) activity,
           sum(case when `votehead_id`=4 then f.amount else 0 end) repairs,
           sum(case when `votehead_id`=5 then f.amount else 0 end) medical,
           sum(case when `votehead_id`=6 then f.amount else 0 end) local,
           sum(case when `votehead_id`=7 then f.amount else 0 end) ewc,
           sum(case when `votehead_id`=8 then f.amount else 0 end) personal ,
           sum(case when `votehead_id`=9 then f.amount else 0 end) development,
           sum(case when `votehead_id`=10 then f.amount else 0 end) examination,
           sum(case when `votehead_id`=11 then f.amount else 0 end) caution,
           sum(case when `votehead_id`=12 then f.amount else 0 end) contigencies,
           sum(case when `votehead_id`=13 then f.amount else 0 end) uniform,
           sum(case when `votehead_id`=14 then f.amount else 0 end) pta,
           sum(case when `votehead_id`=15 then f.amount else 0 end) fees,
           sum(case when `votehead_id`=16 then f.amount else 0 end) others
            from students s, terms t, invoices i, fees f where i.adm_no=:adm and s.adm_no=i.adm_no and t.id=i.term_id and f.adm_no=i.adm_no group by i.year',['adm'=>$adm]);
           return view('accounts.allFeeRegister')
                   ->with('records', $records)
                   ->with('pre', $pre)
                   ->with($year)
                   ->with('termFee1',$termFee1)
                   ->with('termFee2',$termFee2)
                   ->with('termFee3',$termFee3)
                   ->with($invo1)
                   ->with($invo2)
                   ->with($invo3)
                   ->with('invoTotal',$invoTotal)
                   ->with('termTotal',$termTotal)
                   ->with('balanceBF',$balanceBF)
                   ->with('adm',$adm)
                   ->with('amountBalance',$amountBalance);
        }
        public function studentFeeRegister()
        {
               $today=date('Y');
                 $fees=DB::select('select s.fname,s.form_id,s.adm_no,s.lname,c.id,c.form,f.adm_no,f.term_id,f.year,f.created_at,sum(f.amount) as Total
            from fees f,students s,forms c where f.adm_no=s.adm_no and s.form_id=c.id group by f.adm_no');  
                  return view('accounts.studentFeeRegister',['fees'=>$fees]);
        }
        public function feePerClassAmount()
        {
             $term=\App\Settings\Term::all();
                $classes=\App\Settings\Form::all();
                $streams=\App\Settings\Stream::all();
            return view ( 'accounts.feePerClassAmount')->with('term',$term)->with('classes',$classes)->with('streams', $streams);
        }

           public function dailyPay()
          {
           $today=Date('Y-m-d');
             $fees=DB::table('fees')
                       ->join('students','fees.adm_no','students.adm_no')
                       ->select('students.adm_no','students.fname','students.lname','students.form_id','fees.year','fees.term_id','fees.created_at as paid',DB::raw('sum(fees.amount) as Total'))
                        ->groupBy('students.adm_no')
                       ->whereDate('fees.created_at', $today)
                       ->get();
              return view('accounts.dailyFees',['fees'=>$fees]);
          }
          public function getDailyReceipt()
          {
            $today=Date('Y-m-d');
            $adm_no=Input::get('adm');
             $fees=DB::table('fees')
                       ->join('students','fees.adm_no','students.adm_no')
                       ->select('students.adm_no','students.fname','students.lname','students.form_id','students.boarding','fees.year','fees.term_id','fees.created_at as paid',DB::raw('sum(fees.amount) as Total'))
                       ->whereDate('fees.created_at', $today)
                       ->where('students.adm_no',$adm_no)
                       ->get();
              return view('accounts.getDailyReceipt',['fees'=>$fees, 'adm_no'=>$adm_no]);
          }
          public function printDailyReceipt()
          {
             $today=Date('Y-m-d');
            $adm_no=Input::get('adm');
             $fees=DB::table('fees')
                       ->join('students','fees.adm_no','students.adm_no')
                       ->select('students.adm_no','students.fname','students.lname','students.form_id','students.boarding','fees.year','fees.term_id','fees.created_at as paid',DB::raw('sum(fees.amount) as Total'))
                       ->whereDate('fees.created_at', $today)
                       ->where('students.adm_no',$adm_no)
                       ->get();
                 $pdf=PDF::loadView('accounts.printDailyReceipt',[
                  'fees'=>$fees,
                ])->setPaper('a4', 'portrait');
              return $pdf->stream('Dailypay.pdf');
          }

          public function feesFilter(){
                     $terms=\App\Settings\Term::all();
                $classes=\App\Settings\Form::all();
                $streams=\App\Settings\Stream::all();
            return view ( 'accounts.feesFilter')
            ->with('terms',$terms)
            ->with('classes',$classes)
            ->with('streams', $streams);
          }
          public function receipt(){
            $today=date('Y-m-d');
            $adm_no=Input::get('adm');
            $year=Input::get('year');
            $fees=DB::table('fees')
                      ->join('students','fees.adm_no','students.adm_no')
                      ->join('streams','students.stream_id','streams.id')
                      ->join('invoices','fees.adm_no','invoices.adm_no')
                      ->select('students.*',
                        'streams.stream_name',
                        'fees.created_at as paid',
                        DB::raw('sum(fees.amount) as Total'),
                         DB::raw('sum(invoices.balance) as balance'))
                      ->where(
                        [
                          'students.adm_no' =>   $adm_no,
                          'invoices.year'   =>  $year 
                        ]
                        )
                      ->get();
            return view('accounts.receipt')
                       ->withFees($fees)->with('adm_no',$adm_no)->with('year', $year);
          }
           public function printReceipt(){
            $adm_no=Input::get('adm');
            $year=Input::get('year');
            $fees=DB::table('fees')
                      ->join('students','fees.adm_no','students.adm_no')
                      ->join('streams','students.stream_id','streams.id')
                      ->join('invoices','fees.adm_no','invoices.adm_no')
                      ->select('students.*',
                        'streams.stream_name',
                        'fees.created_at as paid',
                        DB::raw('sum(fees.amount) as Total'),
                        DB::raw('sum(invoices.balance) as balance'))
                      ->where(
                        [
                          'students.adm_no' =>   $adm_no,
                          'invoices.year'   =>  $year 
                        ]
                        )
                      ->get();
                         $pdf=PDF::loadView('accounts.printReceipt',[
                          'fees'=>$fees,
                        ])->setPaper('a4', 'portrait');
                      return $pdf->stream('fees.pdf');
          }
          public function getFeesFilter(Request $request)
          {
            $request->validate( 
              [
                'formID'    =>  'required',
                'streamID'  =>  'required',
                'amount'    =>  'required',
                'year'      =>  'required',
                'termID'    =>   'required'
              ]
            );
                $c =      $request -> formID;
                $d =      $request -> streamID;
                $amount = $request -> amount;
                $t =      $request -> termID;
                $y =      $request-> year;
                $feeRecords = DB::table('students')
                              ->join('invoices','students.adm_no','invoices.adm_no')
                              ->select(
                                'students.*',
                                'invoices.amount','invoices.balance',
                                'invoices.year','invoices.term_id',
                                'invoices.created_at'
                              )
                              ->where(
                                [
                                  'invoices.term_id'    => $t,
                                  'invoices.stream_id'  => $d, 
                                  'invoices.form_id'    => $c,
                                  'invoices.year'       => $y 
                                ]
                              )
                              ->where('invoices.balance', '>=', $amount)
                               ->get();
                                            
             if ( ! $feeRecords -> isEmpty() ) {
                 return view ( 'accounts.getfeesFilter')
                         ->with('feeRecords',$feeRecords);
             }
             return redirect()->back()->with('error','No student found!');
       
    }
}

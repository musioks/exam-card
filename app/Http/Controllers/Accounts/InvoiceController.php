<?php

namespace App\Http\Controllers\Accounts;
use DB;
use PDF;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Response\Accounts\AddInvoiceResponse;
class InvoiceController extends Controller
{
public function invoices(){
      $term=\App\Settings\Term::all();
      $classes=\App\Settings\Form::all();
      return view ( 'accounts.invoices',['classes'=>$classes,'term'=>$term]);
  } 

  public function getinvoices(Request $request){
    $form=$request->form_id;
    $term=$request->term_id;
    $year=$request->year;
    $invoices=DB::table('invoices')
    ->join('students','invoices.adm_no','=','students.adm_no')
   ->select('invoices.*',
          'students.adm_no as adm',
          'students.fname',
          'students.lname',
          'invoices.year'
        )
   ->where(
    ['invoices.form_id'=>$form,
    'invoices.term_id'=>$term,
    'invoices.year'=>$year
    ])
   ->get();
     if ( ! $invoices -> isEmpty() ) {
        return view('accounts.invoices_list',
          [
            'invoices'  =>  $invoices,
            'form'  =>  $form,
            'term'  =>  $term,
            'year'  =>  $year
          ]);
     }else{
      return Redirect::back()->with('error','Check your entries and try again!');
     }
 
 }
 public function printInvoice(Request $request)
 {
   $form =  $request -> form;
    $term = $request -> term;
    $year = $request -> year;
  $invoices=DB::table('invoices')
  ->join('students','invoices.adm_no','students.adm_no')
  ->select('invoices.*',
          'students.adm_no as adm',
          'students.fname',
          'students.lname',
          'invoices.year'
        )
  ->where(
          [
            'invoices.form_id'  =>  $form,
            'invoices.term_id'  =>  $term,
            'invoices.year' =>  $year
          ]
        )
  ->get();
     $pdf=PDF::loadView('accounts.getInvoices',
              [
                'invoices'  =>  $invoices
              ]
            )
     ->setPaper('a4', 'landscape');
  return $pdf->stream('invoices.pdf');
 }
  	public function addinvoice(){
  		return new AddInvoiceResponse();
  	}
  	public function postAddInvoice(Request $request)
  	{
     // dd($request->all());
  		$request->validate([
  					'formID'  =>  'required',
  					'year' =>' required',
            'amount'  =>  'required',
            'termID'  =>  'required'
  		]);
  		$form = $request -> formID;
  		$type = $request -> type;
  		$year = $request -> year;
      $term = $request -> termID;
      $courseID = $request -> courseID;
      $amount=$request->amount;
  		$students=DB::table('students')
          ->where(
            [
              'form_id' =>  $form,
              'course_id' =>  $courseID,
              'academic_year' => $year
            ])
  		  ->get();

  		if ( ! $students -> isEmpty() ) {
  				$ids=$students->pluck('adm_no')->all();
          $total=count($ids);
                 for($i=0; $i<$total; $i++){
                 
                     \App\Accounts\Invoice::updateOrCreate(
                      [ 
                         'adm_no' =>  $ids[$i],
                         'term_id'  =>  $term,
                         'form_id'  =>  $form,
                         'course_id'  =>  $courseID,
                       ],
                       [
                         'year' =>  $year,
                         'amount' =>  $amount,
                         'balance'  =>  $amount
                       ]);
                      
          }
          return redirect()->route('addinvoice')->with('success','Students Invoice was success!');
  		}else{
  			return new AddInvoiceResponse();
  		}

  	}
}


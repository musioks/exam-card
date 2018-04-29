<?php

namespace App\Http\Controllers\Accounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Response\Accounts\AddInvoiceResponse;
use Riazxrazor\LaravelSweetAlert\LaravelSweetAlert;
class InvoiceController extends Controller
{
public function invoices(){
      $term=\App\Settings\Term::all();
      $classes=\App\Settings\Form::all();
      return view ( 'accounts.invoices',['classes'=>$classes,'term'=>$term]);
  } 
  
  public function getinvoicess(){
    $form=Input::get('form_id');
    $term=Input::get('term_id');
    $year=Input::get('year');
  $invoices=DB::table('invoices')
  ->join('students','invoices.adm_no','=','students.adm_no')
  ->join('forms','invoices.form_id','=','forms.id')
  ->select('invoices.*','students.adm_no as adm','students.fname','students.lname','students.academic_year','forms.form')
  ->where(['invoices.form_id'=>$form,'invoices.term_id'=>$term,'students.academic_year'=>$year])
  ->get();
     $pdf=PDF::loadView('accounts.getInvoices',['invoices'=>$invoices])->setPaper('a4', 'portrait');
  return $pdf->stream('invoices.pdf');
  
 
  }

  	public function addinvoice(){
  		return new AddInvoiceResponse();
  	}
  
}


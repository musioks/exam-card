<?php 

namespace App\Http\Response\Accounts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Responsable;

class AddInvoiceResponse implements Responsable
{
	public function toResponse($request)
	{
			$classes=\App\Settings\Form::all();
		  $term=\App\Settings\Term::all();
		  $courses=\App\Settings\Course::all();
		  return view('accounts.addinvoice',['classes'=>$classes,'term'=>$term,'courses'=>$courses]);
	}
}
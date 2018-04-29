<?php 

namespace App\Http\Response\Accounts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Responsable;

class PaymentResponse implements Responsable
{
	public function toResponse($request)
	{
		 $students=\App\Students\Student::all();
		$term=\App\Settings\Term::all();
		$votes=\App\Settings\Votehead::all();
		return view('accounts.payment',['term'=>$term,'students'=>$students,'votes'=>$votes]);
	}
}
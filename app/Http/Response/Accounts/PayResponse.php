<?php 

namespace App\Http\Response\Accounts;

use Illuminate\Contracts\Support\Responsable;

class PayResponse implements Responsable
{
	public function toResponse($request)
	{
		return "working";
	}
}

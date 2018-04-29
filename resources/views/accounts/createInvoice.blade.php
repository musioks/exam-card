@extends('layouts.master')
@section('title') Invoice fees payments @stop
@section('content')
<div class="content-header row">
  <div class="breadcrumb-wrapper col-xs-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a>
      </li>
      <li class="breadcrumb-item active"><a href="{{ url('/invoices/addInvoice') }}">Invoice Fee payment</a>
      </li>
      <li class="breadcrumb-item active"><a href="{{ url('/invoices/addInvoice') }}">Create Invoice</a>
      </li>
    </ol>
  </div>
</div>	
<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-10">
			<div class="card">
				<div class="card-body collapse in">
					<div class="card-block">
						<form class="form" method="post" action="{{ url('/invoices/addInvoice') }}">
							{{csrf_field()}}
							
							<div class="form-body">
								<h4 class="form-section"><i class="icon-head"></i> Invoice Fee Payment</h4>

								<div class="row">
									
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Get Students
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
@endsection
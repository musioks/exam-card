@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-light-blue bg-lighten-1">
                    <h4 class="card-title text-white">Fee Payment</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0 ">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <hr>       
 						<form class="form" method="post" action="{{ url('/fees/payfee') }}">
 							{{csrf_field()}}
 							
 							<div class="form-body">
 								<h4 class="form-section"><i class="icon-head"></i> fee payment</h4>

 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="projectinput5">admission no</label>
 											<select id="projectinput5" name="adm" class="form-control">
 												<option value="">---------select Student---------</option>
 												@foreach($students as $students)
 	                        <option value="{{$students->adm_no}}"> {{$students->adm_no}} | {{$students->fname}} {{$students->lname}}</option>
 	                      @endforeach
 											</select>
 											@if($errors->has('adm'))
 											   <span class="danger text-muted">{{ $errors->first('adm') }}</span>
 											@endif
 										</div>
 									</div>

 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="projectinput6">Year</label>
 										<input type="text" id="companyName" class="form-control" value="<?php echo date('Y');?>" name="year">
 										@if($errors->has('year'))
 										   <span class="danger text-muted">{{ $errors->first('year') }}</span>
 										@endif
 										</div>
 									</div>
 								</div>
 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="projectinput5">Term</label>
 											<select id="projectinput5" name="termID" class="form-control">
                         <option value="">---------select term---------</option>

 												@foreach($term as $term)
 												<option value="{{$term->term}}">Term {{$term->term}}</option>
 												@endforeach
 											</select>
 											@if($errors->has('termID'))
 											   <span class="danger text-muted">{{ $errors->first('termID') }}</span>
 											@endif
 										</div>
 									</div>
 									<div class="col-md-6">
 									<div class="form-group">
 										<label for="projectinput5">Type of Payment</label>
 										<select id="projectinput5" name="payment_type" class="form-control">
 											<option value="Cash">Cash</option>
 											<option value="Cheque">Cheque</option>
 										</select>
 										@if($errors->has('payment_type'))
 											   <span class="danger text-muted">{{ $errors->first('payment_type') }}</span>
 											@endif
 									</div>
 								</div>
 								</div>
 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="projectinput5">Votehead</label>
 											<select id="projectinput5" name="votehead_id" class="form-control">
 												<option value="">---------select votehead---------</option>
 												@foreach($votes as $votes)
 	                       <option value="{{$votes->id}}"> {{$votes->name}}</option>
 	                     @endforeach
 											</select>
 											@if($errors->has('votehead_id'))
 											   <span class="danger text-muted">{{ $errors->first('votehead_id') }}</span>
 											@endif
 										</div>
 									</div>

 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="projectinput6">Amount</label>
 										<input type="number" id="companyName" class="form-control" value="{{old('amount')}}"  name="amount">
 										</div>
 										@if($errors->has('amount'))
 											   <span class="danger text-muted">{{ $errors->first('amount') }}</span>
 											@endif
 									</div>
 								</div>
 							</div>

 							<div class="form-actions">
 								<button type="submit" class="btn btn-primary">
 									<i class="icon-check2"></i> Save
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
<!--/ Zero configuration table -->
@stop




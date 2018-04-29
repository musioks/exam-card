@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-header bg-teal bg-accent-4">
<h4 class="card-title text-white">Make Invoives</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
</ul>
</div>
</div>
<div class="card-body collapse in">
<div class="card-block card-dashboard">
<p class="card-text"><a  href="{{url('/invoices/view')}}" class="btn btn-info">
<i class="icon-undo2" ></i> Back to view invoice</a></p>
<hr>
<form class="form" method="post" action="{{ url('/invoices/addInvoice') }}">
@csrf						
<div class="form-body">
<h4 class="form-section"><i class="icon-head"></i> Invoice Fee Payment</h4>

<div class="row">
<div class="col-md-6">
<div class="form-group">
	<label for="projectinput5">Class</label>
	<select id="projectinput5" name="formID" class="form-control">
		<option value="">---------select class---------</option>
		@foreach($classes as $class)
<option value="{{$class->id}}">Form {{$class->form}}</option>
@endforeach
	</select>
	@if($errors->has('class'))
		<span class="danger text-muted">{{ $errors->first('class') }}</span>
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
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>School Type</label>
			<div class="input-group">
				<label class="display-inline-block custom-control custom-radio ml-1">
					<input type="radio" name="type" value="0" class="custom-control-input">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Boarding</span>
				</label>
				<label class="display-inline-block custom-control custom-radio">
					<input type="radio" name="type" value="1" checked class="custom-control-input">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Day</span>
				</label>
			</div>
		</div>
	</div>
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
</div>

</div>

<div class="col-md-6">
<div class="row">
	<div class="col-md-6">
		<div class="form-group {{$errors->has('streamID') ? 'has-error':''}}">
			<label for="projectinput5">Stream</label>
			<select id="projectinput5" name="streamID" class="form-control">
<option value="">-----Select Stream-----</option>
@foreach($streams as $stream)
<option value="{{$stream->id}}">{{$stream->stream_name}}</option>
@endforeach
			</select>
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
</div>
<div class="row">

</div>
</div>
<div class="form-actions">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Invoice
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



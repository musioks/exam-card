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
                    <h4 class="card-title text-white">View Invoives</h4>
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

    <p class="card-text"><a  href="{{url('/invoices/addInvoice')}}" class="btn btn-info">
        <i class="icon-plus"></i>Invoice Students</a></p>
                        <hr>
		<form class="form" method="post" action="{{ url('/invoices/getInvoices') }}">
							{{csrf_field()}}
							<div class="form-body">
								<h4 class="form-section"><i class="icon-head"></i> View Invoices</h4>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput5">Class</label>
											<select id="projectinput5" name="form_id" class="form-control">
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
									<div class="col-md-4">
										<div class="form-group">
											<label for="projectinput5">Term</label>
											<select id="projectinput5" name="term_id" class="form-control">
												<option value="">---------select term---------</option>
												@foreach($term as $term)
	                        <option value="{{$term->id}}">Term {{$term->term}}</option>
	                      @endforeach
											</select>
											@if($errors->has('term'))
											   <span class="danger text-muted">{{ $errors->first('term') }}</span>
											@endif
										</div>
									</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="projectinput6">Year</label>
									<input type="text" id="companyName" class="form-control" value="<?php echo date('Y');?>" name="year">
									@if($errors->has('year'))
									   <span class="danger text-muted">{{ $errors->first('year') }}</span>
									@endif
									</div>
								</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> View Invoices
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

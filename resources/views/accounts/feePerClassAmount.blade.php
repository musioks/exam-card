@extends('layouts.master')
@section('title')Get Fee Payment Per Class @stop
@section('content')
<div class="content-header row">
  <div class="breadcrumb-wrapper col-xs-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index-2.html">Home</a>
      </li>
      <li class="breadcrumb-item active"><a href="#">Fee payment per class</a>
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
						<form class="form" method="post" action="{{ url('getfeeperclass') }}">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-head"></i> fee payment per class</h4>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{$errors->has('termID') ? 'has-error':''}}">
											<label for="projectinput5">Term</label>
											<select id="projectinput5" name="termID" class="form-control">
                        <option value="">---------select term---------</option>

												@foreach($term as $term)
												<option value="{{$term->term}}">Term {{$term->term}}</option>
												@endforeach
											</select>
										</div>
									</div>
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
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{$errors->has('class') ? 'has-error':''}}">
											<label for="projectinput5">Class</label>
											<select id="projectinput5" name="class" class="form-control">
												<option value="">-----Select Class-----</option>
                        @foreach($classes as $classes)
                            <option value="{{$classes->id}}">Form {{$classes->form}}</option>
                        @endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group{{$errors->has('year') ? 'has-error':''}}">
											<label for="projectinput6">Year</label>
										<input type="text" id="companyName" class="form-control" value="<?php echo date('Y');?>" name="year">
										</div>
									</div>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Get Payment
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
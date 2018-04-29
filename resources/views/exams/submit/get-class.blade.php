@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header  bg-success bg-accent-4">
                    <h4 class="card-title text-center text-white">Fetch Students </h4>
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
<!-- Modal -->
<form method="post" action="{{ url('/exams/get-students') }}">
        {{ csrf_field() }}
        {{method_field('GET')}}
<div class="row">
  <div class="col-sm-4">
<div class="form-group">
<label for="adm_no">Class</label>
<select name="form_id" class="form-control select2" required>
<option value="">--Select Class--</option> 
@php $forms=\App\Settings\Form::all();@endphp
@forelse($forms as $form)
<option value="{{$form->id}}">Form {{$form->form}}</option>
@empty
<option value="">No data!</option>
@endforelse
</select>
    </div>
    </div>
<div class="col-sm-4">
<div class="form-group">
<label for="term">Stream</label>
   <select  class="form-control select2" name="stream_id" required>
    <option value="">--Select Stream--</option>
    @php $streams=\App\Settings\Stream::all();@endphp
    @forelse($streams as $stream)
<option value="{{$stream->id}}">{{$stream->stream_name}}</option>
      @empty
    <option value="">No data!</option>
    @endforelse
</select>
</div>
</div>
 <div class="col-sm-4">
<div class="form-group">
 <label for="year">Year</label>
  <input type="number" name="year"  class="form-control" value="{{date('Y')}}" required>
 </div>
 </div>
 </div><!--end row-->
 
 <div class="form-group clearfix">
  <button type="submit" class="btn btn-warning float-sm-right">
    <i class="icon-send-o"></i> List Studnets
  </button>
 </div>
 
</form>
    <!--end modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop

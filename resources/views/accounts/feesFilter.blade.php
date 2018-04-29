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
                    <h4 class="card-title text-white">Filter Fees Payment</h4>
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
                        <hr>
       <form class="form" method="post" action="{{ url('/fees/getFeesFilter') }}">
        @csrf
        <div class="form-body">
            <h4 class="form-section"><i class="icon-head"></i> fee payment filter</h4>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="projectinput5">Term</label>
                        <select id="projectinput5" name="termID" class="form-control">
                            <option value="">---------select term---------</option>
                            @foreach($terms as $term)
                            <option value="{{$term->id}}"> Term {{$term->term}}</option>
                            @endforeach
                        </select>
                          @if($errors->has('termID'))
                           <span class="danger text-muted">{{ $errors->first('termID') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="projectinput5">Stream</label>
                        <select id="projectinput5" name="streamID" class="form-control">
                      <option value="">-----Select Stream-----</option>
                      @foreach($streams as $stream)
                          <option value="{{$stream->id}}">{{$stream->stream_name}}</option>
                      @endforeach
                        </select>
                          @if($errors->has('streamID'))
                           <span class="danger text-muted">{{ $errors->first('streamID') }}</span>
                        @endif
                    </div>
                </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="projectinput5">Class</label>
                     <select id="projectinput5" name="formID" class="form-control">
                         <option value="">-----Select Class-----</option>
                         @foreach($classes as $class)
                             <option value="{{$class->id}}">Form {{$class->form}}</option>
                         @endforeach
                     @if($errors->has('class'))
                            <span class="danger text-muted">{{ $errors->first('class') }}</span>
                         @endif
                     </select>
                 </div>
             </div>
            </div>
            <div class="row">
           

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="projectinput6">Year</label>
                    <input type="text" id="companyName" class="form-control" value="<?php echo date('Y');?>" name="year">
                    @if($errors->has('amount'))
                           <span class="danger text-muted">{{ $errors->first('year') }}</span>
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
                <i class="icon-check2"></i> Get Records
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

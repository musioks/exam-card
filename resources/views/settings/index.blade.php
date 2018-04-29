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
                    <h4 class="card-title text-white"> Institution Settings</h4>
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

    <p class="card-text"><button class="btn btn-primary" data-toggle="modal" data-target="#heading2">
        <i class="icon-settings"></i> Main Settings</button></p>
                        <hr>
    <form role="form" action="{{ url('/settings') }}" method="post" novalidate="">
      {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Institution Name</label>
        <input type="text" name="school_name" value="@isset($setting){{ $setting->school_name }} @endisset" class="form-control" required parsley-type="text">
    </div>
       <div class="form-group">
        <label  for="form-username">Box Address</label>
        <input type="text" name="box_address" value="@isset($setting){{ $setting->box_address }} @endisset" class="form-control" required parsley-type="text">
    </div>
    <div class="form-group">
        <label  for="form-username">Location</label>
        <input type="text" name="location" value="@isset($setting){{ $setting->location }} @endisset" class="form-control" required parsley-type="text">
    </div>
     <div class="form-group">
        <label  for="form-username"> School Moto</label>
        <textarea name="motto" class="form-control" required parsley-type="text">@isset($setting){{ $setting->motto }} @endisset</textarea>
    </div>
      <div class="form-group">
        <label  for="form-username">Mission</label>
        <textarea name="vision" class="form-control" required parsley-type="text">@isset($setting){{ $setting->vision }} @endisset</textarea>
    </div>
   
    <div class="form-group">
  <button type="submit" class="btn btn-success"><i class="icon-save"></i> Save details</button>
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

@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-purple bg-lighten-1">
                    <h4 class="card-title text-white">Update Teacher</h4>
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


    <p class="card-text"><a href="{{url('/staff/teaching/staff')}}" class="btn btn-success">
        <i class="icon-arrow-left3"></i> Go Back</a></p>
                        <hr>       
 <form class="form-horizontal" method="post" action="{{ url('/staff/update/'.$user->id) }}"  novalidate="">
    @csrf
     <input type="hidden" name="user_id" value="{{$user->id}}">
<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i> Teacher Information</h4>
<div class="row">
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput1">ID Number</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="ID Number" value="{{$user->nid}}" name="nid" required data-validation-required-message= "id number is required">
<div class="help-block font-small-3"></div>
@if ($errors->has('email'))
    <span class="text-danger">{{$errors->first('email')}}</span>
@endif
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">First Name</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="First Name" value="{{$user->fname}}" name="fname" required data-validation-required-message= "firstname is required">
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Last Name</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="Last Name"  value="{{$user->lname}}" name="lname" required data-validation-required-message= "lastname is required">
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Initials</label>
<div class="col-md-8">
<div class='input-group'>
<input type='text' class="form-control" name="initials" value="{{$user->initials}}" placeholder="initials" required data-validation-required-message= "initials are required">
</div>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput1">Gender</label>
<div class="col-md-8">
<select class="form-control" name="gender"  required data-validation-required-message= "gender is required">
    <option value="">--select gender--</option>
    <option value="Female">Female</option>
    <option value="Male">Male</option>
</select>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Date of Birth</label>
<div class="col-md-8">
<div class='input-group'>
<input type='text' class="form-control " name="dob" value="{{$user->dob}}" required >
<span class="input-group-addon">
    <span class="icon-calendar3"></span>
</span>
</div>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
</div><!--end row-->
<div class="row">
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">TSC Number</label>
<div class="col-md-8">
<div class='input-group'>
<input type='text' class="form-control" name="empno" value="{{$user->tsc_no}}" placeholder="employee no" required>
</div>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Phone Number</label>
<div class="col-md-8">
<div class='input-group'>
<input type='number' class="form-control" name="phone"  value="{{$user->phone}}" placeholder="phone number" required>
</div>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Email</label>
<div class="col-md-8">
<input type='email' class="form-control" name="email" value="{{$user->email}}" placeholder="email" required>
@if ($errors->has('email'))
    <span class="text-danger">{{$errors->first('email')}}</span>
@endif
</div>
</div>
</div>
</div><!--end row-->
<div class="row">
    <div class="col-md-4">
        <div class="form-group row">
        <label class="col-md-4 label-control" for="userinput2">Religion</label>
        <div class="col-md-8">
        <input type="text" class="form-control" placeholder="Religion"  value="{{$user->religion}}" name="religion" required data-validation-required-message= "lastname is required">
        <div class="help-block font-small-3"></div>
        </div>
        </div>
    </div>
</div>
<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Update details
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

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
                    <h4 class="card-title text-white">Create Student</h4>
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


    <p class="card-text"><a href="{{url('/students')}}" class="btn btn-success">
        <i class="icon-arrow-left3"></i> Go Back</a></p>
                        <hr>       
 <form class="form-horizontal" method="post" action="{{ url('/students/create') }}" enctype="multipart/form-data" novalidate="">
     {{ csrf_field() }}
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i> About student</h4>
<div class="row">
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput1">Admission Number</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="Admission Number" name="adm_no" required data-validation-required-message= "admission number is required">
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">First Name</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="First Name" name="fname" required data-validation-required-message= "firstname is required">
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Last Name</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="Last Name" name="lname" required data-validation-required-message= "lastname is required">
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
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
<div class="col-md-6">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Date of Birth</label>
<div class="col-md-8">
<div class='input-group'>
<input type='text' class="form-control singledate" name="dob" required >
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
<div class="col-md-6">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput1">Class</label>
<div class="col-md-8">
<select class="form-control" name="form_id" required data-validation-required-message= "Select class">
    <option value="">--select class--</option>
    @forelse($forms as $form)
        <option value="{{ $form->id }}">{{ $form->form }}</option>
    @empty
    <option value="">No data found!</option>
    @endforelse
</select>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Course</label>
<div class="col-md-8">
<select class="form-control" name="course_id" required data-validation-required-message= "you must choose a course!">
    <option value="">--select course--</option>
    @forelse($courses as $course)
    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
    @empty
    <option value="">No data found!</option>
    @endforelse
</select>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
</div><!--end row-->

<h4 class="form-section"><i class="icon-user"></i> Parent details & Other info</h4>

<div class="row">
<div class="col-md-6">
<div class="form-group row">
<label class="col-md-3 label-control" for="userinput5">Parent Name</label>
<div class="col-md-9">
<input class="form-control" type="text" name="parent_name" placeholder="Parent Name" required>
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="userinput6">Parent Contact</label>
<div class="col-md-9">
<input class="form-control" type="text" name="parent_contact" placeholder="Parent Contact" required >
</div>
</div>

<div class="form-group row">
<label class="col-md-4 label-control">Student's Religion</label>
<div class="col-md-8">
<select class="form-control" name="religion"  required>
    <option value="">--select religion--</option>
    <option value="Christian">Christian</option>
    <option value="Muslim">Muslim</option>
</select></div>
</div>

</div>
<div class="col-md-6">


<div class="form-group row">
<label class="col-md-4 label-control" for="userinput6">Academic Year</label>
<div class="col-md-8">
<input type="number" min="1900" max="2099" class="form-control col-md-8"  placeholder="eg. 2018" name="academic_year" required>
</div>
</div>
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput6">Student's Image</label>
<div class="col-md-8">
<input class="form-control col-md-8" type="file" name="photo">
</div>
</div>
</div>
</div>
</div>
   
<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> Save details
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

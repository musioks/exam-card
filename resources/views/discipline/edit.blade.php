@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="card-title text-white">Update discipline record</h4>
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


    <p class="card-text"><a href="{{url('/disciplines/index')}}" class="btn btn-pink">
        <i class="icon-arrow-left3"></i> Go Back</a></p>
                        <hr>       
 <form class="form-horizontal" method="post" action="{{ url('/disciplines/update/'.$case->id) }}"  novalidate="">
    @csrf
<div class="form-body">
<h4 class="form-section"><i class="icon-eye6"></i> Case Details</h4>
<div class="row">
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput1">Student</label>
<div class="col-md-8">
    <select class="form-control select2" name="student_id"  required data-validation-required-message= "gender is required">
        <option value="">--select student--</option>
        @forelse($students as $student)
        <option value="{{$student->id}}">{{$student->adm_no}} | {{$student->fname }} {{$student->lname}}</option>
        @empty
        <option>NO REcords</option>
        @endforelse
    </select>
    <div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Discipline type</label>
<div class="col-md-8">
<input type="text" class="form-control" placeholder="disciplines type" value="{{$case->discipline_type}}" name="discipline_type" required data-validation-required-message= "discipline type is required">
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Date committed</label>
<div class="col-md-8">
<div class='input-group'>
<input type='text' class="form-control singledate" value="{{$case->date_committed}}" name="date_committed" required >
<span class="input-group-addon">
    <span class="icon-calendar3"></span>
</span>
</div>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput2">Description</label>
<div class="col-md-8">
    <textarea id="userinput8" rows="3" cols="30" value="{{$case->description}}" class="form-control border-primary" name="description" placeholder="More details"></textarea>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group row">
<label class="col-md-4 label-control" for="userinput1">Punishment</label>
<div class="col-md-8">
    <textarea id="userinput8" rows="3" cols="30" value="{{$case->punishment}}" class="form-control border-primary" name="punishment" placeholder="Description of the punishment given"></textarea>
<div class="help-block font-small-3"></div>
</div>
</div>
</div>
</div><!--end row-->
<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i> update Case
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

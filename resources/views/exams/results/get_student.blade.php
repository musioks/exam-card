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
                    <h4 class="card-title text-center text-white">Get Individual Student Results </h4>
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
<form   method="post" action="{{ url('/results/student-results') }}" novalidate="">
        {{ csrf_field() }}
<div class="row">
  <div class="col-sm-6">
<div class="form-group">
<label for="adm_no">Student Details</label>
<select name="adm_no" id="adm_no" class="form-control select2" required>
<option value="">--Select Student--</option> 
@php 
$students=DB::table('students')
                       ->join('streams','students.stream_id','streams.id')
                       ->join('forms','students.form_id','forms.id')
                       ->select('students.*','streams.stream_name as stream','forms.form')
                      // ->where('students.academic_year',date('Y'))
                       ->get();
@endphp
@forelse($students as $student)
<option value="{{$student->adm_no}}">{{$student->adm_no}} | {{$student->fname}} {{$student->lname}} {{$student->form}}{{$student->stream}}</option>
@empty
<option value="">No data!</option>
@endforelse
</select>
    </div>
    </div>
<div class="col-sm-6">
<div class="form-group">
<label for="term">Exam</label>
   <select  class="form-control select2" name="exam_id" required="">
     <option value="combined">Combined</option>
    @php 
$exams=\DB::table('exams')->get();
@endphp
    @forelse($exams as $exam)
<option value="{{$exam->id}}">{{$exam->exam_name}}</option>
      @empty
    <option value="">No data!</option>
    @endforelse
</select>
</div>
</div>

 </div>
<div class="row">
  <div class="col-sm-6">
<div class="form-group">
  <label for="term">Term</label>
        <select name="term_id" class="form-control select2" required>
<option value="1">Term 1</option>
<option value="2">Term 2</option>
<option value="3">Term 3</option>
      </select>
        </div>
        </div>
  <div class="col-sm-6">
<div class="form-group">
 <label for="year">Year</label>
  <input type="number" name="year"  class="form-control" value="{{date('Y')}}" required>
 </div>
 </div>
 

</div>    
  <div class="form-group clearfix">
  <button type="submit" class="btn btn-info float-sm-left">
    <i class="icon-eye"></i> View Results </button>
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

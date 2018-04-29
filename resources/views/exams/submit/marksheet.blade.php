@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header  card-warning">
                    <h4 class="card-title text-center text-white">Submit marks for class </h4>
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
<form method="post" action="{{ url('/exams/post-marks') }}" novalidate="">
        {{ csrf_field() }}
<div class="row">
   <div class="col-sm-3">
<div class="form-group">
 <label for="year">Year</label>
  <input type="number" name="year"  class="form-control" value="{{date('Y')}}" required>
 </div>
 </div>
  <div class="col-sm-3">
<div class="form-group">
<label for="adm_no">Term</label>
<select name="term_id" class="form-control select2" required>
@php $terms=\App\Settings\Term::all();@endphp
@forelse($terms as $term)
<option value="{{$term->id}}">Term {{$term->term}}</option>
@empty
<option value="">No data!</option>
@endforelse
</select>
    </div>
    </div>
<div class="col-sm-3">
<div class="form-group">
<label for="term">Exam</label>
   <select  class="form-control select2" name="exam_id" required>
    @php $exams=\App\Exams\Exam::all();@endphp
    @forelse($exams as $exam)
<option value="{{$exam->id}}">{{$exam->exam_name}}</option>
      @empty
    <option value="">No data!</option>
    @endforelse
</select>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="term">Subject</label>
   <select  class="form-control select2" name="subject_id" required>
    @forelse($subjects as $subject)
<option value="{{$subject->id}}">{{$subject->subject_name}}</option>
      @empty
    <option value="">No data!</option>
    @endforelse
</select>
</div>
</div>
 </div><!--end row-->
    <table class="table  table-bordered table-condensed table-hover">

                            <thead>
        <tr class="">
            <th>#</th>
            <th>Adm No.</th>
            <th>Name</th>
            <th>Class</th>
            <th>Score</th>
        </tr>
    </thead>
    <tbody>
       @php $i=0; @endphp
           @forelse($students as $student)
               @php $i++; @endphp
        <tr>
         <td>{{ $i }}</td>
         <td>{{ $student->adm_no }}</td>
         <input type="hidden" name="adm_no[]" value="{{$student->adm_no}}">
         <input type="hidden" name="form_id" value="{{$form}}">
         <input type="hidden" name="stream_id" value="{{$stream}}">
         <input type="hidden" name="initials" value="{{Auth::user()->initials}}">
         <td>{{ $student->fname }} {{ $student->lname }}</td>
         <td>Form {{ $student->form }} {{ $student->stream }} </td>
         <td>
          <input type="number" name="score[]" class="form-control" min="0" max="100" placeholder="score in %"></td> 
        </tr>
          @empty
         <p>No data found</p>
         @endforelse
    </tbody>
</table>
  <div class="form-group clearfix">
  <button type="submit" class="btn btn-info float-sm-right">
    <i class="icon-send-o"></i> Submit Marks
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

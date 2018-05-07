@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="card-title text-white">Students List</h4>
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
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
            <th>#</th>
            <th>Adm No.</th>
            <th>Name</th>
            <th>Course</th>
            <th>Class</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
           @forelse($students as $i=> $student)
        <tr>
         <td>{{ $i+1 }}</td>
         <td>{{ $student->adm_no }}</td>
         <td>{{ $student->fname }} {{ $student->lname }}</td>
         <td>{{ $student->course }}</td>
         <td>{{ $student->form }}</td>
         <td>{{ $student->academic_year }}</td>
         <td>
            <form action="{{url('/students/print-card/'.$student->id)}}" method="post">
                @csrf
                <input type="hidden" name="adm_no" value="{{$student->adm_no}}">
        <button type="submit" class="btn btn-success">Print Exam Card</button>
    </form>
         </td>
        </tr>
          @empty
         <p>No data found</p>
         @endforelse
    </tbody>
</table>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
<!--/ Zero configuration table -->
@stop

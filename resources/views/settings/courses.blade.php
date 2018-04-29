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
                    <h4 class="card-title text-white">Manage Courses</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
<div class="card-block card-dashboard">
<!-- Modal -->
<div class="modal fade text-xs-left" id="heading2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel28" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="modal-title" id="myModalLabel28">Create Course</h2>
      </div>
      <div class="modal-body">
<form   method="post" action="{{ url('/settings/courses') }}" novalidate="">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="stream">Course Name <span class="text-danger">*</span></label>
        <input type="text" name="course_name" placeholder="Name..." class="form-control"  required required data-validation-required-message= "Enter Course name">
        <div class="help-block font-small-3"></div>
    </div>
 <div class="form-group">
        <label  for="stream">Course Code <span class="text-danger">*</span></label>
        <input type="text" name="course_code" placeholder="Course Code..." class="form-control"  required required data-validation-required-message= "Enter Course code">
        <div class="help-block font-small-3"></div>
    </div>
    <div class="form-group">
        <label  for="stream">Duration <span class="text-danger">*</span></label>
        <select name="duration" class="form-control"  required required data-validation-required-message= "Enter Duration">
            <option value="2 Years">2 Years</option>
            <option value="3 Years">3 Years</option>
            <option value="4 Years">4 Years</option>
            <option value="5 Years">5 Years</option>
        </select>
        <div class="help-block font-small-3"></div>
    </div>
  <div class="form-group clearfix">
  <button type="submit" class="btn btn-info float-sm-left">
    <i class="icon-send-o"></i> Submit
  </button>
  <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">
      <i class="icon-cross2"></i> close
  </button>
</div>
</form>
      </div>
    </div>
  </div>
</div>
    <!--end modal -->
    <p class="card-text">
        <button class="btn btn-primary" data-toggle="modal" data-target="#heading2">
        <i class="icon-plus"></i>Create Course</button> </p>
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
    <thead>
        <tr class="">
            <th>#</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse($courses as $i=> $course)
        <tr>
         <td>{{ $i+1 }}</td>
         <td>{{ $course->course_name }}</td>
         <td>{{ $course->course_code }}</td>
         <td>{{ $course->duration }}</td>
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $course->id }}"><i class="icon-close"></i></a>
             <a href="" class="btn btn-success" data-toggle="modal" data-target="#update-stream-{{ $course->id }}"><i class="icon-pencil"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $course->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this course?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/settings/delete-course/'.$course->id) }}" class="btn btn-success float-sm-left">Okay</a>
        <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->

 <!-- Update stream Modal -->
<div class="modal fade" id="update-course-{{ $course->id }}" style="overflow: hidden;" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Course details</h4>
      </div>
      <div class="modal-body">
     <form  role="form" id="update-form-{{$course->id}}" method="post" action="{{ url('/settings/update-course') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
     <div class="form-group">
        <label  for="form-username">Course Name</label>
        <input type="text" name="stream_name" value="{{ $course->course_name }}" class=" form-control">
        <input type="hidden" name="id" value="{{ $course->id }}">
    </div>  
</form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-left" onclick="$('#update-form-{{$course->id}}').submit()">Update Course</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Update Stream Modal -->
        </tr>
     @empty
         <p>No courses found</p>
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
@endsection

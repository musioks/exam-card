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
                    <h4 class="card-title text-white">Grading System</h4>
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
<div class="modal fade text-xs-left" id="heading2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel28" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="modal-title" id="myModalLabel28">Create grading system</h2>
      </div>
      <div class="modal-body">
<form   method="post" action="{{ url('/exams/grading') }}" novalidate="">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="stream">Grade Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Name..." class="form-control"  required>
        <div class="help-block font-small-3"></div>
    </div>
        <div class="form-group">
        <label  for="stream">Grade Points <span class="text-danger">*</span></label>
        <input type="number" name="grade_point" placeholder="Grade points" class="form-control"  required>
        <div class="help-block font-small-3"></div>
    </div>
     <div class="form-group">
        <label  for="stream">Lowest Mark <span class="text-danger">*</span></label>
        <input type="number" name="mark_from" placeholder="Lowest Mark" class="form-control"  required>
        <div class="help-block font-small-3"></div>
    </div>
     <div class="form-group">
        <label  for="stream">Highest Mark <span class="text-danger">*</span></label>
        <input type="number" name="mark_upto" placeholder="Lowest Mark" class="form-control"  required>
        <div class="help-block font-small-3"></div>
    </div>
     <div class="form-group">
        <label  for="stream">Remarks <span class="text-danger">*</span></label>
        <textarea name="comment" placeholder="Remarks eg. Excellent!" class="form-control"  required>
        </textarea>
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
    <p class="card-text"><button class="btn btn-primary" data-toggle="modal" data-target="#heading2">
        <i class="icon-plus"></i>Create Grading System</button></p>
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
            <th>#</th>
            <th>Name</th>
            <th>Points</th>
            <th>Lowest Mark</th>
            <th>Highest Mark</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @php $i=0; @endphp
           @forelse($grades as $grade)
               @php $i++; @endphp
        <tr>
         <td>{{ $i }}</td>
         <td>{{ $grade->name }}</td>
         <td>{{ $grade->grade_point }}</td>
         <td>{{ $grade->mark_from }}</td>
         <td>{{ $grade->mark_upto }}</td>
         <td>{{ $grade->comment }}</td>
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $grade->id }}"><i class="icon-close"></i></a>
             <a href="" class="btn btn-success" data-toggle="modal" data-target="#update-modal-{{ $grade->id }}"><i class="icon-pencil"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $grade->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this exam type?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/exams/delete-grading/'.$grade->id) }}" class="btn btn-success float-sm-left">Okay</a>
        <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->

 <!-- Update stream Modal -->
<div class="modal fade" id="update-modal-{{ $grade->id }}" style="overflow: hidden;" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">
     <form  role="form" id="update-form-{{$grade->id}}" method="post" action="{{ url('/exams/update-grading') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
         <input type="hidden" name="id" value="{{ $grade->id }}">
   <div class="form-group">
        <label  for="grading">Grade Name</label>
        <input type="text" name="name" value="{{ $grade->name }}" class="form-control"  >
    </div>
        <div class="form-group">
        <label  for="grading">Grade Points</label>
        <input type="number" name="grade_point"  value="{{ $grade->grade_point }}" class="form-control">
    </div>
     <div class="form-group">
        <label  for="grading">Lowest Mark</label>
        <input type="number" name="mark_from" value="{{ $grade->mark_from }}" class="form-control">
    </div>
     <div class="form-group">
        <label  for="grading">Highest Mark</label>
        <input type="number" name="mark_upto" value="{{ $grade->mark_upto }}" class="form-control">
    </div>
     <div class="form-group">
        <label  for="grading">Remarks</label>
        <textarea name="comment" class="form-control">
          {{ $grade->comment }}
        </textarea>
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-left" onclick="$('#update-form-{{$grade->id}}').submit()">Update details</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Update grading Modal -->
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

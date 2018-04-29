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
                    <h4 class="card-title text-white">Manage Subjects</h4>
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
        <h2 class="modal-title" id="myModalLabel28">New Subject</h2>
      </div>
      <div class="modal-body">
<form   method="post" action="{{ url('/settings/subjects') }}" novalidate="">
        {{ csrf_field() }}
           <div class="form-group">
        <label  for="form-username">Subject Group <span class="text-danger">*</span></label>
        <select name="group_id" class="form-control select2" required style="width:100%;">
            @forelse($groups as $group)
            <option value="{{ $group->id }}"> {{$group->group_name}}</option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>
        <div class="help-block font-small-3"></div>
    </div>
     <div class="form-group">
        <label  for="Form">Subject Code <span class="text-danger">*</span></label>
        <input type="text" name="subject_code" placeholder="eg. 101" class="form-control"  required>
        <div class="help-block font-small-3"></div>
    </div>
     <div class="form-group">
        <label  for="Form">Subject Name<span class="text-danger">*</span></label>
        <input type="text" name="subject_name" placeholder="eg. English" class="form-control"  required>
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
    <p class="card-text"><button class="btn btn-success" data-toggle="modal" data-target="#heading2">
        <i class="icon-plus"></i>New Subject</button></p>
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
            <th>#</th>
            <th>Group Name</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @php $i=0; @endphp
           @forelse($subjects as $subject)
               @php $i++; @endphp
        <tr>
         <td>{{ $i }}</td>
         <td>{{ $subject->group }}</td>
         <td>{{ $subject->subject_code }}</td>
         <td>{{ $subject->subject_name }}</td>
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $subject->id }}"><i class="icon-close"></i></a>
             <a href="" class="btn btn-success" data-toggle="modal" data-target="#update-modal-{{ $subject->id }}"><i class="icon-pencil"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $subject->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this subject?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/settings/delete-subject/'.$subject->id) }}" class="btn btn-success float-sm-left">Okay</a>
        <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->

 <!-- Update Modal -->
<div class="modal fade" id="update-modal-{{ $subject->id }}" style="overflow: hidden;" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit details</h4>
      </div>
      <div class="modal-body">
     <form  role="form" id="update-form-{{ $subject->id }}" method="post" action="{{ url('/settings/update-subject') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
         <input type="hidden" name="id" value="{{$subject->id}}">
           <div class="form-group">
        <label  for="form-username">Subject Group <span class="text-danger">*</span></label>
        <select name="group_id" class="form-control select2" required>
           <option selected="selected" value="{{ $subject->group_id }}">{{ $subject->group }}</option>
            @forelse($groups as $group)
            <option value="{{ $group->id }}"> {{$group->group_name}}</option>
            @empty
            <option value="">No data</option>
            @endforelse
        </select>
    </div>
     <div class="form-group">
        <label  for="Form">Subject Code</label>
        <input type="text" name="subject_code" value="{{$subject->subject_code}}" class="form-control">
    </div>
     <div class="form-group">
        <label  for="Form">Subject Name</label>
        <input type="text" name="subject_name" value="{{$subject->subject_name}}" class="form-control">
    </div>
</form>
      </div>
      <div class="modal-footer clearfix">
        <button type="submit" class="btn btn-success float-xs-left" onclick="$('#update-form-{{$subject->id}}').submit()">Update </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Update Class Modal -->
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

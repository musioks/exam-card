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
                    <h4 class="card-title text-white">All Users</h4>
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
        <h2 class="modal-title" id="myModalLabel28">Add User</h2>
      </div>
      <div class="modal-body">
<form   method="post" action="{{ url('/dashboard/users') }}" novalidate="">
        {{ csrf_field() }}
     <div class="form-group">
        <label  for="form-username">Full Name <span class="text-danger">*</span></label>
        <input type="text" name="name" placeholder="Name..." class="form-control"  required required data-validation-required-message= "Please enter name">
        <div class="help-block font-small-3"></div>
    </div>
     <div class="form-group">
        <label  for="form-username">Email Address <span class="text-danger">*</span></label>
        <input type="email" name="email" placeholder="Email Address..." class="form-control"  required data-validation-required-message= "Please enter email address.">
        <div class="help-block font-small-3"></div>
    </div>
    <div class="form-group">
        <label  for="form-password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" placeholder="Password..." class="form-control"  required required data-validation-required-message= "Please enter password">
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
        <i class="icon-plus"></i>Add User</button></p>
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
            <th>#</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Roles</th>
            <th>Joined Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @php $i=0; @endphp
           @forelse($users as $user)
               @php $i++; @endphp
        <tr>
         <td>{{ $i }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->email }}</td>
           <td><span class="label label-success"> @foreach($user->roles as $role)
{{$role->name}}</span>,
@endforeach</td>
         <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $user->id }}"><i class="icon-close"></i></a>
             <a href="{{url('/dashboard/users/'.$user->id)}}" class="btn btn-success"><i class="icon-pencil"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this user?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/dashboard/delete-user/'.$user->id) }}" class="btn btn-success float-sm-left">Okay</a>
        <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->
        </tr>
              @empty
         <p>No users found</p>
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

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
                    <h4 class="card-title text-white">User Roles</h4>
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


    <p class="card-text"><a href="{{url('/dashboard/addrole')}}" class="btn btn-primary">
        <i class="icon-plus"></i>Create Role</a></p>
                        <hr>
                        <table class="table  table-bordered table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
           <th>#</th>
         <th>Name</th>
        <th>Display Name</th>
        <th>Description</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @php $i=0; @endphp
        @forelse($roles as $role)
         @php $i++; @endphp
  <tr>
      <td>{{ $i}}</td>
      <td>{{ $role->name }}</td>
      <td>{{ $role->display_name }}</td>
      <td>{{ $role->description }}</td>
 
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $role->id }}"><i class="icon-close"></i></a>
             <a href="{{url('/dashboard/edit-role/'.$role->id)}}" class="btn btn-success"><i class="icon-pencil"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $role->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this role?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/dashboard/delete-role/'.$role->id) }}" class="btn btn-success float-sm-left">Okay</a>
        <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->
        </tr>
              @empty
         <p>No roles found</p>
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

@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-purple bg-accent-4">
                    <h4 class="card-title text-white">Manage Employees</h4>
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

    <p class="card-text"><a  href="{{url('/employees/create')}}" class="btn btn-warning" style="float: right;">
        <i class="icon-plus"></i>Add A Employee</a></p>
                        <hr>
       <table class="table  table-bordered table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
            <th>#</th>
            <th>ID No.</th>
            <th>Name</th>
            <th>Initials</th>
            <th>Employee Number</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @php $i=0; @endphp
           @forelse($staffs as $staff)
               @php $i++; @endphp
        <tr>
         <td>{{ $i }}</td>
         <td>{{ $staff->nid }}</td>
         <td>{{ $staff->fname }} {{ $staff->lname }}</td>
         <td>{{ $staff->initials}}</td>
         <td>{{ $staff->empno }}</td>
         <td>{{$staff->gender}}</td>
         <td>{{ $staff->phone}}</td>
         <td>{{ $staff->email}}</td>
         <td>
             <a href="" class="btn btn-danger" data-toggle="modal" data-target="#panel-modal-{{ $staff->id }}"><i class="icon-close"></i></a>
             <a href="{{url('/employees/edit/'.$staff->id)}}" class="btn btn-success"><i class="icon-pencil"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $staff->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this Teacher?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/employees/delete/'.$staff->id) }}" class="btn btn-success float-sm-left">Okay</a>
        <button type="button" class="btn btn-danger float-sm-right" data-dismiss="modal">Cancel</button>
      </div>
            </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ====================End Delete Modal===========================  -->

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

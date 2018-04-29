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
                    <h4 class="card-title text-white">Discipline Cases</h4>
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

    <p class="card-text"><a  href="{{url('/disciplines/create')}}" class="btn btn-pink">
        <i class="icon-plus"></i> Record Discipline case</a></p>
                        <hr>
       <table class="table  table-bordered  table-condensed table-hover zero-configuration">
                            <thead>
        <tr class="">
            <th>#</th>
            <th>Adm No.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Details</th>
            <th>Punishment</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @php $i=0; @endphp
           @forelse($cases as $case)
               @php $i++; @endphp
        <tr>
         <td>{{ $i }}</td>
         <td>{{ $case->adm_no }}</td>
         <td>{{ $case->fname }} {{ $case->lname }}</td>
        <td>{{$case->discipline_type}}</td>
        <td style="width:100px;">{{$case->description}}</td>
         <td style="width:120px;">{{$case->punishment}}</td>
         <td>{{ date('d-m-Y',strtotime($case->created_at)) }}</td>
         <td>
             <a href="" class="btn btn-pink btn-sm" data-toggle="modal" data-target="#panel-modal-{{ $case->id }}"><i class="icon-close"></i></a>
             <a href="{{url('/disciplines/edit/'.$case->id)}}" class="btn btn-success btn-sm"><i class="icon-edit"></i></a>
         </td>
         <!-- ====================Delete Modal===========================  -->
<div id="panel-modal-{{ $case->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <h5>Are you sure you want to delete this case?</h5>
                </div>
                  <div class="modal-footer clearfix">
        <a href="{{ url('/disciplines/delete/'.$case->id) }}" class="btn btn-success float-sm-left">Okay</a>
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

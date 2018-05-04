@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Sales stats -->
<div class="row">
<div class="col-xs-12">
<div class="card">
<div class="card-body">
    <div class="card-block">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-12 border-right-blue-grey border-right-lighten-5">
                <div class="media px-1">
                    <div class="media-left media-middle">
                        <i class="icon-user font-large-1 blue-grey"></i>
                    </div>
                    <div class="media-body text-xs-right">
                    <span class="font-large-2 text-bold-300 info">{{$students}}</span>
                    </div>
                    <p class="text-muted">Students <span class="info float-xs-right"></span></p>
                    <hr>
                <a href="{{url('/students')}}">View details</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12 border-right-blue-grey border-right-lighten-5">
                <div class="media px-1">
                    <div class="media-left media-middle">
                        <i class="icon-tag3 font-large-1 blue-grey"></i>
                    </div>
                    <div class="media-body text-xs-right">
                    <span class="font-large-2 text-bold-300 deep-orange">{{$courses}}</span>
                    </div>
                    <p class="text-muted">Courses<span class="deep-orange float-xs-right"></span></p>
                   <hr>
                <a href="{{url('/settings/courses')}}">View details</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12 border-right-blue-grey border-right-lighten-5">
                <div class="media px-1">
                    <div class="media-left media-middle">
                        <i class="icon-shuffle3 font-large-1 blue-grey"></i>
                    </div>
                    <div class="media-body text-xs-right">
                    <span class="font-large-2 text-bold-300 danger">{{$users}}</span>
                    </div>
                    <p class="text-muted">Users<span class="danger float-xs-right"></span></p>
                    <hr>
                    <a href="#">View details</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12">
                <div class="media px-1">
                    <div class="media-left media-middle">
                        <i class="icon-dollar font-large-1 blue-grey"></i>
                    </div>
                    <div class="media-body text-xs-right">
                    <span class="font-large-2 text-bold-300 success">{{$balance}}</span>
                    </div>
                    <p class="text-muted">No of students with balances</p>
                    <hr>
                <a href="{{url('/fees/feeperclass')}}">More details</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--/ Sales stats -->


</div>
@stop
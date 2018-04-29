@extends('layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="content-body"><!-- Zero configuration table -->
<section id="configuration">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header bg-teal bg-accent-4">
                    <h4 class="card-title text-white">Edit Profile</h4>
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
        <form class="form" method="post" action="{{ url('/profile/editprofile/'.Auth::id() )}}">
            {{csrf_field()}}
            <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" id="name" class="form-control" placeholder="name" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="name" value="{{$user->name}}">
                </div>
                  @if($errors->has('name'))
                   <span class="danger text-muted">{{ $errors->first('name') }}</span>
                @endif
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control"  name="email" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="email" value="{{$user->email}}">
                </div>
                @if($errors->has('email'))
                           <span class="danger text-muted">{{ $errors->first('email') }}</span>
                        @endif
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Save
                </button>
            </div>
        </form>
        </div>
        </div>
            </div>
        </div>
    </div>
</section>
</div>
@stop

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
                    <h4 class="card-title text-white">Change Password</h4>
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
        <form class="form" method="post" action="{{ url('/profile/passwordChange/'.Auth::user()->id )}}">
            {{csrf_field()}}
            <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" class="form-control" placeholder="password" name="password" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password">
                </div>
                  @if($errors->has('password'))
                   <span class="danger text-muted">{{ $errors->first('password') }}</span>
                @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="password_confirmation">Password Again</label>
                    <input type="password" id="password_confirmation" class="form-control"  name="password_confirmation" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="password new">
                </div>
                @if($errors->has('password_confirmation'))
                           <span class="danger text-muted">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Change Password
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

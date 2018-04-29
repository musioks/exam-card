
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login - Exam Card Processing System</title>
    <link rel="apple-touch-icon" sizes="60x60" href="../../../app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../../app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../../app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="../../../app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
@include('layouts.styles')
    <!-- END Custom CSS-->
  </head>
  <body  data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column bg-inverse bg-lighten-2" style=" background: url('../../images/background.png');">
   @php
   $setting=\App\Settings\Settings::first();
    @endphp
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body">
    <section class="col-md-4 offset-md-4 col-xs-4 offset-xs-4 box-shadow-2 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">
        <div class="card-header no-border">
            <div class="card-title text-xs-center">
<h1 class="text-info">JKUAT EXAM CARD PROCESSING SYSTEM</h1>
            </div>
            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login to access system</span></h6>
        </div>
<div class="card-body collapse in">
<div class="card-block">
<form class="form-horizontal" action="{{ url('/') }}" method="post" novalidate="">
    {{ csrf_field() }}
<fieldset class="form-group position-relative has-icon-left">
    <input type="email" class="form-control input-lg" placeholder="Your Email" name="email" tabindex="1" required data-validation-required-message= "Please enter your email address.">
    <div class="form-control-position">
        <i class="icon-android-mail"></i>
    </div>
    <div class="help-block font-small-3"></div>
</fieldset>
<fieldset class="form-group position-relative has-icon-left">
    <input type="password" class="form-control input-lg" name="password" placeholder="Enter Password" tabindex="2" required data-validation-required-message= "Please enter your password">
    <div class="form-control-position">
        <i class="icon-key3"></i>
    </div>
    <div class="help-block font-small-3"></div>
</fieldset>
<fieldset class="form-group row">
    <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
        <fieldset>
            <input type="checkbox" id="remember-me" class="chk-remember">
            <label for="remember-me"> Remember Me</label>
        </fieldset>
    </div>

</fieldset>
<button type="submit" class="btn btn-info btn-block btn-lg"><i class="icon-unlock2"></i> Login</button>
</form>
</div>
</div>
       
    </div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    @include('layouts.scripts')
</body>
</html>

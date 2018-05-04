
<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="author" content="Ryzonet">
<title>@yield('title')</title>
<link rel="shortcut icon" type="image/png" href="{{ asset('app-assets/images/ico/favicon-32.png')}}">
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

<!-- Styles-->
@include('layouts.styles')
<style type="text/css">
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  /* Set the fixed height of the footer here */
  line-height: 30px; /* Vertically center the text there */
  padding-left: -40px;
}
</style>
<!-- End Styles-->
</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

<!-- navbar-fixed-top-->
<!-- ********** Navigation bar *************** -->
@include('layouts.navbar')
<!-- ********** END Navigation bar *************** -->
<div id="fullscreen-search" class="fullscreen-search">
<form class="fullscreen-search-form">
<input type="search" placeholder="Search..." class="fullscreen-search-input">
<button type="submit" class="fullscreen-search-submit">Search</button>
</form>
<div class="fullscreen-search-content">
<div class="fullscreen-search-options">

</div>
<div class="fullscreen-search-result mt-2">

</div>
</div><span class="fullscreen-search-close"></span>
</div>
<div class="fullscreen-search-overlay"></div>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- main menu-->
@include('layouts.sidebar')
<!-- / main menu-->

<div class="app-content content container-fluid">
<div class="content-wrapper">
@yield('content')
</div><!--end content-wrapper -->
</div> <!--end app-content -->
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-light navbar-border">
<p class="clearfix text-muted mb-0 px-2"><span class=" d-xs-block d-md-inline-block">&copy; {{ date('Y') }} <a href="#" target="_blank" class="text-bold-800 grey darken-2">Exam card processing system </a>, All rights reserved. </span></p>
</footer>
<!--  ************* Javascripts ************ -->
@include('layouts.scripts')
<!--  ************* End Javascripts ************ -->
</body>
</html>

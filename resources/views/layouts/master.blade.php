
<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="author" content="Ryzonet">
<title>@yield('title')</title>
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('app-assets/images/ico/apple-icon-60.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('app-assets/images/ico/apple-icon-76.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('app-assets/images/ico/apple-icon-152.png')}}">

<link rel="shortcut icon" type="image/png" href="{{ asset('app-assets/images/ico/favicon-32.png')}}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

<!-- Styles-->
@include('layouts.styles')
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


<footer class="footer footer-static footer-light navbar-border">
<p class="clearfix text-muted text-sm-center mb-0 px-2"><span class=" d-xs-block d-md-inline-block">Copyright  &copy; {{ date('Y') }} <a href="http://www.karunga.sc.ke" target="_blank" class="text-bold-800 grey darken-2">School </a>, All rights reserved. </span></p>
</footer>
<!--  ************* Javascripts ************ -->
@include('layouts.scripts')
<!--  ************* End Javascripts ************ -->
</body>
</html>

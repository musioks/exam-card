<!-- BEGIN VENDOR JS-->
<!-- build:js app-assets/js/vendors.min.js-->
<script src="{{asset('app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/jquery-sliding-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/sliders/slick/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>

<!-- /build-->
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/underscore-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/clndr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}" type="text/javascript"></script>


<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<!-- build:js app-assets/js/app.min.js-->
<script src="{{asset('app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/ui/fullscreenSearch.min.js')}}" type="text/javascript"></script>
<!-- /build-->
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/forms/validation/form-validation.min.js')}}" type="text/javascript">
</script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">
	$(".singledate").daterangepicker({singleDatePicker:!0,showDropdowns:!0, locale: {
        format: 'YYYY-MM-DD' // --------Here
    },});
</script>
<!-- END PAGE LEVEL JS-->
  <script>
  @if(Session::has('success'))
  toastr.success("{{ Session::get('success') }}");
  @endif
  @if(Session::has('info'))
  toastr.info("{{ Session::get('info') }}");
  @endif
  @if(Session::has('warning'))
  toastr.warning("{{ Session::get('warning') }}");
  @endif
  @if(Session::has('error'))
  toastr.error("{{ Session::get('error') }}");
  @endif

</script>
@yield('scripts')
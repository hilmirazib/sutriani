<!DOCTYPE html>
<html>
@includeIf('layouts.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @includeIf('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @includeIf('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        @section('breadcrumb')
          <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        @show
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @includeIf('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('AdminLTE-2/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE-2/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('AdminLTE-2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('AdminLTE-2/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE-2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('AdminLTE-2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE-2/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE-2/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('AdminLTE-2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('AdminLTE-2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE-2/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<script src="{{ asset('AdminLTE-2/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE-2/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE-2/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE-2/dist/js/pages/dashboard2.js') }}"></script>
</body>
</html>

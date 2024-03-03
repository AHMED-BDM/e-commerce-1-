    <!-- jQuery -->
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('admin-assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin-assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin-assets/dist/js/pages/dashboard.js')}}"></script>


    {{-- orders  --}}

    <script src="{{asset('admin-assets/js/orders/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/orders/popper.js')}}"></script>
    <script src="{{asset('admin-assets/js/orders/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/orders/main.js')}}"></script>
    @yield('script')

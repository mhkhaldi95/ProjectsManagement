<!DOCTYPE html>
<html dir="rtl">



<head>
    @includeIf('admin.header.meta_header')
</head>
    <body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
    @includeIf('admin.sidebar.side_bar')

        <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">
        @includeIf('admin.header.nav')

        @yield('content')
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    @yield('script')
    <!-- Menu Toggle Script -->
    <script>

    </script>

    </body>

</html>


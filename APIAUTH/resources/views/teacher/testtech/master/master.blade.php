<!DOCTYPE html>
<html dir="rtl">

<head>
    @includeIf('teacher.testtech.header.meta_header')

</head>

<body>

<div class="d-flex" id="wrapper">


    <!-- Sidebar -->
@includeIf('teacher.testtech.sidebar.side_bar')
<!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">
@includeIf('teacher.testtech.header.header')

@yield('content')

    </div>
</html>




<!-- Bootstrap core JavaScript -->
<script src="../{{(asset('/vendor/jquery/jquery.min.js'))}}"></script>
<script src="../{{(asset('/vendor/bootstrap/js/bootstrap.bundle.min.js'))}}"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>

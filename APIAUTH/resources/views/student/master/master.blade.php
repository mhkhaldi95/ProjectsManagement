<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale()=='ar'?"rtl":"ltr"}}">

<head>
    @includeIf('student.header.meta_header')
</head>

<body>

<div class="d-flex" id="wrapper">

    @includeIf('student.sidebar.side_bar')
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">
        @includeIf('student.header.nav')

        @yield('content')
    </div>

</div>
<script src="http://127.0.0.1:8000/js/jquery.min.js"></script>
<script src="http://127.0.0.1:8000/js/bootstrap.bundle.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>


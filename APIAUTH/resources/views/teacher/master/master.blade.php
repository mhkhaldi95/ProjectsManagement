<!DOCTYPE html>
<html dir="rtl">

<head>
{{--    @includeIf('teacher.meta_head')--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project Coordinator|Advertising</title>

    <!-- Bootstrap core CSS -->
    <link href="{{(asset('/vendor/bootstrap/css/bootstrap.min.css'))}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{(asset('/css/simple-sidebar.css'))}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <style>
        .Sidebar_r{
            background-color:#563d7c!important;
            color:#fff;
            font-size:20px;
        }
        h1{
            color:#563d7c!important;

        }
        i{
            color:#fff!important;
            margin-right:5px;

        }
        .buttonCollapse{
            color:#563d7c!important;
            font-size:30px;
            font-weight:bold;
        }


    </style>

</head>

<body>



    <!-- Sidebar -->
{{--@includeIf('teacher.sidebar.sidebar')--}}
    <div class="bg-light border-right Sidebar_r" id="sidebar-wrapper">
        <div class="sidebar-heading">قائمة الموقع </div>
        <div class="list-group list-group-flush  Sidebar_r">
            <a href="/teacher/index.php" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fas fa-home"></i>الرئيسية</a>
            <a href="/teacher/info.php" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fas fa-info-circle"></i>بيانات المعلم</a>
            <a href="/teacher/projects/projects.php" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fas fa-project-diagram"></i>المشاريع</a>
        </div>
    </div>
<!-- /#sidebar-wrapper -->

    <!-- Page Content -->

{{--@includeIf('teacher.head.head')--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom  Sidebar_r">

        <button class="btn btn-primary" id="menu-toggle" style="margin-left:15px;">القائمة</button>
        مرحبا : معلم
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="/logout.php" style="color:#fff;"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>

    </nav>


    @yield('content')

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





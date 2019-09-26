
<!DOCTYPE html>
<html lang="" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <!-- <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="http://127.0.0.1:8000/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="http://127.0.0.1:8000/css/simple-sidebar.css" rel="stylesheet">
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

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right Sidebar_r" id="sidebar-wrapper">
        <div class="sidebar-heading">Student menu </div>
        <div class="list-group list-group-flush  Sidebar_r">
            <a href="/index/student" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fas fa-home"></i>Home</a>
            <a href="/info" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fas fa-info-circle"></i>my info</a>
            <a href="/student/project" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fas fa-project-diagram"></i>my project</a>
            <a href="#" class="list-group-item list-group-item-action bg-light  Sidebar_r"><i class="fab fa-wpforms icon"></i>Forms</a>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom  Sidebar_r">
            <button class="btn btn-primary" id="menu-toggle" style="margin-right:15px;">Toggle Menu</button>
            welcome: username1
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Language: Arabic
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="http://127.0.0.1:8000/admin/change/lang/en">English</a></li>
                    <li><a href="http://127.0.0.1:8000/admin/change/lang/ar">Arabic</a></li>

                </ul>

            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse  navbar-collapse"
                 dir="ltr"

                 aria-labelledby="navbarDropdown" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2 mt-lg-0">


                    <li class="nav-item ">
                        <a class="nav-link"  href="http://127.0.0.1:8000/logout"    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="color:#fff;"><i class="fas fa-sign-out-alt"></i> logout</a>
                    </li>

                </ul>
                <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">--}}
                    <input type="hidden" name="_token" value="Mxb28q4SnSs7UP8UfcYw0KZtTi4g4a9khpdk7Da6">        </form>
            </div>
        </nav>
        <div class="container-fluid">

            <div class="container">
                <h1 class="mt-4 text-center"> Advertisements</h1>



                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
        </div>
    </div>
</div>
        <script src="http://127.0.0.1:8000/js/jquery.min.js"></script>
        <script src="http://127.0.0.1:8000/js/bootstrap.bundle.min.js"></script>
</body>
</html>



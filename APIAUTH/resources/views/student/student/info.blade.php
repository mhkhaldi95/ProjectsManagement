@extends('student.master.master')
@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">
        @if($errors->any())
            <div class="alert alert-primary" role="alert">
                {{$errors->first()}}
            </div>
        @endif

        <div class="container-fluid">
            <div class="container">
                <h1 class="mt-4 text-center"> {{trans('main.my info')}}</h1>
                <form style="width:70%;">

                    <div class="form-group">
                        <label> {{trans('main.type account')}}</label>
                        <input type="text" class="form-control" placeholder="Type" value="Student" disabled="">
                    </div>

                    <div class="form-group">
                        <label>{{trans('main.University ID')}}</label>
                        <input type="text" class="form-control" placeholder="ID" value="{{$user->IDD}}" disabled="">
                    </div>

                    <div class="form-group">
                        <label>{{trans('main.Name')}}</label>
                        <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" disabled="">
                    </div>

                    <div class="form-group">
                        <label>{{trans('main.Email')}}</label>
                        <input type="text" class="form-control" placeholder="Email" value="{{$user->email}}" disabled="">
                    </div>

                    <div class="form-group">
                        <label>{{trans('main.Phone No')}}</label>
                        <input type="text" class="form-control" placeholder="Phone" value="{{$user->phone}}" disabled="">
                    </div>

                    <div class="form-group">
                        <label>{{trans('main.Specialization')}}</label>
                        <input type="text" class="form-control" placeholder="Specialization" value="{{$user->specialization}}" disabled="">
                    </div>

                    <div class="form-group">
                        <label>{{trans('main.level')}}</label>
                        <input type="text" class="form-control" placeholder="level" value="{{$user->level}}" disabled="">
                    </div>



                </form>


                </head>

                <body>
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </body>

                </html>


            </div>
        </div>
    </div>

    @endsection



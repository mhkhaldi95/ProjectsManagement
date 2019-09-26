@extends('student.master.master')
@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">



        <div class="container-fluid">
            @if($errors->any())
                <div class="alert alert-primary" role="alert">
                    {{$errors->first()}}
                </div>
            @endif

        @if($objProo!=null)
            <div class="container">

                <h1 class="mt-4 text-center"> مشروع الطالب</h1>
                <form style="width:70%;">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> اسم المشروع:</label>

                        <p>{{$objProo->name}}</p>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> اسماء المجموعة:</label>

                        @foreach($group as $grou)

                        <ul> {{$grou->name}}</ul>

                        @endforeach

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">المناقشين:</label>
                        @if(count($teachers)>0)
                        @foreach($teachers as $teacher)

                            <ul>



                                <li>{{$teacher->name}}</li>

                            </ul>

                        @endforeach
                        @else
                        <li> لم يوافق اي مناقش بعد </li>

                    @endif



                    </div>

                    @if(count($proj->discussion)>0)
                    <div class="form-group">
                        <label for="exampleInputPassword1">تاريخ المناقشة:</label>

                        <p> <i class="fa fa-calendar" aria-hidden="true" style="margin-right:5px;"></i>{{ $proj->discussion->date->format('d/m/Y')}}</p>


                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">وقت المناقشة:</label>
                        <p> <i class="far fa-clock" style="margin-right:5px;"></i>{{$proj->discussion->time}}</p>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> المدة:</label>
                        <p> <i class="far fa-clock" style="margin-right:5px;"></i>{{ $proj->discussion->duration}}</p>

                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">مكان المناقشة:</label>
                        <p> <i class="fa fa-map-marker" aria-hidden="true" style="margin-right:5px;"></i>{{ $proj->discussion->place}}</p>

                    </div>
                    @else   <div class="form-group">
                        <p> الرجاء الانتظار حتى يحدد المشرف موعد المناقشة المناسب .</p>
                    </div>
                    @endif

                    @if(count($objProo)>0)
                    <div class="form-group">

                        <a class="btn btn-primary" href="/std/update/project">تعديل المشروع</a>
                        <a class="btn btn-primary" href="/add/std_to_project/view">اضافة طلاب</a>
{{--                        <a class="btn btn-primary" href="/std/invite/project">دعوة انضمام</a>--}}

                    </div>
                        @endif
                </form>
{{--                <a class="btn btn-primary" href="/project/std/add">إنشاء مشروع جديد</a>--}}
            </div>
                @else


            <h1>ليس لديك مشروع</h1>
                <a class="btn btn-primary" href="/project/std/add">إنشاء مشروع جديد</a>
                @endif
        </div>
    </div>

@endsection
@section('script')
    <script src="../assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
    <script>
        swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
    </script>

@endsection

<!--              <h1 class="mt-4 text-center"> دعوات الانضمام </h1>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم المشروع</th>
                        <th scope="col"> المشاركين</th>
                        <th scope="col"> المناقش</th>
                        <th scope="col"> التاريخ</th>
                        <th scope="col"> الوقت</th>
                        <th scope="col"> المكان</th>

                        <th scope="col">قبول/رفض</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">1</th>
{{--                        <td> {{$objProo->name}}</td>--}}
                        <td>
{{--                            @foreach($group as $grou)--}}

{{--                                <ul> {{$grou->name}}</ul>--}}

{{--                            @endforeach--}}
        </td>
        <td>

        </td>


        <td> date </td>
        <td> hour </td>
        <td> place </td>

        <td> <a href="" class="delete-post-link"> <i class="fas fa-check-circle"></i>
            </a>

            <a href="">
                <i class="fas fa-minus-circle"></i></a></td>


    </tr>

    </tbody>
</table>-->



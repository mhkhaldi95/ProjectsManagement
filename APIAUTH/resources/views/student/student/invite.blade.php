
@extends('student.master.master')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-primary" role="alert">
            {{$errors->first()}}
        </div>
    @endif
    <div class="container">


        <h1 class="mt-4 text-center"> بيانات المشروع</h1>
        <form style="width:70%;">
            <div class="form-group">
                <label for="exampleInputEmail1"> عنوان المشروع:</label>
                <p>
                   {{Auth::user()->details_std->project->name}}</p>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1"> اسماء المجموعة:</label>
                <p>
                <ul>

                    <li>{{Auth::user()->details_std->name}}</li>


                </ul>
                </p>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">المناقشين:</label>
                <p>
                <ul>

                    <li> لم يوافق اي مناقش بعد. </li>

                    <li>اسم المناقش</li>

                </ul>
                </p>

            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">تاريخ المناقشة:</label>
                <p> <i class="fa fa-calendar" aria-hidden="true" style="margin-right:5px;"></i>\</p>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">وقت المناقشة:</label>
                <p> <i class="far fa-clock" style="margin-right:5px;"></i></p>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"> المدة:</label>
                <p> <i class="far fa-clock" style="margin-right:5px;"></i></p>

            </div>



            <div class="form-group">
                <label for="exampleInputPassword1">مكان المناقشة:</label>
                <p> <i class="fa fa-map-marker" aria-hidden="true" style="margin-right:5px;"></i></p>

            </div>

            <div class="form-group">
                <p> الرجاء الانتظار حتى يحدد المشرف موعد المناقشة المناسب .</p>
                <a class="btn btn-primary" href="invite_friends.php?accept&project=">قبول الانضمام</a>
                <a class="btn btn-primary" href="invite_friends.php?deny&project=">رفض الانضمام</a>

            </div>



        </form>

        <form style="width:70%;" action="/std/invite/store/project" method="post">
            @csrf
            <div class="form-group mt-4">

                <label for="exampleInputPassword1">دعوة الطلاب للانضمام</label>
                @foreach($stdInv as $stdIn )
                <ul>

                    <li name="friend"> {{$stdIn->name}}</li>
                    <a href="/std/invite/not/{{$stdIn->id}}" class="btn btn-primary"> الغاء الدعوة </a>
{{--                    <input type="hidden" name="project" value="" />--}}
                </ul>
                @endforeach

                @if(count($stdArr)>0)
                <label for="exampleInputPassword1">الطلاب</label>
                <select class="form-control form-control-lg" name="friend">
                    @foreach($stdArr as $std)
                    <option value="{{$std->id}}">{{$std->name}}</option>
                        @endforeach

                </select>


            </div>
{{--            <input type="hidden" name="project" value="" />--}}
            <input type="submit" class="btn btn-primary" value="ارسال دعوة" name="invite">


            @else  <h1 class="mt-4"> لا يوجد طلاب متاحين .. </h1>
                @endif

        </form>

{{--        <h1 class="mt-4"> ليس لديك مشروع . </h1>--}}
{{--        <a class="btn btn-primary" href="projects/addProject.php">اضافة مشروع جديد</a>--}}


    </div>
</div>
@endsection
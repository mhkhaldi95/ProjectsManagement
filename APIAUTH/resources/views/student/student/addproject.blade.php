@extends('student.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        @if(count(Auth::user()->details_std->project)==0)
        <div class="container">


            <h1 class="mt-4 text-center">اضافة مشروع جديد</h1>
            <form style="width:70%;" action="/std/store_project" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"> عنوان المشروع</label>
                    <input type="text" required class="form-control" placeholder="عنوان المشروع" name="p_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> اللغة البرمجية</label>
                    <input type="text" required class="form-control" placeholder="اللغة البرمجية المستخدمة" name="pr_type">
                </div>




                <div class="form-group">
                    <label for="exampleFormControlTextarea2">نبذة مختصرة</label>
                    <textarea class="form-control rounded-0" required id="exampleFormControlTextarea2" rows="3" name="discreption"></textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlFile1" > رفع ملف</label>
                    <input type="file" required class="form-control-file" id="exampleFormControlFile1" name="project_file">
                </div>



                <input type="submit" required class="btn btn-primary" value="اضافة" name="submit">
            </form>

{{--            <h1 class="mt-4">لديك مشروع مسبقا .</h1>--}}
{{--            <a class="btn btn-primary" href="">تعديل المشروع ؟</a>--}}


        </div>
            @else
    </div> <h1 class="mt-4">لديك مشروع مسبقا .</h1>
    @endif
    @endsection
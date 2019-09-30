
@extends('student.master.master')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-primary" role="alert">
            {{$errors->first()}}
        </div>
    @endif

    <div class="container">

        <h1 class="mt-4 text-center">تحديث المشروع</h1>



            <form style="width:70%;" action="/std/update_project" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">  عنوان المشروع </label>
                <input type="text" class="form-control" name="p_name"  value="الاسم" placeholder="Enter  Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">  لغة البرمجة المستخدمة</label>
                <input type="text" class="form-control" name="pr_type" value="لغة البرمجة" placeholder="Enter Project Type">
            </div>

            <!-- <div class="form-group">
              <label for="exampleInputPassword1">Teachers</label>
                  <select class="form-control form-control-lg">
                    <option>Ahmed</option>
                    <option>Ali</option>
                  </select>
                  </div>-->


            <div class="form-group">
                <label for="exampleFormControlTextarea2">الوصف</label>
                <textarea class="form-control rounded-0" name="discreption" id="exampleFormControlTextarea2" rows="3">الوصف</textarea>
            </div>


            <div class="form-group">
                <label for="exampleFormControlFile1"> رفع الملفات</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="project_file">
            </div>



            <button type="submit" class="btn btn-primary" name="update">تحديث المشروع</button>
                <a class="btn btn-primary" href="/std/delete/project">حذف المشروع</a>
        </form>

{{--        <h1 class="mt-4">ليس لديك مشاريع لتعديلها </h1>--}}

    </div>
</div>
@endsection
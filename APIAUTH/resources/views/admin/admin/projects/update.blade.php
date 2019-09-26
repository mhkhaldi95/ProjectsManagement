
@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">

            <h1 class="mt-4 text-center">تحديث المشروع</h1>


            <form style="width:70%;" action="/admin/update/project/{{$project->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">  عنوان المشروع </label>
                    <input type="text" class="form-control" required name="p_name"  value="{{$project->name}}" placeholder="Enter  Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">  لغة البرمجة المستخدمة</label>
                    <input type="text" class="form-control" required name="pr_type" value="{{$project->program_type}}" placeholder="Enter Project Type">
                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea2">الوصف</label>
                    <textarea class="form-control rounded-0" required name="discreption"  id="exampleFormControlTextarea2" rows="3">الوصف</textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlFile1"> رفع الملفات</label>
                    <input type="file" class="form-control-file" required id="exampleFormControlFile1" name="project_file">
                </div>



                <button type="submit" class="btn btn-primary" name="update">تحديث المشروع</button>
                <script>

                </script>
            </form>



        </div>
    </div>
@endsection
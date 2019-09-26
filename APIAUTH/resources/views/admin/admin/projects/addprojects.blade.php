

@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">


            <h1 class="mt-4 text-center">إضافة مشروع جديدة</h1>
            <form style="width:70%;" method="post" action="/admin/add/projects" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"> اسم المشروع</label>
                    <input type="text" required class="form-control" placeholder="ادخل اسم المشروع " name="p_name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> لغة البرمجة المستخدمة</label>
                    <input type="text" class="form-control" required placeholder="ادخل لغة البرمجةالمستخدمة " name="pr_type">
                </div>

{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputPassword1">الطالب </label>--}}
{{--                    @if(count($students)>0 )--}}
{{--                    <select class="form-control form-control-lg" name="student">--}}

{{--                        @foreach ($students as $std)--}}
{{--                        <option value="{{$std->id}}">{{$std->name}}</option>--}}
{{--                      @endforeach--}}
{{--                    </select>--}}
{{--                        @else <span>لا يوجد طلاب</span>--}}
{{--                        @endif--}}
{{--                </div>--}}


                <div class="form-group">
                    <label for="exampleFormControlTextarea2">الوصف </label>
                    <textarea class="form-control rounded-0"  required id="exampleFormControlTextarea2" rows="3" name="discreption"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" > رفع الملف</label>
                    <input type="file" required class="form-control-file" id="exampleFormControlFile1" name="project_file">
                </div>

                <input type="submit" class="btn btn-primary mb-4"  required value="إضافة" name="submit">
            </form>

        </div>
    </div>
@endsection
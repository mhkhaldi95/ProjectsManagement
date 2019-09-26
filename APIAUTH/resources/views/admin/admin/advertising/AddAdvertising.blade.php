@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">

            <h1 class="mt-4 text-center">اضافة اعلان جديد</h1>
            <form style="width:70%;" method="post" action="/add/advertising" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"> العنوان</label>
                    <input type="text" class="form-control" required placeholder="العنوان" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea2">المحتوى</label>
                    <textarea class="form-control rounded-0" required id="exampleFormControlTextarea2" rows="3" name="discreption"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> أخر موعد</label>
                    <input type="date" class="form-control" required placeholder="أخر موعد" name="LastDate">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1"> الملف</label>
                    <input type="file" class="form-control-file" required id="exampleFormControlFile1" name="file">
                </div>



                <button type="submit" class="btn btn-primary">اضافة</button>
            </form>


        </div>
    </div>
@endsection

@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">

            <h1 class="mt-4 text-center">Update Advertising</h1>
            <form style="width:70%;" method="post" action="/update/advertising/{{$adv->id}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"> Title</label>
                    <input type="text" class="form-control" name="name" required value="{{$adv->name}}" placeholder="Enter  Name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea2">Description</label>
                    <textarea class="form-control rounded-0" name="discreption"  required id="exampleFormControlTextarea2" rows="3">{{$adv->discreption}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> أخر موعد</label>
                    <input type="date" class="form-control" required placeholder="أخر موعد" name="LastDate">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1"> file input</label>
                    <input type="file" class="form-control-file" name="file" required id="exampleFormControlFile1">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection
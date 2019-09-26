@extends('admin.master.master')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6>{{$errors->first()}}</h6>
        </div>
    @endif
    <div class="container">

        <h1 class="mt-4 text-center"> تحديث المناقشات</h1>
        <form style="width:70%;" method="post" action="/update/discussions/{{$dis->id}}">
            @csrf
            <div class="form-group">
                <label for="">  التاريخ</label>
                <input type="Date" required class="form-control"  name="date" value="" >
            </div>

            <div class="form-group">
                <label for="">  الوقت</label>
                <input type="time" required class="form-control"  name="time" value="{{$dis->time}}">
            </div>

            <div class="form-group">
                <label for="">  المكان</label>
                <input type="text" required class="form-control" name="place" value="{{$dis->place}}" >
            </div>
            <div class="form-group">
                <label for="">  المدة</label>
                <input type="text" required class="form-control" name="duration" value="{{$dis->duration}}" onkeypress="return /^\d$/.test(event.key);">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">تحديث </button>
        </form>




    </div>

</div>
    @endsection
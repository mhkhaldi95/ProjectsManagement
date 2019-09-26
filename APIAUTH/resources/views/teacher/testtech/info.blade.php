@extends('teacher.testtech.master.master')
@section('content')
    <h1 class="mt-4 text-center"> بياناتي  </h1>
    @if($errors->any())
        <div class="alert alert-primary" role="alert">
            {{$errors->first()}}
        </div>
    @endif
    <form style="width:70%;">

        <div class="form-group">
            <label for="exampleInputEmail1"> نوع الحساب </label>
            <input type="text" class="form-control" placeholder="Type" value="Teacher" disabled="">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">الرقم الجامعي </label>
            <input type="text" class="form-control" placeholder="ID" value="{{$user->IDD}}" disabled="">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">الاسم </label>
            <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" disabled="">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">البريد الالكتروني </label>
            <input type="text" class="form-control" placeholder="Email" value="{{$user->email}}" disabled="">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">رقم الهاتف </label>
            <input type="text" class="form-control" placeholder="Phone" value="{{$user->phone}}" disabled="">
        </div>

    </form>

@endsection
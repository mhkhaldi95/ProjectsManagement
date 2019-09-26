@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">

           @if(count($advs)>0)
            <h1 class="mt-4 text-center"> الاعلانات</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">أخر موعد للتسجيل</th>
                    <th scope="col">الاعدادات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($advs as $adv)
                <tr>
                    <th scope="row">{{$adv->id}}</th>
                    <td> {{$adv->name}} </td>
                    <td> {{$adv->LastDate}} </td>
                    <td> <a href="/delete/advertising/{{$adv->id}}" class="delete-post-link"> <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="/update/advertising/view/{{$adv->id}}">
                            <i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="/download/{{$adv->filename}}" download>
                            <i class="fa fa-download" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            <a class="btn btn-primary" href="/add/advertising/view">اضافة اعلان جديد</a>
        </div>
       @else

        <h1 class="mt-4 text-center"> لا يوجد إعلانات</h1>
            <a class="btn btn-primary" href="/add/advertising/view">اضافة اعلان جديد</a>

   @endif
    </div>
    @endsection
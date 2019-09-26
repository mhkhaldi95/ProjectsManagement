@extends('admin.master.master')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6>{{$errors->first()}}</h6>
        </div>
    @endif
    <div class="container">

        @if(count($discussions)>0)
        <h1 class="mt-4 text-center"> المناقشات</h1>
{{--        <a class="btn btn-primary" href="#" style="margin-bottom:5px;"> تصدير ملف اكسل</a>--}}

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم المشروع</th>
                <th scope="col"> المناقش</th>
                <th scope="col"> التاريخ</th>
                <th scope="col"> الوقت</th>
                <th scope="col"> المكان</th>
                <th scope="col"> المدة</th>

                <th scope="col">إعدادات</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($discussions as $dis)

            <tr>
                <th scope="row">{{$dis->id}}</th>
                <td> {{$dis->project->name}}</td>
                <td>

                    @if(count($dis->project->teachers)>0)
                        @foreach ($dis->project->teachers as $teacher)
                          <li>{{$teacher->name}}</li>
                        @endforeach
                    @else
                      لم يحدد أي مناقش بعد
                    @endif
                </td>


                <td> {{ $dis->date->format('d/m/Y')}} </td>
                <td> {{ $dis->time}}</td>
                <td> {{ $dis->place}} </td>
                <td>{{ $dis->duration}} </td>

                <td> <a href="/delete/discussion/{{$dis->id}}" class="delete-post-link"> <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                    <a href="/update/discussions/view/{{$dis->id}}">
                        <i class="fa fa-edit" aria-hidden="true"></i></a></td>


            </tr>
                @endforeach

            </tbody>
        </table>
        <a class="btn btn-primary" href="/admin/add/discussions/view">إضافة</a>
        <!-- <a class="btn btn-primary" href="#"> استيراد ملف اكسل </a>-->


    </div>
    @else
    <h1 class="mt-4 text-center"> لا توجد مناقشات</h1>
        <a class="btn btn-primary" href="/admin/add/discussions/view">إضافة</a>

   @endif
</div>
    @endsection
@extends('teacher.testtech.master.master')
@section('content')
    <!-- Page Content -->
    <div id="page-content-wrapper  Sidebar_r" style="width: 100%;">
        @if($errors->any())
            <div class="alert alert-primary" role="alert">
                {{$errors->first()}}
            </div>
        @endif


        @if(count($projects)>0)
        <div class="container-fluid">
            <div class="container">

                <h1 class="mt-4 text-center"> المشاريع</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">العنوان</th>
                        <th scope="col">لغة البرمجة المستخدمة</th>

                        <th scope="col">الاعدادات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <th scope="row"></th>
                        <td>{{$project->name}} </td>
                        <td> {{$project->program_type}}</td>

                        <td>

                            <a href="/download/{{$project->filename}}" download>   <i class="fa fa-download" aria-hidden="true"></i></a>

                            @if(!in_array($project->id,$id_project))
                            <a href="/add/project/teacher/{{$project->id}}" style="color:#222;"> <i class="fa fa-plus-circle"></i></a>
                            @else

                            <a href="/delete/project/teacher/{{$project->id}}">   <i class="fa fa-minus-circle"></i></a></td>
                        @endif


                    </tr>
                        @endforeach


                    </tbody>
                </table>



            </div>
            @else{<h1 class="mt-4 text-center"> لا يوجد مشاريع</h1>}
                @endif




        </div>
    </div>

@endsection
@extends('admin.master.master')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6>{{$errors->first()}}</h6>
        </div>
    @endif
    <div class="container">
        <h1 class="mt-4 text-center"> المجموعات</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم المشروع</th>
                <th scope="col">أسماء المناقشين</th>
                <th scope="col"> عدد الطلاب</th>
                <th scope="col">أسماء الطلاب </th>
                <th scope="col">اضافة طلاب </th>


            </tr>
            </thead>
            <tbody>
          @foreach($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td> {{$project->name}}</td>
                <td>
                    @foreach($project->teachers as $teach)
                        <li> {{$teach->name}}</li>
                    @endforeach
                 </td>
                <td> {{count($project->students)}} </td>
                <td>
                    <ul>
                        @foreach($project->students as $std)

                            <li>  {{$std->name}} <a href="/admin/delete/std_form_group/{{$std->id}}">   <i class="fa fa-minus-circle"></i></a></li>
                        @endforeach

                    </ul>
                </td>
                @if(count($project->students)<4)
                <td><a href="/add/std_to_group/view/{{$project->id}}" style="color: #1b1e21" ><i class="fas fa-user-plus"></i></a></td>
                    @else <td>العدد مكتمل لهذا المشروع</td>
                    @endif

            </tr>
           @endforeach
            </tbody>
        </table>
        <!--          <a class="btn btn-primary" href="addGroups.html">إضافة مجموعة جديدة </a>
                  -->

    </div>
</div>
    @endsection
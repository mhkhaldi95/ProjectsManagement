
@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">

           @if(count($projects)>0)
            <h1 class="mt-4 text-center"> المشاريع</h1>
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">اللغة المستخدمة</th>

                    <th scope="col">الاعدادات</th>

                </tr>
                </thead>
                <tbody>

                @for ($i=0;$i<count($projects);$i++)


                <tr id="tr_{{$projects[$i]->id}}">
                    <th scope="row">{{$projects[$i]->id}}</th>
                    <td> {{$projects[$i]->name }}</td>
                    <td>{{ $projects[$i]->program_type}}</td>

                    <td>
                        <a data-value="{{$projects[$i]->id}}" id="delete" class="delete-post-link remove-project"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a data-value="{{$projects[$i]->id}}" class="editp" data-toggle="modal" data-target="#editproject" href=""><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="/download/{{$projects[$i]->filename}}" >
                            <i class="fa fa-download" aria-hidden="true"></i></a>
                    </td>
                </tr>
                        {{--                        <a href="/admin/delete/project/{{$project->id}}" id="delete" class="delete-post-link"> <i class="fa fa-trash" aria-hidden="true"></i>--}}
{{--                        </a>--}}


{{--                        <a href=""  data-value="{{$projects[$i]->id}}" class="" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-edit" aria-hidden="true"></i></a>--}}

{{--                             <a href="/admin/update/project/view/{{$projects[$i]->id}}">--}}
{{--                            <i class="fa fa-edit" aria-hidden="true"></i>--}}
{{--                        </a>--}}





                @endfor

                </tbody>
            </table>
            <div>
                {{$projects->links()}}
            </div>
            <a class="btn btn-primary "  data-toggle="modal" data-target="#addproject" href="">اضافة مشروع جديد أجاكس</a>
                <a class="btn btn-primary" href="/admin/add/projects/view">اضافة مشروع جديد</a>



        </div>
        @else

        <h1 class="mt-4 text-center"> لا يوجد مشاريع</h1>

                <a class="btn btn-primary" href="/admin/add/projects/view">اضافة مشروع جديد</a>
       @endif
    </div>


        <div class="modal fade"  id="addproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">اضافة المشروع</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">
                        <form  id="ad" method="post" action="javascript:void(0)">

                            @csrf
                        <div class="md-form mb-4">
                            <label for="exampleInputEmail1">  عنوان المشروع </label>
                            <input type="text" id="p_name" class="form-control" required name="p_name"  value="" placeholder="">
                        </div>

                        <div class="md-form mb-4">
                            <label for="exampleInputEmail1">  لغة البرمجة المستخدمة</label>
                            <input type="text" id="pr_type" class="form-control" required name="pr_type" value="" placeholder="">
                        </div>
                        <div class="md-form mb-4">
                            <label for="discreption">الوصف</label>
                            <textarea class="form-control rounded-0" required name="discreption"  id="discreption" rows="3"></textarea>
                        </div>
                        <div class="md-form mb-4">
                            <label for="project_file"> رفع الملفات</label>
                            <input type="file" class="form-control-file" required id="project_file" name="project_file">
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" id="send_form" class="btn btn-primary add" name="update">اضافة المشروع</button>
                        </div>
                    </form>
                    </div>


                </div>

            </div>
        </div>
    <div class="modal fade"  id="editproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">تحديث المشروع</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">
                    <form  id="edit" method="post" action="javascript:void(0)">

                        @csrf
                        <div class="md-form mb-4">
                            <label for="exampleInputEmail1">  عنوان المشروع </label>
                            <input type="text" id="p_name" class="form-control" required name="p_name"  value="" placeholder="">
                        </div>

                        <div class="md-form mb-4">
                            <label for="exampleInputEmail1">  لغة البرمجة المستخدمة</label>
                            <input type="text" id="pr_type" class="form-control" required name="pr_type" value="" placeholder="">
                        </div>
                        <div class="md-form mb-4">
                            <label for="discreption">الوصف</label>
                            <textarea class="form-control rounded-0" required name="discreption"  id="discreption" rows="3"></textarea>
                        </div>
                        <div class="md-form mb-4">
                            <label for="project_file"> رفع الملفات</label>
                            <input type="file" class="form-control-file" required id="project_file" name="project_file">
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" id="send_form" class="btn btn-primary add" name="update">تحديث المشروع</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>



@endsection
@section('script')
    <script>
        $(document).on("click",'.remove-project',function(){



            var id=$(this).data('value');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method:'POST',
                        url:'http://127.0.0.1:8000/admin/delete/project/'+id,
                        data:{body:'',_token:'{{csrf_token()}}'},
                        success: function (response) {
                            var count = $('table tr').length;

                            $( "#tr_"+id).remove();
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                            if(count == 2){
                                location.reload();
                            }



                        }

                    })

                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        })
        var d;
        $(document).ready(function(){

                $(document).on("click",'.editp',function () {
            d=$(this).data('value');

        })
            $('#ad').on('submit', function(event){

                event.preventDefault();



                $.ajax({
                    url: "/admin/add/projects",
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        if(data.message==="must file .txt")
                            alert(data.message);
                        else {
                            var ro = '<tr id="tr_'+data.data.id+'">\n' +
                                '<th scope="row">'+data.data.id+'</th>\n' +
                                '<td>'+data.data.name+'</td>\n' +
                                '                    <td>'+data.data.program_type+'</td>\n' +
                                '\n' +
                                '<td>\n' +
                                '<a data-value="'+data.data.id+'" id="delete" class="delete-post-link remove-project"> <i class="fa fa-trash" aria-hidden="true"></i></a>\n' +
                                '<a data-value="'+data.data.id+'" class="editp" data-toggle="modal" data-target="#editproject" href=""><i class="fa fa-edit" aria-hidden="true"></i></a>\n' +
                                '<a href="/download/'+data.data.filename+'" >\n' +
                                '<i class="fa fa-download" aria-hidden="true"></i></a>\n' +
                                '</td>\n' +
                                '</tr>';


                            $('#addproject').modal("hide");
                            $('#table tbody').append
                            (ro);

                        }
                    }
                })

            });

            $('#edit').on('submit', function(event){

                event.preventDefault();
                alert(d);
                $.ajax({
                    url: "/admin/update/project/"+d,
                    method:"POST",
                    data:new FormData(this),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        if(data.message==="must file .txt")
                            alert(data.message);
                        else {
                          
                            $('#editproject').modal("hide");
                            location.reload();


                        }
                    }
                })

            });

        });
</script>


    <script>
    </script>


    @endsection

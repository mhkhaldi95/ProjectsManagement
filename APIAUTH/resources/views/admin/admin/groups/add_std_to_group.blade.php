@extends('admin.master.master')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6>{{$errors->first()}}</h6>
        </div>
    @endif

        <h1 class="mt-4 text-center">اضافة طلاب</h1>

        <form style="width:70%;" method="post" action="/add/std_to_group/{{$project->id}}">
            @csrf
            <div class="form-group">
                <label for="">الطلاب الذين ليس لديهم مشروع</label>
                <select class="itemName form-control" style="width: 200px" id="nameid" name="id">

                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->name}}	</option>
                    @endforeach

                </select>
            </div>


            <button type="submit" class="btn btn-primary" name="submit">إضافة</button>
        </form>


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">

        $("#nameid").select2({
            placeholder: "Select a Name",
            allowClear: true
        });
    </script>

@endsection

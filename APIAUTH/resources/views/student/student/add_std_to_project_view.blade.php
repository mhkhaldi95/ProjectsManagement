@extends('student.master.master')
@section('content')
    @if($errors->any())
        <div class="alert alert-primary" role="alert">
            {{$errors->first()}}
        </div>
    @endif

    @if(count($students)>0)
        <h1 class="mt-4 text-center">اضافة مشروع للطلاب</h1>

    <form style="width:70%;" method="post" action="/add/std_to_project">
        @csrf
        <div class="form-group">
            <label for="">الطلاب الذين ليس لديهم مشروع</label>
            <select class="itemName form-control" style="width: 200px" id="nameid" name="id">

                        @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}	</option>
                        @endforeach

            </select>
        </div>

        @if($errors->any())
            <h6>{{$errors->first()}}</h6>
        @endif

        <button type="submit" class="btn btn-primary" name="submit">إضافة</button>
    </form>
    @else <h1 class="mt-4 text-center">لا يوجد طلاب متاحين لاضافة مشروعك لهم</h1>
    @endif
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">

        $("#nameid").select2({
            placeholder: "Select a Name",
            allowClear: true
        });
    </script>

@endsection

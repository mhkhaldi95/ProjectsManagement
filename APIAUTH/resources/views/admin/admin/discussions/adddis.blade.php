@extends('admin.master.master')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6>{{$errors->first()}}</h6>
        </div>
    @endif
    <div class="container">

        <h1 class="mt-4 text-center"> تَحْدِيْدُ مناقشةٍ </h1>
        <form style="width:70%;" method="post" action="/admin/add/discussions">
        @csrf

            <div class="form-group">
                <label for="">عنوان المشروع</label>
                <select class="itemName form-control form-control-lg" style="width: 200px" id="nameid"  name="project">

                    @foreach($projects as $project){
                    @if(count($project->discussion)==0)
                        <option value="{{$project->id}}">{{$project->name}}	</option>
                    @endif
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for=""> تاريخ المناقشات</label>
                <input type="Date" required class="form-control"  name="date" >
            </div>

            <div class="form-group">
                <label for=""> الوقت</label>
                <input type="time" required class="form-control"  name="time">
            </div>

            <div class="form-group">
                <label for="">  المكان</label>
                <input type="text" required class="form-control" name="place" >
            </div>

            <div class="form-group">
                <label for="">  المدة</label>
                <input type="text" required class="form-control" name="duration" onkeypress="return /^\d$/.test(event.key);">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">إضافة</button>
        </form>



    </div>

</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

    $("#nameid").select2({
        placeholder: "Select a Name",
        allowClear: true
    });
</script>
    @endsection
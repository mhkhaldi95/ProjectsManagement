@extends('student.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-primary" role="alert">
                {{$errors->first()}}
            </div>
        @endif

        <div class="container">
            <h1 class="mt-4 text-center"> {{trans('main.Advertisements')}}</h1>
            @foreach($adversArr as $adver)

                <div class="card-header" >
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed buttonCollapse" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            أخر موعد لتسجيل مشروع  {{$adver->name}} {{$adver->LastDate}}
                        </button>
                    </h5>
                </div>

                <div class="card-body">
                    {{$adver->discreption}}
                </div>
                <a href="/download/{{$adver->filename}}" class="btn btn-primary" style="margin-top:7px;"><i class="fas fa-download" style="color:#fff!important;margin-right:2px;"></i>تحميل التفاصيل</a>




            @endforeach



            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
    @endsection

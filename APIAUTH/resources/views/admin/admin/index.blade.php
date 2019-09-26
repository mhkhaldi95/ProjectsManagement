
@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h6>{{$errors->first()}}</h6>
            </div>
        @endif
        <div class="container">
            <h1 class="mt-4 text-center"> الصفحة الرئيسية</h1>


            @if(count($projects)>0)
            <script>
                window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,

                        title:{
                            text:"المشاريع"
                        },
                        axisX:{
                            interval: 1
                        },
                        axisY2:{
                            interlacedColor: "rgba(1,77,101,.2)",
                            gridColor: "rgba(1,77,101,.1)",
                            title: "عدد الطلاب"
                        },
                        data: [{
                            type: "bar",
                            name: "Students",
                            axisYType: "secondary",
                            color: "#563d7c",
                            dataPoints: [
                                    @foreach($projects as $project)
                                { y: {{count($project->students)}}, label: "المشروع رقم {{$project->id}}" },
                                @endforeach


                            ]
                        }]
                    });
                    chart.render();
                }
            </script>

            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

            <style>
                .canvasjs-chart-container{
                    text-align: right !important;
                }
            </style>
                @else <h1 class="mt-4 text-center"> لا يوجد مشاريع مضافة</h1>
                @endif


        </div>
    </div>
    @endsection

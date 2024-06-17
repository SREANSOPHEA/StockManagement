@extends('user.master')
@section('title','About us')
<style>
    .about{
        background-color: rgb(74, 74, 74);
    }
</style>
@section('content')
    <div class="w-100 row pt-3 bg">
        <div class="col-md-6 text-center text-light p-3">
            <div class="w-75" style="margin: auto">
                <h3>Lecturer</h3>
                <img src="{{asset('images/teacher.jpg')}}" class="w-75">
                <h4>Mr. HANG Sovann</h4>
            </div>
        </div>
        <div class="col-md-6 p-3">
            <div class="b rounded w-100 p-3">
                <h4 class="text-center"><b><i><u>Faculty of INFORMATION TECHNOLOGY AND SCIENCE</u></i></b></h4>
                <h5 class="text-center"><b><i><u>Major Assignment</u></i></b></h5>
                <h5><b>Topic: Stock Management System</b></h5>
                <h5><b>Developer: Group 1</b></h5>
                <h5><b>Class: 413 Morning</b></h5>
                <h5><b>Subject: Professional Web development System</b></h5>
                <h5><b>Batch: V</b></h5>
                <h5><b>Academic Year: 2023~2024</b></h5>
                <h4 id="stu_name"></h4>
            </div>
        </div>
        <div class="col-12 text-center text-dark">
            <h1 class="text-light"><b><i>Group Members</i></b></h1>
            <div class="w-100 row text-center" style="margin: auto">
                <div class="col-md-4 p-3">
                    <div class="w-75 rounded bg-light p-3" style="margin: auto">
                        <img src="{{asset('images/sophea.jpg')}}" class="w-100">
                        <h5><b>Mr. SREAN Ousophea</b></h5>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="w-75 rounded bg-light p-3" style="margin: auto">
                        <img src="{{asset('images/sophea.jpg')}}" class="w-100">
                        <h5><b>Mr. KIM Sovannara</b></h5>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="w-75 rounded bg-light p-3" style="margin: auto">
                        <img src="{{asset('images/sophea.jpg')}}" class="w-100">
                        <h5><b>Mr. KEO Sovannreach</b></h5>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    {{-- <script>
        var stu_name = ['Mr. SREAN Ousophea','Mr. KIM Sovannara','Mr. KEO Sovannreach'];
        let i = 0;
        window.addEventListener('load',slide());
        function slide(){
            var name = document.getElementById('stu_name');
            name.innerHTML = stu_name[i];
            if(i<stu_name.length-1) i++;
            else i=0;
            settimeout(slide,1000);
        }
    </script> --}}
@endsection
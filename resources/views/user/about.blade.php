@extends('user.master')
@section('title','About us')
<style>
    .about{
        background-color: rgb(74, 74, 74);
    }
</style>
@section('content')
    <div class="w-100 row pt-3">
        <div class="col-md-6 text-center p-3">
            <div class="w-75">
                <h3>Lecturer</h3>
                <img src="{{asset('images/teacher.jpg')}}" class="w-75">
                <h4>Mr. HANG Sovann</h4>
            </div>
        </div>
        <div class="col-md-6 text-center p-3">
            <div class="bg-dark text-light rounded w-100">
                <h3>Group Member</h3>
                {{-- <img src="{{asset('images/teacher.jpg')}}" class="w-50"> --}}
                <h4 id="stu_name"></h4>
            </div>
        </div>
    </div>
    
    {{-- <script>
        var stu_name = ['Mr. SREAN Ousophea','Mr. KIM Sovannara'];
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
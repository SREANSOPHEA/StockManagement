@extends('user.master')
@section('title','Home')
@section('content')
    <img id="slideShow" style="width: 100%;height:90vh">
    {{-- <video width="100%" style="height: 90vh" autoplay>
        <source src="movie.mp4" type="video/mp4">
      </video> --}}
    {{-- <iframe width="100%" style="height: 90vh" src="https://www.youtube.com/embed/OStAo1NTi2k?si=HxpYi2K864P2l7B1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
    <script>
        let i = 1;
        function slide(){
            if(i<=2) i++;
            else i = 1;
            document.getElementById('slideShow').src = "http://localhost:8000/images/hay-day"+i+".jpg";
            setTimeout(slide,2000);
        }
        slide();
    </script>
@endsection
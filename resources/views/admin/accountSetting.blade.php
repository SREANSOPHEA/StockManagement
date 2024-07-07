@extends('admin.masterPage')
@section('title','- Account Setting')
@section('content_Title','Account Setting')
@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="{{asset('images/'.Auth::user()->profile)}}" class="w-25" id="profileImg" style="cursor: pointer">
        </div>
        <div class="col-12">
            <h1 class="text-center"><b>{{Auth::user()->name}}</b></h1>
            <h1 class="text-center"><b>{{Auth::user()->email}}</b></h1>
        </div>
        <hr style="height: 5px;background-color:black">
        <a href="/admin/removeProfile" class="btn btn-danger">Remove Profile</a>
        <form action="/admin/changeProfile" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="img" id="fileImg" style="visibility: hidden">
            <button style="visibility: hidden" id="btn_save_img">submit</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#profileImg").click(function(){
                $("#fileImg").click();
            });
        });
        $("#fileImg").change(function(){
            $("#btn_save_img").click();
        })
    </script>
@endsection
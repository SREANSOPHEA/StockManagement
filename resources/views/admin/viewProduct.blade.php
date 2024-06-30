@extends('admin.masterPage')
@section('title','- View Product')
@section('content_Title','View Product')
@section('content')
    <div class="card p-3 w-100">
        <div class="w-100 d-flex justify-content-end m-2">
            <form action="/admin/view-product" method="get">
                <div class="input-group">
                    <input type="text" name="search">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <table class="w-100 table table-bordered table-light table-hover text-center" style="table-layout: fixed">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($product as $item)
                <tr class="align-middle">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->price}}</td>
                    <td><img src="{{asset('images/'.$item->image)}}" alt="product" class="w-75"></td>
                    <td>
                        <div class="dropdown">
                            <div style="cursor: pointer" data-bs-toggle="dropdown" aria-expanded="false">
                              ...
                            </div>
                          
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/admin/edit-product?id={{$item->id}}"><i class="bi bi-pencil-square"></i>Edit</a></li>
                              <li><a class="dropdown-item" onclick="getID({{$item->id}})"><i class="bi bi-trash-fill"></i>Delete</a></li>
                            </ul>
                          </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$product->links()}}
    </div>
    <!-- Modal -->
    <button style="visibility: hidden" id="delete_btn_modal" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Alert!!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>Are you sure to delete this product? If You deletet this product, product in stock will be remove too.</p>
            <form action="/admin/deleteProduct" method="post">
                @csrf
            <input type="hidden" id="removeID" name="id">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection
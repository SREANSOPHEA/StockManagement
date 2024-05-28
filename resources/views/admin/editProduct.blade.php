@extends('admin.masterPage')
@section('title','- Edit Product')
@section('content_Title','Edit Product')
@section('content')
    <div class="card w-100 p-2">
        @if (session()->has('error'))
            <script>
                $(document).ready(function(){
                    swal('Name already exist!!','Please Try another name','warning');
                })
            </script>
        @endif

        <h3 class="text-center"><i><u>Product</u></i></h3>
        <table class="w-100">
            <form action="/admin/editProductSubmit" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="old_img" value="{{$product->image}}">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" class="form-control border-2 border-dark" value="{{$product->name}}" required></td>
                    <td rowspan="5" class="w-25 text-center">
                        <img src="{{asset('images/'.$product->image)}}" id="imagePreview" style="margin: auto;" class="w-75">
                        <h5>Image</h5>
                    </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        <select name="category" class="form-select border-2 border-dark">
                            @foreach ($category as $item)
                                @if ($item->id == $product->categoryID)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input type="number" name="price" class="form-control border-2 border-dark" value="{{$product->price}}" required></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input type="file" id="imageInput" name="image" class="form-control border-2 border-dark"></td>
                </tr>
                <tr>
                    <th class="align-top">Detail</th>
                    <td><textarea name="detail" class="form-control border-2 border-dark" cols="30" rows="3" required>{{$product->detail}}</textarea></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center"><button type="submit" class="btn btn-primary">Save</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
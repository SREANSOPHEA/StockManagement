@extends('admin.masterPage')
@section('title','- Add Product')
@section('content_Title','Add Product')
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
            <form action="/admin/addProductSubmit" method="post" enctype="multipart/form-data">
                @csrf
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" class="form-control border-2 border-dark" required></td>
                    <td rowspan="5" class="w-25 text-center">
                        <img id="imagePreview" style="margin: auto;" class="w-75">
                        <h5>Image</h5>
                    </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        <select name="category" class="form-select border-2 border-dark">
                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input type="number" name="price" class="form-control border-2 border-dark" required></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input type="file" id="imageInput" name="image" class="form-control border-2 border-dark" required></td>
                </tr>
                <tr>
                    <th class="align-top">Detail</th>
                    <td><textarea name="detail" class="form-control border-2 border-dark" cols="30" rows="3" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center"><button type="submit" class="btn btn-primary">Save</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
@extends('admin.masterPage')
@section('title','- Purchase')
@section('content_Title','Purchase')
@section('content')
    <style>
        .border-dark{
            border: 2px solid black;
        }
    </style>
    <form action="/admin/purchase-submit" method="post">
        @csrf
        <div class="w-100 text-end">
            <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i>Buy</button>
        </div>
        <div id="purchaseData" class="row gap-3 w-100">
            <div class="col-3 align-items-center justify-content-center d-flex card" style="height: 200px" data-bs-toggle="modal" data-bs-target="#exampleModal"><h1>+</h1></div>
        </div>
    </form>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Purchase</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="w-100">
            <div style="visibility: hidden; position: absolute;">
                <select name="id" id="selectID" class="form-select border-2 border-dark">
                    @foreach ($product as $item)
                        <option value="{{$item->id}}">{{$item->id}}</option>
                    @endforeach
                </select>
                <select name="id" id="selectImage" class="form-select border-2 border-dark">
                    @foreach ($product as $item)
                        <option value="{{$item->image}}">{{$item->image}}</option>
                    @endforeach
                </select>
            </div>
            <tr>
                <th>Name</th>
                <td>
                    <select name="name" id="selectName" class="form-select border-2 border-dark">
                        @foreach ($product as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td rowspan="4" class="w-25"><img id="productImage" src="{{asset('images/'.$product[0]->image)}}" class="w-100 border-dark"></td>
            </tr>
            <tr>
                <th>Category</th>
                <td>
                    <select name="category" id="selectCategory" class="form-select border-2 border-dark" disabled>
                       @foreach ($product as $item)
                            <option value="{{$item->category}}">{{$item->category}}</option>
                       @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Price</th>
                <td>
                    <select name="price" id="selectPrice" class="form-select border-2 border-dark" disabled>
                       @foreach ($product as $item)
                            <option value="{{$item->price}}">{{$item->price}}</option>
                       @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><input type="number" id="selectQty" class="form-control border-2 border-dark"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addPurchase()" data-bs-dismiss="modal">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('selectName').addEventListener('change',function(){
        var index = document.getElementById('selectName').selectedIndex;
        document.getElementById('selectCategory').selectedIndex = index;
        document.getElementById('selectID').selectedIndex = index;
        document.getElementById('selectPrice').selectedIndex = index;
        document.getElementById('selectImage').selectedIndex = index;

        var img = document.getElementById('selectImage').value;
        document.getElementById('productImage').src = "http://localhost:8000/images/"+img;
    });
  </script>
@endsection
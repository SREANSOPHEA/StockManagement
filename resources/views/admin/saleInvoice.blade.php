@extends('admin.MasterPage')
@section('title','- Sale Invoice')
@section('content_Title','Sale Invoice')
@section('content')
    <div class="card p-3">
        <table class="w-100 table table-bordered table-light table-hover text-center" style="table-layout: fixed">
           <tr>
                <th>ID</th>
                <th>Buyer</th>
                <th>Product</th>
                <th>Date</th>
                <th>Action</th>
           </tr>
           @foreach ($sale as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    {{$item->product_count}} 
                    @if($item->product_count >1)
                        Types 
                    @else 
                        Type
                    @endif 
                </td>
                <td>{{$item->date}}</td>
                <td><a href="/admin/sale-invoice/{{$item->id}}">View</a></td>
            </tr> 
           @endforeach
        </table>
       {{$sale->links()}}
    </div>
@endsection
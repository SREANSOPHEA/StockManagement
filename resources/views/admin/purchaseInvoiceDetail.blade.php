<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<style>
    table,tr,th,td{
        border: 2px solid black;
    }
    .hide{
        border-left: 2px solid transparent;
        border-bottom: 2px solid transparent;
    }
    @media print{
        .btn{
            display: none;
        }
        .table {
        color: rgb(0, 0, 0) !important;
        background-color: yellow !important;
    }
    }
</style>
<body class="m-0 p-0">
    <div class="p-3 d-flex w-100 align-items-center">
        <div><a href="/admin/purchase-invoice"><img src="{{asset('images/beltei.png')}}" width="70px"></a></div>
        <div class="text-end w-100">
            <button class="btn btn-primary" onclick="print()">Print</button>
        </div>
    </div>
    {{-- <marquee behavior="alternate">Beltei International University</marquee> --}}
    <hr style="height: 3px; background-color:black;margin: auto;" width="90%" >
    <h1 class="text-center"><b><i><u>Invoice</u></i></b></h1>
    <div class="container">
        <div style="line-height: 0">
            <h3>Invoice: <b>#{{$detail[0]->ID}}</b></h3>
            <p>Buyer: <b>{{$detail[0]->admin}}</b></p>
            <p>Seller: <b></b></p>
            <p>Date: <b>{{$detail[0]->date}}</b></p>
        </div>
        <table class="w-100 text-center align-middle" style="table-layout: fixed">
          <tr>
            <th>N<sup>o</sup></th>
            <th>Name</th>
            <th>Category</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
          @php
              $i=1;
          @endphp
          @foreach ($detail as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->product}}</td>
                <td>{{$item->category}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{number_format($item->price)}}$</td>
                <td><b>{{number_format($item->price * $item->quantity)}}$</b></td>
              </tr>
          @endforeach
          <tr >
            <td colspan="4" class="hide"></td>
            <th>Subtotal:</th>
            <td><b>{{number_format($detail[0]->subtotal)}}$</b></td>
          </tr>
          <tr>
            <td colspan="4" class="hide"></td>
            <th>Discount:</th>
            <td><b>{{$detail[0]->discount}}%</b></td>
          </tr>
          <tr>
            <td colspan="4" class="hide"></td>
            <th>Tax:</th>
            <td><b>5%</b></td>
          </tr>
          <tr>
            <td colspan="4" class="hide"></td>
            <th>Total:</th>
            <td><b>{{number_format($detail[0]->amount)}}$</b></td>
          </tr>
        </table>
    </div>
    
</body>
</html>
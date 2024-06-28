@extends('admin.masterPage')
@section('title','-Dashboard')
@section('content_Title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Products</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-box"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$product}} Products</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">8%</span>
                    <span class="text-muted small pt-2 ps-1">increase</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Expenses</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{number_format($expense)}}$</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Purchase Chart</h5>

          <!-- Line Chart -->
          <div id="lineChart"></div>
            <input type="hidden" id="amount_array" value="@foreach ($chart as $item){{$item->amount}}, @endforeach">
            <input type="hidden" id="id_array" value="@foreach ($chart as $item){{$item->id}}, @endforeach">
          <script>
            document.addEventListener("DOMContentLoaded", () => {
                var amount = document.getElementById('amount_array').value;
                var arr_amount = amount.split(',');
                var id = document.getElementById('id_array').value;
                var arr_id = id.split(',');
                var data = [];
                for(i=0;i<arr_amount.length-1;i++){
                        data.push(arr_amount[i]);
                    }
                var time = [];
                for(i=0;i<arr_amount.length-1;i++){
                        time.push("Purchase"+arr_id[i]);
                    }
                    console.log(data);
              new ApexCharts(document.querySelector("#lineChart"), {
                series: [{
                  name: "Amount",
                  data: data
                }],
                chart: {
                  height: 350,
                  type: 'line',
                  zoom: {
                    enabled: false
                  }
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  curve: 'straight'
                },
                grid: {
                  row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                  },
                },
                xaxis: {
                  categories: time,
                }
              }).render();
            });
          </script>
          <!-- End Line Chart -->

        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Customer</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$customer}} Customers</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">8%</span>
                    <span class="text-muted small pt-2 ps-1">increase</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Revenue</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{number_format($revenue)}}$</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sale Chart</h5>

          <!-- Line Chart -->
          <div id="saleChart"></div>
            <input type="hidden" id="amount_array_sale" value="@foreach ($chart_sale as $item){{$item->amount}}, @endforeach">
            <input type="hidden" id="id_array_sale" value="@foreach ($chart_sale as $item){{$item->id}}, @endforeach">
          <script>
            document.addEventListener("DOMContentLoaded", () => {
                var amount = document.getElementById('amount_array_sale').value;
                var arr_amount = amount.split(',');
                var id = document.getElementById('id_array_sale').value;
                var arr_id = id.split(',');
                var data = [];
                for(i=0;i<arr_amount.length-1;i++){
                        data.push(arr_amount[i]);
                    }
                var time = [];
                for(i=0;i<arr_amount.length-1;i++){
                        time.push("Sale"+arr_id[i]);
                    }
                    console.log(data);
              new ApexCharts(document.querySelector("#saleChart"), {
                series: [{
                  name: "Amount",
                  data: data
                }],
                chart: {
                  height: 350,
                  type: 'line',
                  zoom: {
                    enabled: false
                  }
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  curve: 'straight'
                },
                grid: {
                  row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                  },
                },
                xaxis: {
                  categories: time,
                }
              }).render();
            });
          </script>
          <!-- End Line Chart -->

        </div>
      </div>
@endsection
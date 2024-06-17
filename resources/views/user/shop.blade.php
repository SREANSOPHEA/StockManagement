<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin @yield('title')</title>
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
          {{-- <img src="assets/img/logo.png" alt="" /> --}}
          <span class="d-none d-lg-block">Group 1</span>
        </a>
      </div>
      <!-- End Logo -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center gap-5" style="padding-right: 20px">

          <li><a href="/">Home</a></li>
          <li><a href="/shop">Shop</a></li>
          <li><a href="/about">About Us</a></li>
        </ul>
      </nav>
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <h4>Current Order</h4>
        <div id="currentOrder" style="overflow-y: auto;height:45vh">
          
        </div>
      <div style="position: absolute;bottom:0;left:50%;transform:translateX(-50%);z-index: 1000" class="w-100 p-2">
        <div class="bg-dark w-100 rounded p-3">
            <div class="row text-light">
              <input type="hidden" name="subtotal" value="0">
              <input type="hidden" name="discount" value="0">
              <input type="hidden" name="amount" value="0">
                <div class="col-6">Subtotal</div>
                <div class="col-6 text-end" id="subtotal"><b>0$</b></div>
                <div class="col-6">Discount</div>
                <div class="col-6 text-end"id="discount"><b>0%</b></div>
                <hr>
                <div class="col-6"><h3>Total</h3></div>
                <div class="col-6 text-end"><h3 id="amount"><b>0$</b></h3></div>
            </div>
        </div>
        <button class="btn btn-primary w-100 mt-2 mb-2"><i class="bi bi-cart"></i>Buy</button>
    </div>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="d-flex justify-content-center w-100">
            <div class="pagetitle searchbar">
              <input type="text" placeholder="search...">
              <button>🔍</button>
            </div>
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center gap-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" style="cursor: pointer" data-bs-toggle="dropdown">
                            <i class="bi bi-cart-fill toggle-sidebar-btn"></i>
                            <span class="badge bg-danger badge-number" id="totalProduct">0</span> 
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
      <section class="section dashboard">
        <div class="row w-100">
            @foreach ($product as $item)
                <div class="col-md-3 col-sm-6 p-2" style="cursor: pointer" onclick="addPurchaseItem('{{$item->name}}',{{$item->id}},'{{$item->image}}',{{$item->price}})">
                    <div class="w-100 p-2 card">
                        <div class="w-100 bg-secondary p-3 text-center rounded" style="margin: auto">
                            <img src="{{asset('images/'.$item->image)}}" class="w-75">
                        </div>
                        <h4>{{$item->name}}</h4>
                        <p>{{$item->detail}}</p>
                        <p>$ {{$item->price}}</p>
                    </div>
                </div>
            @endforeach
        </div>
      </section>
    </main>
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
  </body>
</html>
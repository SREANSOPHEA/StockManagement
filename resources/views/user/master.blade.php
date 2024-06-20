<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title')</title>
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
      <nav class="header-nav ms-auto">
        @if (session('customerID'))
        <div class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('images/'.session('customerProfile'))}}" alt="Profile" class="rounded-circle"/>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{session('customerName')}}</span> 
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{session('customerName')}}</h6>
              {{-- <span>Web Designer</span> --}}
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/user-logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </div>
        @else
          <a href="/user-login" class="btn btn-primary">Login</a>
        @endif
      </nav>
    </header>
    <main style="margin-top: 60px">
      <div class="pagetitle">
        <h1>@yield('content_Title')</h1>
      </div>
      <section class="section dashboard">
        @yield('content')
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

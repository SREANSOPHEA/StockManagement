<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/user.css')}}">
</head>
<body>
    <div class="header">
        <ul>
            <li class="logo"><a href="/">Logo</a></li>
            <li class="menu"><a href="/home">Home</a></li>
            <li class="menu"><a href="/shop">Shop</a></li>
            <li class="menu"><a href="/about-us">About us</a></li>
        </ul>
    </div>
    @yield('content')
</body>
</html>
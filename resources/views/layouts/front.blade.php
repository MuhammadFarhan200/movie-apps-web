<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies App | @yield('page-title')</title>
    @include('layouts.partials.topScript')
</head>

<body>
    <!-- Page loader -->
    <div id="preloader"></div>

    <!-- header section start -->
    @include('layouts.partials.header')
    <!-- header section end -->

    {{-- Main Content --}}
    @yield('page-content')
    {{-- End Main Content --}}

    <!-- footer section start -->
    @include('layouts.partials.footer')
    <!-- footer section end -->

    @include('layouts.partials.bottomScript')
</body>

</html>

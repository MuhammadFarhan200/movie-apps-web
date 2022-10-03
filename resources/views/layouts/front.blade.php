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
    <footer class="footer">
        <div class="container px-4">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <img src="{{ asset('front/assets/img/logo.png') }}" alt="about" />
                        <p>7th Harley Place, London W1G 8LZ United Kingdom</p>
                        <h6><span>Call us: </span>(+880) 111 222 3456</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4>Legal</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Security</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4>Account</h4>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Watchlist</a></li>
                            <li><a href="#">Collections</a></li>
                            <li><a href="#">User Guide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter system now to get latest news from us.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email.." />
                            <button>SUBSCRIBE NOW</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-6 text-center text-lg-left">
                        <div class="copyright-content">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                        </div>
                    </div> --}}
                    <div class="col text-right">
                        <div class="copyright-content">
                            <a href="#" class="theme-btn">
                                Back to top <i class="icofont icofont-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- footer section end -->

    @include('layouts.partials.bottomScript')
</body>

</html>
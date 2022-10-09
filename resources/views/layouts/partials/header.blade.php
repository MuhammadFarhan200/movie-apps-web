<header class="header">
    <div class="container">
        <div class="header-area d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('guest_home') }}"><img src="{{ asset('front/assets/img/logo.png') }}"
                        alt="logo" /></a>
            </div>
            {{-- <div class="header-right">
                    <form action="#">
                        <select>
                            <option value="Movies">Movies</option>
                            <option value="Movies">Movies</option>
                            <option value="Movies">Movies</option>
                        </select>
                        <input type="text" />
                        <button><i class="icofont icofont-search"></i></button>
                    </form>
                </div> --}}
            <div class="menu-area">
                <div class="responsive-menu"></div>
                <div class="mainmenu">
                    <ul id="primary-menu">
                        <li>
                            <a class="{{ request()->is('/') || request()->is('home') ? 'active' : '' }}"
                                href="{{ route('guest_home') }}">Home</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('movies') || request()->is('movies/*') ? 'active' : '' }}"
                                href="{{ route('movies') }}">Movies</a>
                        </li>
                        {{-- <li>
                            <a class="{{ request()->is('genre') || request()->is('genre/*') ? 'active' : '' }}"
                                href="{{ route('genre') }}">Genre</a>
                        </li> --}}
                        <li>
                            <a class="{{ request()->is('cast') ? 'active' : '' }}" href="{{ url('/cast') }}">Cast</a>
                        </li>
                        {{-- <li>
                            <a class="{{ request()->is('about') ? 'active' : '' }}"
                                href="{{ route('about') }}">About</a>
                        </li> --}}
                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="#">{{ Auth::user()->name }} <i
                                            class="icofont icofont-simple-down"></i></a>
                                    <ul class="me-auto">
                                        @if (Auth::user()->role == 'admin')
                                            <li>
                                                <a href="{{ route('admin') }}">
                                                    <span>Admin</span>
                                                    <i class="bi bi-pie-chart-fill ml-1"></i>
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();logout()">
                                                <span>Logout</span>
                                                <i class="bi bi-arrow-return-right fw-bold ml-1"></i>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a class="" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                        {{-- <li><a href="celebrities.html">CelebritiesList</a></li>
                            <li><a href="top-movies.html">Top Movies</a></li>
                            <li><a href="blog.html">News</a></li>
                            <li><a href="#">Pages <i class="icofont icofont-simple-down"></i></a>
                                <ul>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                    <li><a href="movie-details.html">Movie Details</a></li>
                                </ul>
                            </li> --}}
                        {{-- <li><a class="theme-btn" href="#"><i class="icofont icofont-ticket"></i> Tickets</a>
                            </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- <div class="login-area">
        <div class="login-box">
            <a href="#"><i class="icofont icofont-close"></i></a>
            <h2>LOGIN</h2>
            <form action="#">
                <h6>USERNAME OR EMAIL ADDRESS</h6>
                <input type="text" />
                <h6>PASSWORD</h6>
                <input type="text" />
                <div class="login-remember">
                    <input type="checkbox" />
                    <span>Remember Me</span>
                </div>
                <div class="login-signup">
                    <span>SIGNUP</span>
                </div>
                <a href="#" class="theme-btn">LOG IN</a>
                <span>Or Via Social</span>
                <div class="login-social">
                    <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                    <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                    <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                    <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                    <a href="#"><i class="icofont icofont-camera"></i></a>
                </div>
            </form>

        </div>
    </div> --}}
{{-- <div class="buy-ticket">
        <div class="container">
            <div class="buy-ticket-area">
                <a href="#"><i class="icofont icofont-close"></i></a>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="buy-ticket-box">
                            <h4>Buy Tickets</h4>
                            <h5>Seat</h5>
                            <h6>Screen</h6>
                            <div class="ticket-box-table">
                                <table class="ticket-table-seat">
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                    </tr>
                                </table>
                                <table class="ticket-table-seat">
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td class="active">1</td>
                                        <td class="active">1</td>
                                        <td class="active">1</td>
                                        <td class="active">1</td>
                                        <td class="active">1</td>
                                        <td class="active">1</td>
                                        <td class="active">1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                    </tr>
                                </table>
                                <table class="ticket-table-seat">
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="ticket-box-available">
                                <input type="checkbox" />
                                <span>Available</span>
                                <input type="checkbox" checked />
                                <span>Unavailable</span>
                                <input type="checkbox" />
                                <span>Selected</span>
                            </div>
                            <a href="#" class="theme-btn">previous</a>
                            <a href="#" class="theme-btn">Next</a>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="buy-ticket-box mtr-30">
                            <h4>Your Information</h4>
                            <ul>
                                <li>
                                    <p>Location</p>
                                    <span>HB Cinema Box Corner</span>
                                </li>
                                <li>
                                    <p>TIME</p>
                                    <span>2018.07.09 20:40</span>
                                </li>
                                <li>
                                    <p>Movie name</p>
                                    <span>Home Alone</span>
                                </li>
                                <li>
                                    <p>Ticket number</p>
                                    <span>2 Adults, 2 Children, 2 Seniors</span>
                                </li>
                                <li>
                                    <p>Price</p>
                                    <span>89$</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

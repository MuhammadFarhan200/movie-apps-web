<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg" type="image/x-icon') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png" type="image/png') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo">
                            {{-- <div class="d-flex justify-content-center align-items-center">
                                <h2 class="ms-4">Hanztt</h2>
                            </div> --}}
                        </a>
                    </div>
                    <h1 class="auth-title">Log in</h1>
                    <p class="auth-subtitle mb-5">Login dengan data yang Anda masukkan saat pendaftaran.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" placeholder="Email"
                                class="form-control form-control-xl @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password"
                                class="form-control form-control-xl @error('password') is-invalid @enderror"
                                name="password" value="{{ old('password') }}" required autocomplete="current-password"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat Saya
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum Punya Akun? <a href="{{ route('register') }}"
                                class="font-bold">Daftar Sekarang</a>.</p>
                        {{-- <p>
                            @if (Route::has('password.request'))
                                <a class="font-bold" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password Anda?') }}
                                </a>
                            @endif
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/team.png') }}" alt="" width="400px">
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies App - PKL | @yield('title-page')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">

    {{-- DataTable --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}"> --}}

</head>

<body>
    <div id="app">

        {{-- Sidebar Menu --}}
        @include('admin.partials.sidebar')
        {{-- End Sidebar Menu --}}


        <div id="main">
            {{-- Page Heading --}}
            <header>
                @include('admin.partials.header')
            </header>
            {{-- End Page Heading --}}

            {{-- Page Content --}}
            @yield('page-content')
            {{-- End Page Content --}}

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer, Improve 2022 by Hanztt</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me" target="_blank">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- Form Editor --}}
    {{-- <script src="{{ asset('assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tinymce.js') }}"></script> --}}

    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    {{-- SweetAlert2 --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.all.min.js') }}"></script>

    {{-- DataTable --}}
    {{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script> --}}
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        $(document).on('shown.bs.modal', function(e) {
            $('[autofocus]', e.target).focus();
        });
    </script>

    @include('sweetalert::alert')

</body>

</html>

{{-- RealRashid SweetAlert --}}
@include('sweetalert::alert')

<!-- jquery main JS -->
<script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<!-- Slick nav JS -->
<script src="{{ asset('front/assets/js/jquery.slicknav.min.js') }}"></script>
<!-- owl carousel JS -->
<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
<!-- Popup JS -->
<script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Isotope JS -->
<script src="{{ asset('front/assets/js/isotope.pkgd.min.js') }}"></script>
<!-- main JS -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>

{{-- SweetAlert2 --}}
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.all.min.js') }}"></script>

{{-- Logout Script --}}
<script>
    function logout() {
        const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true
        })

        swalWithBootstrapButtons.fire({
            title: 'Anda Yakin Akan Logout?',
            icon: 'warning',
            showCancelButton: true,
            // allowOutsideClick: false,
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        })
    }
</script>

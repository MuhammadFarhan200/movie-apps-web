<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

{{-- Form Editor --}}
<script src="{{ asset('assets/extensions/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/tinymce.js') }}"></script>

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

{{-- Selectize --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/js/selectize.min.js"></script>
<script>
    $(document).ready(function() {
        $('#input-tags').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
    });
</script>

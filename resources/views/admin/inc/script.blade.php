    <!-- Bootstrap core JavaScript-->
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.js"></script>
    <script src="{{ mix('js/script.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
    @stack('dashboard_script')

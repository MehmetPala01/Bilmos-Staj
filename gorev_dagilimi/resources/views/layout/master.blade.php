<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('layout.head')
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="2-columns">

    @include('layout.header')

    <!-- BEGIN: Main Menu-->
    @include('layout.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('layout.footer')


    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(event, formId) {
            event.preventDefault();

            Swal.fire({
                title: 'Emin misiniz?',
                text: "Silmek istediğinizden emin misiniz?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'Vazgeç'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Başarılı!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Tamam'
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                title: 'Hata!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Tamam'
            });
        </script>
    @endif

</body>
<!-- END: Body-->
</html>


<!DOCTYPE html>
<html lang="en" data-menu-color="brand">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Ubold - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Plugins css -->
        <link href="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="{{ asset('backend/assets/js/head.js') }}"></script>

        <!-- Bootstrap css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        @stack('styles')
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- ========== Menu ========== -->
            @include('admin.layout.sidebar')

            <!-- ========== Left menu End ========== -->





            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- ========== Topbar Start ========== -->
                @include('admin.layout.header')

                <!-- ========== Topbar End ========== -->

                @yield('content')

                <!-- Footer Start -->
                @include('admin.layout.footer')

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->



        <!-- Vendor js -->
        <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{ asset('backend/assets/js/pages/dashboard-1.init.js') }}"></script>
        @stack('scripts')

    </body>
</html>

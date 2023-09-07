
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title> @yield('title') | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend')  }}/assets/images/favicon.ico">


    <link href="{{ asset('backend')  }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />


    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">

    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">


</head>

<body>

<div id="backend">

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <header-component :admin="{{ Auth::guard('admin')->user() }}"></header-component>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <sidebar-component></sidebar-component>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <br>
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->

                <!-- end page title -->

                @yield('content')

                <!-- end row-->
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer-component></footer-component>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


</div>

<script src="{{ asset('js/backend.js') }}"></script>

<script src="{{ asset('js/backend_script.js') }}"></script>

<script src="{{ asset('js/iziToast.js') }}"></script>

@include('vendor.lara-izitoast.toast')


</body>

</html>

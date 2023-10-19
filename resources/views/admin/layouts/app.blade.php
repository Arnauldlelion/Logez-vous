<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <title>@yield('title') | Admin Back-office | Genie Capital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('admin_assets/images/favicon.png') }}" sizes="16x16" type="image/png">

    <!-- Plugins css -->
    <link href="{{ asset('admin_assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />



    <!-- App css -->
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('admin_assets/libs/owl-carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/libs/owl-carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/libs/magnific-popup/magnific-popup.css') }}"/>

    <link href="{{ asset('admin_assets/css/app.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/css/user.css') }}" rel="stylesheet"/>

    <!-- icons -->
    <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>


    @yield('header-style')
</head>

<body data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
   
<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
@include('admin.layouts.header')
<!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
@include('admin.layouts.sidebar')
<!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @include('admin.layouts.alerts')

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> &copy; Logez-vous Admin
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="{{ route('index') }}" target="_blank">Accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<!-- Vendor js -->
<script src="{{ asset('admin_assets/js/vendor.min.js') }}"></script>

<!-- Plugins js-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="{{ asset('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('admin_assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

<script src="{{ asset('admin_assets/libs/html5sortable/html5sortable.js') }}"></script>

<script src="{{ asset('admin_assets/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('admin_assets/libs/readmorejs/dist/readmore.js') }}"></script>

<script src="{{ asset('admin_assets/libs/owl-carousel/dist/owl.carousel.min.js') }}"></script>

<script src="{{ asset('admin_assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('admin_assets/libs/magnific-popup/magnific-popup.js') }}"></script>

<script src="{{ asset('admin_assets/libs/clipboard/dist/clipboard.min.js') }}"></script>




<!-- App js-->
<script src="{{ asset('admin_assets/js/app.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/user.js') }}"></script>

<script>
    
    /*new Readmore('.read-more', {
        lessLink: '<a href="#">read less</a>',
        moreLink: '<a href="#">read more...</a>',
        collapsedHeight: 190
    });*/
</script>

@yield('footer_script')
</body>
</html>

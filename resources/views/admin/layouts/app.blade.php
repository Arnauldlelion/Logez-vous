<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16" type="image/png">
    
    <meta name="tcss" content="{{ asset('css/tiny.css') }}" />

    <title>@yield('title') | Admin Back-office | autocomplete</title>

     <!-- App css -->
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/css/app.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/css/datatables.min.css') }}" rel="stylesheet"/>

    <!-- icons -->
    <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>

    @yield('header-style')
    
    <style>
        .readmore {
            overflow: hidden;
        }
        
        label > em {
            color: #ff5555;
        }
    </style>
</head>
<body>
    <div id="wrapper">

         <!-- Topbar Start -->
        @include('admin.layouts.header')
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @include('admin.layouts.alerts')

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

        </div>
    
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('admin_assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin_assets/libs/readmore.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin_assets/js/app.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
     <script src="{{ asset('admin_assets/libs/tinymce/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('admin_assets/js/admin.js') }}"></script>
    
    @yield('footer_script')
    
</body>
</html>
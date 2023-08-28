<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Login | Admin | ATTM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16" type="image/png">

    <!-- App css -->
    <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/css/app.min.css') }}" rel="stylesheet"/>

    <!-- icons -->
    <link href="{{ asset('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body class="auth-fluid-pages pb-0">

<div class="auth-fluid justify-content-center">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                    <div class="auth-logo">
                        <a href="#" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/att-m--logo.png') }}" alt="" height="64">
                            </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                <h4 class="mt-0">Admin Back-office</h4>
                <p class="text-muted mb-4">
                    Fill in you email and password to access the admin back-office.</p>

                <!-- form -->
                <form action="{{ route('admins.login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="emailaddress">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                               id="emailaddress" required=""
                               value="{{ old('email') }}"
                               name="email"
                               autofocus
                               placeholder="Enter email">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Enter password">
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-danger btn-block" type="submit">Submit</button>
                    </div>
                </form>
                <!-- end form-->


            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

</div>
<!-- end auth-fluid-->

<!-- Vendor js -->
<script src="{{ asset('admin_assets/js/vendor.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin_assets/js/app.min.js') }}"></script>

</body>
</html>


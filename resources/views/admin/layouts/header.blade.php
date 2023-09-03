<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">


            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                   data-toggle="fullscreen"
                   href="#">
                    <i data-feather="maximize" class="noti-icon"></i>
                </a>
            </li>


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    
                    <span class="pro-user-name ml-1">
                        {{-- {{ \Auth('admin')->user()->name }}<i data-feather="chevron-down"></i> --}}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                    <!-- item-->
                    <a href="{{ route('admins.profile') }}" class="dropdown-item notify-item">
                        <i data-feather="user"></i>
                        <span>My Account</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('admins.logout') }}" class="dropdown-item notify-item text-danger">
                        <i data-feather="log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

            
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="#" target="_blank" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/att-m--logo.png') }}" alt="" height="25">
                    </span>
                <span class="logo-lg">
                        <img src="{{ asset('assets/images/att-m--logo@2x.png') }}" alt="" height="56">
                    </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>

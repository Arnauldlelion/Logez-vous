<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">


            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                   data-toggle="fullscreen"
                   href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">{{ $candidatures->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">
            
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="" class="text-dark">
                                    <small>Effacer tout</small>
                                </a>
                            </span>
                            Notification
                        </h5>
                    </div>
            
                    <div class="noti-scroll" data-simplebar>
                        
                            <!-- item-->
                            <a href="{{ route('admin.unApprovedCandidature') }}" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="{{ asset('admin_assets/images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt=""/>
                                </div>
                                @foreach ($candidatures as $candidature)
                                <p class="notify-details">{{ $candidature->first_name }} {{ $candidature->last_name }}</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Appartement: {{ $candidature->apartment->name }} ({{ $candidature->apartment->property->name }})</small>
                                    <small>{{ $candidature->created_at->locale('fr')->diffForHumans() }}</small>
                                </p>
                            @endforeach
                            </a>
                       
                    </div>
            
                    <!-- All-->
                    @if( $candidatures->count()>4 )
                    <a href="{{ route('admin.unApprovedCandidature') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                        Voir tout
                        <i class="fe-arrow-right"></i>
                    </a>
                    @endif
                </div>
            </li>


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ \Auth('admin')->user()->profileURL() }}" alt="user-image"
                         class="rounded-circle  bg-white">
                    <span class="pro-user-name ml-1">
                        {{ \Auth('admin')->user()->name }}<i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bienvenue!</h6>
                    </div>

                    <!-- item-->
                    {{-- <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item"> --}}
                        <i class="fe-user"></i>
                        <span>Mon Compte</span>
                    {{-- </a> --}}

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item text-danger">
                        <i class="fe-log-out"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ route('admin.dashboard') }}" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ asset('admin_assets/images/logo-img.png') }}" alt="" height="22">
                    </span>
                <span class="logo-lg">
                        <img src="{{ asset('admin_assets/images/logo-white.png') }}" alt="" height="36">
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

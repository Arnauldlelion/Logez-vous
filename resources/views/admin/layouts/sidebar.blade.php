<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu h-100">

                
                <li class="{{ Route::is('admins.dashboard') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="{{ Route::is('admins.profile') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.profile') }}">
                        <i data-feather="user"></i>
                        <span> Profile </span>
                    </a>
                </li>

                <li class="menu-title">App</li>
    
    
                {{-- <li class="{{ Route::is('admins.landlords.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.landlords.index') }}">
                        <i data-feather="book-open"></i>
                        <span> Landlords </span>
                    </a>
                </li> --}}
                <li class="{{ Route::is('admins.piece_types.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.piece_types.index') }}">
                        <i data-feather="layers"></i>
                        <span> Piece Types </span>
                    </a>
                </li>
                <li class="{{ Route::is('admins.apartment_types.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.apartment_types.index') }}">
                        <i data-feather="layout"></i>
                        <span> Apartment Types </span>
                    </a>
                </li>

                <li class="menu-title">Post</li>
    
    
                <li class="{{ Route::is('admins.testimonials.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.testimonials.index') }}">
                        <i data-feather="thumbs-up"></i>
                        <span> Testimonials </span>
                    </a>
                </li>
                <li class="{{ Route::is('admins.news.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.news.index') }}">
                        <i data-feather="book-open"></i>
                        <span> News </span>
                    </a>
                </li>
                <li class="{{ Route::is('admins.faqs.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.faqs.index') }}">
                        <i data-feather="help-circle"></i>
                        <span> FAQs </span>
                    </a>
                </li>
<br><br><br>
                <li>
                    <form method="POST" action="{{ route('admins.logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">
                            <i data-feather="log-out"></i>
                        <span> Log Out </span>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

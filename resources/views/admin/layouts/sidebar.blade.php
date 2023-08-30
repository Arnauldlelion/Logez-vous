<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                
                <li class="{{ Route::is('admins.dashboard') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title">App</li>
    
    
                <li class="{{ Route::is('admins.pages.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.pages.index') }}">
                        <i data-feather="book-open"></i>
                        <span> Pages </span>
                    </a>
                </li>
                <li class="{{ Route::is('admins.piece_types.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.piece_types.index') }}">
                        <i data-feather="book-open"></i>
                        <span> Piece Types </span>
                    </a>
                </li>
                <li class="{{ Route::is('admins.apartment_types.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admins.apartment_types.index') }}">
                        <i data-feather="book-open"></i>
                        <span> Apartment Types </span>
                    </a>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

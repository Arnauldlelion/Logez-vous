<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
                <li class="{{ Route::is('admins.dashboard') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li class="menu-title  mt-2">Gestion immobilière</li>

                        <li class="{{ Route::is('admin.piece_types*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.piece_types.index') }}">
                                <i data-feather="layers"></i>
                                <span> Type de pièce </span>
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.apartment_types.*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.apartment_types.index') }}">
                                <i data-feather="layout"></i>
                                <span> Types d’appartements </span>
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.property.*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.property.index') }}">
                                <i data-feather="home"></i>
                                <span> Propriété </span>
                            </a>
                        </li>
                        {{-- <li class="{{ Route::is('admin.apartments.*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.apartments.index') }}">
                                <i data-feather="layout"></i>
                                <span> Appartement </span>
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.pieces.*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.pieces.index') }}">
                                <i data-feather="layers"></i>
                                <span> Pièce  </span>
                            </a>
                        </li> --}}

                        <!-- <li class="menu-title  mt-2">Rapport de Gestion</li>
                        <li class="{{ Request::is('admin/property*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.approuved-landlords.index') }}">
                                <i data-feather="file-text"></i>
                                <span>Rapport Général</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/property*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.approuved-landlords.index') }}">
                                <i data-feather="file"></i>
                                <span>Rapport Hebdomadaire</span>
                            </a>
                        </li> -->

                        <li class="menu-title  mt-2">Locataires</li>
                        <li class="{{ Request::is('admin/property*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.tenant') }}">
                                <i data-feather="users"></i>
                                <span>Mes Locataire</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/property*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.unApprovedCandidature') }}">
                                <i data-feather="users"></i>
                                <span>Locataire</span>
                            </a>
                        </li>
                        <li class="menu-title  mt-2">Propriétaire</li>
                        <li class="{{ Request::is('admin/property*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.approuved-landlords.index') }}">
                                <i data-feather="users"></i>
                                <span>Propriétaire</span>
                            </a>
                        </li>
                       
                
                        @auth('admin')
                        @if (auth('admin')->user()->super_admin)
                        <li class="menu-title mt-2">Gestionnaires</li>
                        <li class="{{ Request::is('admin/administrator*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('admin.administrator.index') }}">
                                <i data-feather="users"></i>
                                <span>Gestionnaires</span>
                            </a>
                        </li>
                        
                    @endif
                @endauth

                @auth('admin')
                @if (auth('admin')->user()->super_admin)
                <li class="menu-title mt-2">Contenu</li>

                <li class="{{ Request::is('admin/testimonies*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <i data-feather="smile"></i>
                        <span>Témoignages</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.news.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.news.index') }}">
                        <i data-feather="book-open"></i>
                        <span> Nouvelles </span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.faqs.*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        <i data-feather="help-circle"></i>
                        <span> FAQs </span>
                    </a>
                </li>
                @endif
                @endauth

                <li class="menu-title  mt-2">COMPTE</li>
                <li class="{{ Request::is('admin/profile*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.profile') }}">
                        <i data-feather="user"></i>
                        <span>Mon Compte</span>
                    </a>
                </li>

                <li class="menu-title mt-2"></li>
                <li class="{{ Request::is('admin/logout*') ? 'menuitem-active' : '' }}">
                    <a href="{{ route('admin.logout') }}" class="text-danger">
                        <i data-feather="log-out"></i>
                        <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

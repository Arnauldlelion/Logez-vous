<!-- main header start -->
<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light {{ request()->is('/') ? 'transparent' : 'white-navbar' }} fixed-top"
        id="{{ request()->is('/') ? 'main-header' : '' }}">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('/storage/images/logos/logez-vous.png') }}" alt="logo"
                    class="logo logo-white"></a>
            <button class="navbar-toggler" type="button " data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                    <div class="search-box">
                        <form class="d-flex" role="search">
                            <div>
                               
                                <input class="form-control me-2 " type="search" placeholder="Reference"
                                    aria-label="Search" action="/properties">
                               <button type="submit"><a class="nav-link" href="{{ '/properties' }}"><i class="bi bi-search"></i></a></button>
                            </div>
                        </form>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <button class="btn fw-bold text-white">Vous etes proprietaire ?</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('help') }}">Aide</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/mon-compte' }}">Mon compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Deconnexion</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <button data-bs-toggle="modal" class="nav-link"
                                data-bs-target="#register-modal">Inscription</button>
                        </li>
                        <li class="nav-item">
                            <button data-bs-toggle="modal" class="nav-link" data-bs-target="#login-modal">Connexion</button>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- main header end -->

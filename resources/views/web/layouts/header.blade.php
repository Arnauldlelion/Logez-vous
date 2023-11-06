<!-- main header start -->
<header class="main-header" id="main-header">
    <nav class="navbar navbar-expand-lg navbar-light {{ request()->is('/') ? 'transparent' : 'white-navbar' }} fixed-top" id="navBar">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('/storage/images/logos/logez-vous.png') }}" alt="logo" class="logo logo-white"></a>
            <button class="navbar-toggler" type="button " data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center ">
                    <div class="search-box">
                        <form class="d-flex" role="search">
                            <div>
                                <input class="form-control me-2 " type="search" placeholder="Reference" aria-label="Search" action="/properties">
                                <button type="submit"><a class="nav-link" href="{{ '/properties' }}"><i class="bi bi-search"></i></a></button>
                            </div>
                        </form>
                    </div>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="{{ route('help') }}">Aide</a>
                    </li>
                    @if (!request()->is('info') && !request()->is('gestion')) <!-- Added condition for 'gestion' route -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gestion') }}">
                            <button class="btn btn-main rounded-pill">Vous etes proprietaire ?</button>
                        </a>
                    </li>
                    @endif
                    @guest('landlord')
                    <li class="nav-item">
                        <button data-bs-toggle="modal" class="nav-link text-light" data-bs-target="#login-modal">Connexion</button>
                    </li>
                    @endguest
                    @if(Request::is('info'))
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('gestion') }}">
                            <button class="btn btn-main rounded-pill">Mettre en gestion</button>
                        </a>
                    </li>
                    @endif

                    @auth('landlord')
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('landlord.dashboard') }}">Mon compte</a>
                    </li>
                    <li class="nav-item text-light">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">Déconnexion</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="banner w-100 d-flex justify-content-center align-items-end">
    <video poster="{{ asset('storage/images/home/img.jpg') }}" autoplay muted loop>
        <source src="{{ asset('storage/images/video/video.mp4') }}" type="video/mp4">
    </video>
    {{-- <div class="content col-lg-7 mx-lg-auto text-center pb-3"> --}}
    <div class="row d-flex align-items-end">
        <div class="col-12 col-md-9 mx-auto">
            <h1 class="text-light">Visitez et louez votre prochain logement depuis chez vous</h1>
            <div class="" style="background: white; border-radius:10px;">
                <ul class="nav nav-tabs d-flex justify-content-center align-items-end mb-4 gap-md-5" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active py-3 fs-6" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">LOCATAIRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-3 fs-6" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">PROPRIETAIRE</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane show fade active" id="tab1">
                        <div class="container mb-4">
                            <form method="GET" enctype="multipart/form-data" action="{{ route('search-appartment')}}" class="px-2">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="keyword" placeholder="Indiquez une adresse, un lieu, une rue..." class="form-control form-control-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6 col-md-3">
                                            <input type="text" name="max_price" placeholder="Budget CFA max" class="form-control form-control-lg">
                                        </div>
                                        <div class="col-6 col-md-3 mb-3">
                                            <input type="text" placeholder="Surface m2 min" name="min_surface_area" class="form-control form-control-lg">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <button class="btn btn-lg btn-main rounded-pill w-100" type="submit">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade " id="tab2">
                        <div class="container">
                            <form method="POST" enctype="multipart/form-data" action="">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" name="title" placeholder="Indiquez une adresse" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <button class="btn btn-outline-main btn-lg rounded-pill w-100">Estimer mon
                                                loyer</button>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <button class="btn btn-main rounded-pill btn-lg w-100">Obtenir un
                                                devis</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- main header end -->
<script>
    var navBar = document.getElementById('main-header');
    window.onscroll = function() {
        if (window.scrollY > 22) {
            navBar.classList.add('scrolled');
        } else {
            navBar.classList.remove('scrolled');
        }
    }
</script>

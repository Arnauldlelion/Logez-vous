<nav class="navbar navbar-expand-lg position-sticky top-0 other-header" id="navBar" style="z-index: 100;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarSupportedContent">
            <div><a class="navbar-brand" href="/"><img src="{{ asset('/storage/images/logos/logez-vous.png') }}"
                        alt="logo" class="img-fluid" style="width: 200px"></a></div>
            <div>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('gestion') }}">Vous êtes propriétaire ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aide</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <button data-bs-toggle="modal" class="nav-link" data-bs-target="#login-modal">Connexion</button>
                        </li>
                    @endguest
                    @if (Request::is('info'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gestion') }}">
                                <button class="btn btn-main rounded-pill">Mettre en gestion</button>
                            </a>
                        </li>
                    @endif

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('landlord.dashboard') }}">Mon compte</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn">Déconnexion</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    var navBar = document.getElementById('navBar');
    window.onscroll = function() {
        if (window.scrollY > 22) {
            navBar.classList.add('scrolled');
        } else {
            navBar.classList.remove('scrolled');
        }
    }
</script>

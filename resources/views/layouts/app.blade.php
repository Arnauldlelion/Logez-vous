<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-5sD/9nqOwBZD3tP5xhNwP4s11LzGyV5YvbJfUjVJ8yLb7sG6JQ0wqfl+qRb2J95" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-QvEwEK+y/W6z1c1zU7t3K1+6zJd2dA8U0+8ohxJlL8B+2yVt8JX9KLHv/vD0QzH+" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    {{-- Navbar code here --}}
    @yield('content')
    {{-- Footer code here --}}
    <footer class="footer pt-5 pb-1 pb-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="footer-slogan">
                        &copy; {{ config('app.name') }} {{ \Carbon\Carbon::now()->format('Y') }}
                    </div>
                    <img src="/storage/images/logo.png" alt="{{ config('app.name') }} Logo"
                        class="img-fluid footer-logo">
                    <a href="#" class="apple">
                        <img src="/storage/images/apple.png" alt="Apple" class="img-fluid">
                    </a>
                    <a href="#" class="playstore">
                        <img src="/storage/images/playstore.png" alt="Play Store" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <h5>Services</h5>
                    <div class="mt-3">
                        <a href="#">Gestion locative</a>
                        <a href="#">Agence immobilière</a>
                        <a href="#">Calcul de rentabilité locative</a>
                        <a href="#">Résiliation mandat gestion</a>
                        <a href="#">Assurance loyers impayés (GLI)</a>
                        <a href="#">Réglementation location courte durée</a>
                        <a href="#">Vendre un appartement</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3 mt-lg-5">
                    <a href="#">Estimation de loyer</a>
                    <a href="#">Estimation de loyer à Paris</a>
                    <a href="#">Modèle préavis location</a>
                    <a href="#">Révision de loyer (IRL Insee)</a>
                    <a href="#">Diagnostics immobiliers</a>
                    <a href="#">Régularisation de charges (Loi Alur)</a>
                    <a href="#">Tarifs</a>
                    <a href="#">Blog Flatlooker</a>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <h5>Société</h5>
                    <div class="mt-3">
                        <a href="#">À propos</a>
                        <a href="#">Recrutement</a>
                        <a href="#">Devenez ambassadeur</a>
                        <a href="#">Agences de relocation</a>
                        <a href="#">Aide</a>
                        <a href="#">C.G.V.</a>
                        <a href="#">Plan du site</a>
                        <a href="#">Espace presse</a>
                    </div>
                </div>
            </div>
            <div class="footer-end mt-4 d-lg-flex align-items-center justify-content-between">
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <p>
                            Hoozon Sarl, professionnel de l'immobilier titulaire de la carte professionnelle n° CPI 7501
                            2016
                            000 014 044 portant les mentions 'Transaction sur Immeubles et fonds de commerce' et
                            'Gestion
                            Immobilière' délivrée par la CCI de Yaoundé Cameroun.
                        </p>
                    </div>
                </div>
                <div class="footer-social">
                    <a href="#">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Register Modal --}}
    @include('components.modals.register')
    {{-- Login Modal --}}
    @include('components.modals.login')

    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>

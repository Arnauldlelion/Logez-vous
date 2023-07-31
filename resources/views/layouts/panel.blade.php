<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Panel</title>
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<body>

    <!-- Navbar Section -->
  
    <nav class="navbar navbar-expand-lg navbar-light bg-white col-md-10 ml-auto"  >
        <a class="navbar-brand" href="#"> <i class="fas fa-bell" style="color: #ff040c"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Mettre en vente un logement</a>
                </li>
                <li class="nav-item">
                    <div class="link-border" style="border: solid; border-color:#ff040c; border-radius:1.5rem; color:#ff040c !important;">
                        <a class="nav-link" href="#" style="color: #ff040c">Ajouter un logement</a>
                      </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar Section -->
    <div class="sidebar" style="padding-left: 0%">
        <div class="logo" >
            <img src="/storage/images/logo.png" alt="Logo" class="img-fluid" style="width: 100px; margin-top: -2rem;">
        </div>
        <ul class="links" style="padding-left: 0%">
            <li class="active"><a href="#"><i class="fas fa-infinity"></i> Accueil</a></li>
            <li><a href="#"><i class="fas fa-euro-sign"></i> Finances</a></li>
            <li><a href="#"><i class="fas fa-bars"></i> Menu</a></li>
        </ul>
        <div class="settings" style="padding-left: 0%">
            <a href="#">
                
                <span><i class="fas fa-cog"></i> Mes préférences</span>
              </a><br>
            <a href="#" >Se deconnecter</a>
        </div>
    </div>

    

    <!-- Main Section -->
    <div class="main">
        @yield('content')
    </div>
</body>
</html>
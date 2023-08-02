<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Panel</title>
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white col-md-12 ml-auto"  >
        <div class="logo" style="padding-top: 2rem">
            <img src="/storage/images/logo.png" alt="Logo" class="img-fluid" style="width: 70px; margin-top: -2rem;">
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">une question?</a>
                </li>
                <li class="nav-item">
                    <div class="link-border" >
                        <a class="nav-link" href="#" >Deconnexion</a>
                      </div>
                </li>
            </ul>
        </div>
    </nav>
    <nav>
      <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar1 " >
            <div class="sidebar1-sticky">
              <ul class="nav flex-column" style="padding-top: 6rem">
                <li class="nav-item">
                  <a class="nav-link active" href="#"><img src="/storage/images/Accueil.png" alt="partenaires" class="img-fluid" style="width: 60px; margin-top: -2rem;">Accueil</a>
                </li><br>
                <li class="nav-item">
                  <a class="nav-link" href="{{'/candidate'}}"><img src="/storage/images/candidatures.png" alt="partenaires" class="img-fluid" style="width: 60px; margin-top: -2rem;">Candidatures</a>
                </li><br>
                <li class="nav-item">
                  <a class="nav-link" href="#"><img src="/storage/images/dossierLocatif.png" alt="partenaires" class="img-fluid" style="width: 60px; margin-top: -2rem;">Dossier Locatif <i class="fas fa-exclamation-circle" style="color: orangered"></i></a>
                </li><br>
                <li class="nav-item">
                  <a class="nav-link" href="{{'/nos-partenaires'}}"><img src="/storage/images/nosPartenaires.png" alt="partenaires" class="img-fluid" style="width: 60px; margin-top: -2rem;">Nos partenaires</a>
                </li><br>
                <li class="nav-item">
                  <a class="nav-link" href="{{'/mon-compte'}}"><img src="/storage/images/monCompte.png" alt="partenaires" class="img-fluid" style="width: 60px; margin-top: -2rem;">Mon compte</a>
                </li><br>
              </ul>
            </div>
          </nav>
          <main role="main" class="col-md-10 ml-auto">
            <div class="jumbotron"> <!-- La classe "jumbotron" est une classe Bootstrap qui ajoute des styles pour créer un grand conteneur avec des bords arrondis et un fond coloré.  -->
              @yield('content')
            </div>
          </main>
        </div>
      </div>
      <button class="help-button">Help</button>
      
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
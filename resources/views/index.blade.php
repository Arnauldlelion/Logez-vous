@extends('layouts.app')

@section('content')
    {{-- Please put your navbar code inside the layouts.app file --}}

    {{-- logement --}}

    @include('layouts.banner')
    <a href="#featured" class="text-decoration-none  fw-lighter">
        <i class="fa fa-chevron-down d-flex justify-content-center mt-3" style="font-size: 70px; color:gray"></i>
    </a>
    <section>
        <div class="container pb-5 featured col-10 mx-auto " id="featured">
            <h1 class="text-center mb-4 pb-2">Nos logements à la une</h1>
            <div class="container">
                <div class="row gy-3 my-3">
                    @foreach ($properties as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            @include('components.card', [
                                'index' => $item,
                                'showBanner' => false,
                                'isSlider' => false,
                                'showBorder' => true,
                            ])
                        </div>
                    @endforeach
                </div>

                <div class="carousel-indicators d-lg-none">
                    <button type="button" data-bs-target="#videos" data-bs-slide-to="0" class="active"
                        aria-current="true"></button>
                    <button type="button" data-bs-target="#videos" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#videos" data-bs-slide-to="2"></button>

                </div>
                <div class="col-lg-11 mx-lg-auto row d-flex justify-content-between mt-5">
                    <div class="col-lg-5 mb-lg-0">
                        <span class="text"><i class="fa fa-chevron-right"></i> Comment faire apparaître mon logement à la
                            une ?</span>
                        <small class="more-text ms-4">Si vous êtes propriétaire, vous pouvez faire apparaître vos logements
                            à la
                            une en souscrivant à l’offre premium sur la recherche de locataire.</small>
                    </div>
                    <div class="col-lg-5">
                        <a href="#" class="text-main">
                            <span><i class="fa fa-chevron-right"></i> Voir d'autres logements parmi les 7455 annonces déjà
                                publiées
                                par Logez-vous.</span>
                        </a>
                    </div>
                </div>
            </div>
    </section>


    <section>
        <div class="container-fluid px-sm-4 px-lg-5 py-5 mb-5">
            <div class="container">
                <div class="row mb-1">
                    <div class="col-12 text-center">
                        <h3>Comment ça marche ?</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-11 mx-auto">
                        <ul class="nav nav-tabs justify-content-center mb-4 mt-2 gap-3 gap-sm-5" role="tablist">
                            <li class="nav-item">
                                <a href="#tenant" class="nav-link active" role="tab" data-bs-toggle="tab">LOCATAIRE</a>
                            </li>
                            <li class="nav-item">
                                <a href="#landlord" class="nav-link" role="tab" data-bs-toggle="tab">PROPRIÉTAIRE</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane show active  " id="tenant">
                                <div class="row ">
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center ">
                                            <span class=" p-2" id="rounded-circle">1</span><br><br>

                                        <h5>Fiche locative</h5>
                                        </div>
                                       
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Complétez une fiche descriptive et déposez une candidature <span
                                                        class="text-danger">en moins de 3 minutes.</span> </small>

                                            </div>
                                            <div class="d-block justify-content-center align-items-center">
                                                <img src="{{ asset('storage/images/logos/board.png') }}" class="img-fluid "
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">2</span><br><br>

                                      

                                            <h4>Dossier sécurisé</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Vos documents sont chiffrés puis stockés dans des serveurs sécurisés
                                                    pour une <span class="text-danger">sécurité optimale</span> . La gestion
                                                    des données et des documents est conforme à la RGPD.</small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center mt-lg-auto">
                                                <img src="{{ asset('storage/images/logos/whistle.png') }}"
                                                    class="img-fluid " alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">3</span><br><br>

                                      

                                            <h4>Signature électronique</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Signez votre bail <span class="text-danger">100% en ligne </span>
                                                    avec une signature électronique via notre <span class="text-danger">
                                                        partenaire sécurisé</span> Docusign ®.</small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center mt-lg-auto">
                                                <img src="{{ asset('storage/images/logos/pen.png') }}" class="img-fluid "
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">4</span><br><br>

                                       

                                            <h4>État des lieux physique</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Découvrez physiquement votre logement lors de l<span
                                                        class="text-danger">’état des lieux d’entrée</span> . Si celui-ci ne
                                                    correspond pas à la visite virtuelle, vous pouvez <span
                                                        class="text-dander">vous rétracter sans frais</span> lors de ce
                                                    rendez-vous.</small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center mt-lg-auto">
                                                <img src="{{ asset('storage/images/logos/hand.png') }}" class="img-fluid "
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane show mt-4" id="landlord">
                                <div class="row ">
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">1</span><br><br>

                                       

                                            <h4>Mise en valeur de votre bien</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Nous réalisons un <span class="text-danger">reportage photo et vidéo
                                                        complet</span> et diffusons votre annonce sur <span
                                                        class="text-danger">plus de 15 plateformes</span> .</small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center mt-lg-auto">
                                                <img src="{{ asset('storage/images/logos/globe.png') }}"
                                                    class="img-fluid " alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">3</span><br><br>

                                        

                                            <h4>Sélection du locataire</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Nous <span class="text-danger">vérifions minutieusement</span> les
                                                    candidatures, rédigeons le bail et assurons l<span
                                                        class="text-danger">’état des lieux d’entrée</span> .</small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center mt-lg-auto">
                                                <img src="{{ asset('storage/images/logos/whistle.png') }}"
                                                    class="img-fluid " alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">3</span><br><br>

                                      

                                            <h4>Gestion réactive et moderne</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Votre <span class="text-danger">espace en ligne</span> vous permet
                                                    de suivre toutes les opérations et de <span
                                                        class="text-danger">contacter facilement</span> votre
                                                    conseiller.</small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center mt-lg-auto">
                                                <img src="{{ asset('storage/images/logos/pen.png') }}" class="img-fluid "
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3 pt-3 text-lg-center text-muted">
                                        <div class="d-flex d-md-block gap-2 align-items-center">
                                            <span class=" p-2" id="rounded-circle">4</span><br><br>

                                            <h4>Loyer en moins de 7 jours</h4>

                                        </div>
                                        <div class="d-flex d-md-block gap-5">
                                            <div>
                                                <small>Grâce à notre technologie de paiement, vous recevez vos fonds <span
                                                        class="text-danger">moins de 7 jours après le paiement du
                                                        locataire.</span> </small>
                                            </div>
                                            <div class="d-block justify-content-center align-items-center ">
                                                <img src="{{ asset('storage/images/logos/hand.png') }}" class="img-fluid "
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 mx-auto mt-5">
                                        <button class="btn btn-danger rounded-pill p-3 w-100 text-light">En savoir
                                            plus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Video Modal --}}
    @include('components.modals.video')



    <section>
        <div class="container-fluid tab2">
            <div class="container mt-5 pt-5">
                <div class="row  mt-5">
                    <div class="col-sm-12 text-center mt-5">
                        <h3>Une solution immobilière adaptée à tous</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs justify-content-center mb-4 mt-2">
                            <li class="nav-item">
                                <a href="#student" class="nav-link active" role="tab"
                                    data-bs-toggle="tab">Etudiant</a>
                            </li>
                            <li class="nav-item">
                                <a href="#youth" class="nav-link " role="tab" data-bs-toggle="tab">Jeune actifs</a>
                            </li>
                            <li class="nav-item">
                                <a href="#expart" class="nav-link " role="tab" data-bs-toggle="tab">Expatrie</a>
                            </li>
                            <li class="nav-item">
                                <a href="#coloc" class="nav-link " role="tab" data-bs-toggle="tab">Colacations</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="student">
                                <div class="row  align-items-center g-5 py-3 me-2">
                                    <div class="col-6 col-sm-12 col-lg-4">
                                        <img src="{{ asset('storage/images/home/home1.png') }}"
                                            class="d-block mx-lg-auto img-fluid" alt="" width="300"
                                            height="300" loading="lazy">
                                    </div>
                                    <div class="col-lg-8">
                                        <h5 class="text-danger mb-4">Vous faites des études ou un stage dans une nouvelle
                                            ville ?</h4>
                                        <p>Logez-vous est la solution idéale pour vous permettre de <span
                                                class="text-danger">trouver votre futur logement à distance
                                            </span><br>:plus besoin de déplacements et de visites inutiles, finies les
                                            galères !</p>
                                        <h4 class="text-danger mb-3">Ces logements pourraient vous intéresser</h4>
                                        <div class="wrapper ">
                                            <i class="fa fa-chevron-left" id="left"></i>
                                            <div class="carousel">
                                                @foreach ($properties as $item)
                                                    @include('components.card', [
                                                        'index' => $item,
                                                        'showBanner' => false,
                                                        'isSlider' => false,
                                                        'showBorder' => false,
                                                    ])
                                                @endforeach
                                            </div>
                                            <i class="fa fa-chevron-right" id="right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="youth">
                                <div class="row  align-items-center g-5 py-3 me-2">
                                    <div class="col-6 col-sm-12 col-lg-4">
                                        <img src="{{ asset('storage/images/home/home2.png') }}"
                                            class="d-block mx-lg-auto img-fluid" alt="" width="300"
                                            height="300" loading="lazy">
                                    </div>
                                    <div class="col-lg-8">
                                        <h4 class="text-danger mb-4">Vous commencez un travail dans une nouvelle ville ou
                                            avez une mutation professionnelle ?</h4>
                                        <p class="">Flatlooker vous fait gagner du temps et vous permet de <span
                                                class="text-danger">trouver votre futur logement sans stress et sans
                                                déplacement.</span></p>
                                        <h4 class="text-danger mt-4">Ces logements pourraient vous intéresser</h4>
                                        <div class="wrapper">
                                            <i class="fa fa-chevron-left" id="left"></i>
                                            <div class="carousel">
                                                @foreach ($few_props as $item)
                                                    @include('components.card', [
                                                        'index' => $item,
                                                        'showBanner' => false,
                                                        'isSlider' => false,
                                                        'showBorder' => false,
                                                    ])
                                                @endforeach
                                            </div>
                                            <i class="fa fa-chevron-right" id="right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="expart">
                                <div class="row  align-items-center g-5 py-3 me-2">
                                    <div class="col-6 col-sm-12 col-lg-4">
                                        <img src="{{ asset('storage/images/home/home3.png') }}"
                                            class="d-block mx-lg-auto img-fluid" alt="" width="300"
                                            height="300" loading="lazy">
                                    </div>
                                    <div class="col-lg-8">
                                        <h4 class="text-danger mb-4">Vous rentrez d’expatriation et n’avez pas encore
                                            de logement pour votre retour ?</h4>
                                        <p class="">Flatlooker vous permet de<span class="text-danger">louer
                                                votre futur logement à des milliers de kilomètres.</span>Rentrez en
                                            France l’esprit tranquille ! </p>
                                        <h4 class="text-danger mt-4">Ces logements pourraient vous intéresser</h4>
                                        <div class="wrapper">
                                            <i class="fa fa-chevron-left" id="left"></i>
                                            <div class="carousel">
                                                @foreach ($few_props as $item)
                                                    @include('components.card', [
                                                        'index' => $item,
                                                        'showBanner' => false,
                                                        'isSlider' => false,
                                                        'showBorder' => false,
                                                    ])
                                                @endforeach
                                            </div>
                                            <i class="fa fa-chevron-right" id="right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " role="tabpanel" id="coloc">
                                <div class="row  align-items-center g-5 py-3 me-2">
                                    <div class="col-6 col-sm-12 col-lg-4">
                                        <img src="{{ asset('storage/images/home/home4.png') }}"
                                            class="d-block mx-lg-auto img-fluid" alt="" width="300"
                                            height="300" loading="lazy">
                                    </div>
                                    <div class="col-lg-8">
                                        <h4 class="text-danger">Vous souhaitez habiter à plusieurs dans un même logement ?
                                        </h4>
                                        <h4 class="text-danger">Vous n’êtes pas tous disponibles pour visiter des biens en
                                            même temps ?</h4>
                                        <p>Bénéficiez de reportages vidéos et des visites virtuelles détaillées de
                                            Flatlooker pour <span class="text-danger">partager la visite entre
                                                colocataires.</span></p>
                                        <p>Constituez un dossier à plusieurs et <span class="text-danger">simplifiez votre
                                                recherche de location.</span></p>
                                        <h4 class="text-danger mb-3 mt-5">Ces logements pourraient vous intéresser</h4>
                                        <div class="wrapper">
                                            <i class="fa fa-chevron-left" id="left"></i>
                                            <div class="carousel">
                                                @foreach ($few_props as $item)
                                                    @include('components.card', [
                                                        'index' => $item,
                                                        'showBanner' => false,
                                                        'isSlider' => false,
                                                        'showBorder' => false,
                                                    ])
                                                @endforeach
                                            </div>
                                            <i class="fa fa-chevron-right" id="right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Benefits --}}
    <section class="benefits py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                    <h1>Plus de 30 villes camerounaises en bénéficient de la gestion locative Hoozon Sarl!</h1>
                </div>
            </div>
            <p>Retrouvez notre service de gestion locative dans les grandes villes camerounaises</p>
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div id="map"></div> --}}
                    <img src="/storage/images/cameroon-map.jpg" class="img-fluid" alt="Cameroun Map">
                </div>
                <div class="col-lg-6 cities">
                    <div class="row">
                        <div class="col-6">
                            <a href="#">Gestion locative Yaoundé</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Douala</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Garoua</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Bamenda</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Bafoussam</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Ngaoundéré</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Bertoua</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Ebolowa</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Maroua</a>
                        </div>
                        <div class="col-6">
                            <a href="#">Gestion locative Buéa</a>
                        </div>
                        <div class="col-md-6 offset-md-2 city-btn">
                            <a href="#" class="btn btn-main">Toutes nos villes en gestion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Testimonials --}}
    <section class="testimonials py-5">
        <div class="container-fluid">
            <h1>La presse parle de nous</h1>

            <div class="d-lg-flex align-items-center">
                <button data-bs-target="#testimonials" class="control-left d-none d-lg-block"
                    data-bs-slide="prev">&laquo;</button>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div id="testimonials" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ([1, 2, 3] as $i)
                                    {{-- Carousel item --}}
                                    <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($news as $item)
                                                {{-- Testimonial item --}}
                                                <div class="col-lg-4 mb-3">
                                                    <div
                                                        class="card shadow h-100 {{ count($news) > 1 ? 'd-none d-lg-block' : '' }}">
                                                        <div class="card-body bg-white px-4 pt-5 pb-3">
                                                            <div class="text-center mb-4">
                                                                <img src="{{ asset('storage/' . $item->logo )}}"
                                                                    class="img-fluid" alt="Le Monde">
                                                            </div>
                                                            <div class="company">{{$item->name}}</div>
                                                            <div class="title">
                                                                &laquo; {{$item->title}} &raquo;
                                                            </div>
                                                            <p>{{$item->description}}
                                                            </p>
                                                            <div class="date">Posted on {{$item->created_at->DiffForHumans()}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="carousel-indicators d-lg-none">
                                <button type="button" data-bs-target="#testimonials" data-bs-slide-to="0"
                                    class="active" aria-current="true"></button>
                                <button type="button" data-bs-target="#testimonials" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#testimonials" data-bs-slide-to="2"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-bs-target="#testimonials" class="control-right d-none d-lg-block"
                    data-bs-slide="next">&raquo;</button>
            </div>
        </div>
    </section>

    {{-- Video Testimonials --}}
    <section class="videos py-5">
        <div class="container">
            <h1>Nos clients témoignent</h1>


            <div id="videos" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ([1, 2, 3] as $i)
                        {{-- Carousel item --}}
                        <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($testimonials as $item)
                                    {{-- Video Item --}}
                                    <div class="col-lg-4 mb-3">
                                        <div class="card shadow h-100 {{ count($testimonials) > 1 ? 'd-none d-lg-block' : '' }}">
                                            <div class="video-img">
                                                <img src="{{ asset('storage/' . $item->photo )}}" alt="Video" class="card-img-top">
                                                <button class="play" data-bs-toggle="modal"
                                                    data-bs-target="#video-modal">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </div>
                                            <div class="card-body bg-white">
                                                <div class="text-center">
                                                    <img src="/storage/images/google.png" alt="Google Rating"
                                                        class="img-fluid">
                                                </div>
                                                <i class="fas fa-quote-left"></i>
                                                <p>{{$item->description}}
                                                </p>
                                                <div class="quote-right">
                                                    <i class="fas fa-quote-right"></i>
                                                </div>
                                                <div class="name">Lucas A. Propriétaire de 2 studios à Douala
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </section>
@endsection


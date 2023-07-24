@extends('layouts.app')

@section('content')
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
                                            @foreach ([1, 2, 3] as $item)
                                                {{-- Testimonial item --}}
                                                <div class="col-lg-4 mb-3">
                                                    <div
                                                        class="card shadow h-100 {{ $item > 1 ? 'd-none d-lg-block' : '' }}">
                                                        <div class="card-body bg-white px-4 pt-5 pb-3">
                                                            <div class="text-center mb-4">
                                                                <img src="/storage/images/testimonial-{{ $item }}.png"
                                                                    class="img-fluid" alt="Le Monde">
                                                            </div>
                                                            <div class="company">le monde</div>
                                                            <div class="title">
                                                                &laquo; A Yaoundé, c'est dans le 9ème qu'il est le plus
                                                                difficile de
                                                                louer
                                                                un
                                                                logement &raquo;
                                                            </div>
                                                            <p>Hoozon Sarl reçoit, pour ce quartier, en moyenne 5 cas par
                                                                jour et
                                                                par
                                                                logement
                                                                et 3,8 appels.
                                                            </p>
                                                            <div class="date">Posted on January 27, 2020</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="carousel-indicators d-lg-none">
                                <button type="button" data-bs-target="#testimonials" data-bs-slide-to="0" class="active"
                                    aria-current="true"></button>
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
                                @foreach ([1, 2, 3] as $item)
                                    {{-- Video Item --}}
                                    <div class="col-lg-4 mb-3">
                                        <div class="card shadow h-100 {{ $item > 1 ? 'd-none d-lg-block' : '' }}">
                                            <div class="video-img">
                                                <img src="/storage/images/video.jpg" alt="Video" class="card-img-top">
                                                <button class="play" data-bs-toggle="modal" data-bs-target="#video-modal">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            </div>
                                            <div class="card-body bg-white">
                                                <div class="text-center">
                                                    <img src="/storage/images/google.png" alt="Google Rating"
                                                        class="img-fluid">
                                                </div>
                                                <i class="fas fa-quote-left"></i>
                                                <p>Hoozon Sarl s'occupe de tout en 24h, nous avions déjà eu une
                                                    dizaine de candidatures et
                                                    le
                                                    studio a été loué en moins d'une semaine
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
                <div class="carousel-indicators d-lg-none">
                    <button type="button" data-bs-target="#videos" data-bs-slide-to="0" class="active"
                        aria-current="true"></button>
                    <button type="button" data-bs-target="#videos" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#videos" data-bs-slide-to="2"></button>
                </div>
            </div>
        </div>
    </section>

    {{-- Video Modal --}}
    @include('components.modals.video')
@endsection

@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div id="house-images" class="house-images" onclick="alert('Hello, world!')">
            <div class="row">
                <div class="col-lg-6 mb-3 d-none d-lg-block">
                    <img src="/storage/images/room-2.jpg" alt="{{ config('app.name') }}" class="img-fluid h-100">
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <img src="/storage/images/room-2.jpg" alt="{{ config('app.name') }}" class="img-fluid h-100">
                        </div>
                        <div class="col-12 mb-3">
                            <img src="/storage/images/room-2.jpg" alt="{{ config('app.name') }}" class="img-fluid h-100">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="last">
                                <img src="/storage/images/room-2.jpg" alt="{{ config('app.name') }}"
                                    class="img-fluid h-100">
                                <div class="plus-photos py-2 px-3">+13 photos</div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 d-none d-lg-block">
                            <img src="/storage/images/room-2.jpg" alt="{{ config('app.name') }}" class="img-fluid h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="house-section">
            <div class="row">
                <div class="col-lg-9">
                    <h1>Location d'un T3 non meublé au Rue Simone Veil, 92220, Bagneux</h1>
                    <div class="small">FLTK38060</div>
                    <div class="small-main">Les atouts du bien</div>
                    <div class="row g-0">
                        <div class="col-3">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="question">
                                    <span>Tout inclus</span>
                                    <span>
                                        <i class="fas fa-circle-question"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="fas fa-wifi"></i>
                                </div>
                                <div class="text">internet</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="fas fa-hands-bubbles"></i>
                                </div>
                                <div class="text">Machine à laver</div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="fas fa-van-shuttle"></i>
                                </div>
                                <div class="text">Parking</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="p-text">
                        <h4>Description de l'appartement</h4>
                        <p>
                            Situé à Guyancourt, ce T5 meublé en colocation de 94m2 se trouve Rue Youri Gagarine. Non loin de
                            l'arrêt de bus Mendès France, le logement est proche de toutes les commodités et dispose d'un
                            parking. L'électricité, le chauffage et internet sont inclus dans les charges.
                        </p>
                        <p>
                            Cet appartement lumineux est composé d'un salon, d'une cuisine ouverte, de 4 chambres doubles,
                            de 2 salles de bain avec douches et de WC séparés.
                            La cuisine est équipée d'un lave-linge, d'un lave-vaisselle, d'un micro-ondes, d'un four, de
                            plaques de cuisson, d'un grand réfrigérateur et d'un congélateur. Le salon dispose d'un canapé,
                            d'une table basse, d'une table à manger et de 6 chaises. Les chambres sont entièrement meublées
                            avec lit double et armoire.
                        </p>
                        <hr>
                    </div>
                    <div class="expert mt-4 d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            <img src="/storage/images/black-man.jpg" alt="{{ config('app.name') }}" class="img-fluid">
                            <div class="ms-2 content">
                                <h5>Présenté par votre expert.e en location Flatlooker</h5>
                                <div>Lucas</div>
                            </div>
                        </div>
                        <div class="contact">
                            <span>
                                <i class="fas fa-phone"></i>
                            </span>
                            <span class="ms-2">+237 678-098-098</span>
                        </div>
                    </div>
                    <hr>
                    <div class="others">
                        <h4>Autres hébergements proches de Guyancourt - Rue Youri Gagarine</h4>
                        <div class="row flex-nowrap overflow-auto">
                            @foreach ([1, 2, 3, 4, 5] as $item)
                                <div class="col-md-4 mb-3">
                                    @include('components.card', [
                                        'index' => $item,
                                        'showBanner' => false,
                                        'isSlider' => false,
                                        'showBorder' => true,
                                    ])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="card shadow house-sidebar">
                        <div class="card-body bg-white">
                            <button class="btn btn-main w-100 btn-lg">
                                Déposer ma candidature
                            </button>
                            <hr>
                            <div class="mt-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-main icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="ms-2 text-sec">T4 ● Non meublé</div>
                                </div>
                                <div class="d-flex align-items-center text-main mb-3">
                                    <div class="icon">
                                        <i class="fas fa-map-marker"></i>
                                    </div>
                                    <div class="ms-2">6 Rue Arthur Neibecker, 93440, Dugny</div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-main icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div class="ms-2">
                                        <div class="text-main">1285,0 XAF/mois</div>
                                        <div class="text-sec">Dont 200 € de charges</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-main mb-3">
                                    <div class="icon">
                                        <i class="fas fa-landmark"></i>
                                    </div>
                                    <div class="ms-2">66 m<sup>2</sup></div>
                                </div>
                                <div class="d-flex align-items-center text-main mb-3">
                                    <div class="icon">
                                        <i class="far fa-calendar"></i>
                                    </div>
                                    <div class="ms-2">Disponibilité : immédiate</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

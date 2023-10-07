@extends('web.layouts.app')



@section('content')
    <section id="gallery-image">
        <div class="container my-5" style="padding-top: 6rem;">
            <div class="image-grid" id="animated-thumbnails">
                @if ($apartment->coverImage)
                    <a href="{{ asset('storage/' . $apartment->coverImage->url) }}" class="image-grid-col-2 image-grid-row-2">
                        <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="Logez-vous">
                    </a>
                @endif
                @foreach ($images as $index => $image)
                    @if ($index < 3)
                        <a href="{{ $image->getImageUrl() }}" class="img-link  d-none d-md-block">
                            <img src="{{ $image->getImageUrl() }}" alt="Logez-vous" class="img">
                        </a>
                    @else
                        @if ($index == 3)
                            <a href="{{ $image->getImageUrl() }}" class="remaining-images position-relative d-none d-md-block">
                                <img src="{{ $image->getImageUrl() }}" alt="Logez-vous" class="img">
                                <span class="position-absolute top-50 start-50 translate-middle badge text-bg-secondary">+{{ $remainingImages }} photos</span>
                            </a>
                            @else
                            <a href="{{ $image->getImageUrl() }}" class="remaining-images d-none">
                                <span > {{ $remainingImages }} </span>
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
</section>

<section class="house-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1>Location d'un {{ $apartment->name }} {{ $apartment->furnished }}
                    {{ $apartment->property->location }}</h1>
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
                    <hr>
                    <div class="p-text">
                        <h4>Description de l'appartement</h4>
                        <p>{{ $apartment->description }} </p>
                        <hr>
                    </div>
                    <div class="expert mt-4 d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            <img src="/storage/images/black-man.jpg" alt="{{ config('app.name') }}" class="img-fluid">
                            <div class="ms-2 content">
                                <h5>Présenté par votre expert(e) en location.</h5>
                                <div>Logez-vous</div>
                            </div>
                        </div>
                        <div class="contact">
                            <span>
                                <i class="fas fa-phone"></i>
                            </span>
                            <span class="ms-2">+237 (numero)</span>
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
                    <p>{{ $apartment->description }} </p>
                    <hr>
                </div>
                <div class="expert mt-4 d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                        <img src="/storage/images/black-man.jpg" alt="{{ config('app.name') }}" class="img-fluid">
                        <div class="ms-2 content">
                            <h5>Présenté par votre expert.e en location Logez-vous</h5>
                            <div>Arnauld</div>
                        </div>
                    </div>
                    <div class="contact">
                        <span>
                            <i class="fas fa-phone"></i>
                        </span>
                        <span class="ms-2">+237 657170133</span>
                    </div>
                </div>
                <hr>
                <div class="others">
                    <h4>Autres hébergements proches {{ $apartment->property->location }}</h4>
                    <div class="row flex-nowrap overflow-auto">
                        @foreach ($otherApartments as $apartment)
                            <div class="col-md-4 mb-3">
                                @include('components.card', [
                                    'index' => $apartment,
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

                        <button data-bs-toggle="modal" class="btn btn-main w-100 btn-lg"
                            data-bs-target="#register-modal">
                            Déposer ma candidature
                        </button>

                        <hr>
                        <div class="mt-3">
                            <div class="d-flex align-items-center mb-3">
                                <div class="text-main icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="ms-2 text-sec">{{ $apartment->name }} ● {{ $apartment->furnished }}</div>
                            </div>
                            <div class="d-flex align-items-center text-main mb-3">
                                <div class="icon">
                                    <i class="fas fa-map-marker"></i>
                                </div>
                                <div class="ms-2">{{ $apartment->property->location }}</div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="text-main icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="ms-2">
                                    <div class="text-main">{{ $apartment->monthly_price }} XAF/mois</div>
                                    <div class="text-sec">Dont {{ $apartment->monthly_price }} xaf de charges</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-main mb-3">
                                <div class="icon">
                                    <i class="fas fa-landmark"></i>
                                </div>
                                <div class="ms-2">{{ 66 }} m<sup>2</sup></div>
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
    </div>
</section>
</div>
<script>
   lightGallery(document.getElementById('animated-thumbnails'), {
    thumbnail: true,
});

    document.getElementById('candidaterButton').addEventListener('click', function() {
        document.getElementById('loginModal').style.display = 'block';
    });

 
</script>
@endsection

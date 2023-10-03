@extends('web.layouts.app')



@section('content')
    <div class="container my-5" style="padding-top: 6rem; padding-bottom: 2rem;">
        <div class="image-grid" id="gallery">
            <a href="{{ asset('storage/' . $apartment->coverImage->url) }}" class="image-grid-col-2 image-grid-row-2">
                <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="{{ config('app.name') }}">
            </a>
            @php
                $remainingImages = count($images) - 4;
            @endphp
            @foreach ($images as $index => $image)
                @if ($index < 4)
                    <a href="{{ $image->getImageUrl() }}">
                        <img src="{{ $image->getImageUrl() }}" alt="{{ config('app.name') }}">
                    </a>
                @else
                    @if ($index == 4)
                        <div class="remaining-images">{{ $remainingImages }} more image(s)</div>
                    @endif
                @break
            @endif
            @endforeach
        </div>
{{-- <div id="house-images" class="house-images">
    <div class="row">
        <div class="col-lg-6 mb-3 position-relative" id="main-gallery-item">
            <a href="{{ asset('storage/' . $apartment->coverImage->url) }}" data-sub-html="hellwefwergjpwer">
                <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="{{ config('app.name') }}"
                    class="img-fluid h-100">
            </a>
            <div
                class="position-absolute bottom-50 end-50 border rounded bg-success  text-white bg-opacity-50 p-2 d-block d-md-none ">
                +{{ count($images) - 1 }} photos
            </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
            <div class="row">
                @foreach ($images as $key => $image)
                    @if ($key < 4)
                        <div class="col-12 col-md-6 mb-3" id="gallery-item-{{ $key }}">
                            <a href="{{ $image->getImageUrl() }}" data-sub-html=".caption{{ $key }}">
                                <img src="{{ $image->getImageUrl() }}" alt="{{ config('app.name') }}"
                                    class="img-fluid h-100">
                            </a>
                        </div>
                    @endif
                    @if ($key === 4 && count($images) > 4)
                        <div class="col-12 col-md-6 mb-3">
                            <div class="position-relative" id="gallery-item-{{ $key }}">
                                <a href="{{ $image->getImageUrl() }}" data-sub-html=".caption{{ $key }}">
                                    <img src="{{ $image->getImageUrl() }}" alt="{{ config('app.name') }}"
                                        class="img-fluid h-100">
                                </a>
                                <div
                                    class="position-absolute top-50 start-50 translate-middle border rounded bg-success text-white bg-opacity-50 p-2">
                                    +{{ count($images) - 3 }} photos
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div> --}}


<section class="house-section">
    <div class="row">
        <div class="col-lg-9">
            <h1>Location d'un T3 {{ $apartment->furnished }} au Rue Simone Veil, 92220, Bagneux</h1>
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

                    <button data-bs-toggle="modal" class="btn btn-main w-100 btn-lg" data-bs-target="#register-modal">
                        Déposer ma candidature
                    </button>

                    <hr>
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-main icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="ms-2 text-sec">T4 ● {{ $apartment->furnished }}</div>
                        </div>
                        <div class="d-flex align-items-center text-main mb-3">
                            <div class="icon">
                                <i class="fas fa-map-marker"></i>
                            </div>
                            <div class="ms-2">Douala ,Bonamoussadi,</div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-main icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="ms-2">
                                <div class="text-main">200 000 XAF/mois</div>
                                <div class="text-sec">Dont 200 000 xaf de charges</div>
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
</section>
</div>
<script>
    let gallery = document.getElementById('gallery')
    lightGallery(gallery,{
        controls:true
    })
    document.getElementById('candidaterButton').addEventListener('click', function() {
        document.getElementById('loginModal').style.display = 'block';
    });
</script>
@endsection

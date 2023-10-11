@extends('web.layouts.app')



@section('content')
    <section id="gallery-image">
        <div class="container-fluid col-lg-9 mx-auto my-5" style="padding-top: 6rem;">
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
                            <a href="{{ $image->getImageUrl() }}"
                                class="remaining-images position-relative d-none d-md-block">
                                <img src="{{ $image->getImageUrl() }}" alt="Logez-vous" class="img">
                                <span
                                    class="position-absolute top-50 start-50 translate-middle badge text-bg-secondary">+{{ $remainingImages }}
                                    photos</span>
                            </a>
                        @else
                            <a href="{{ $image->getImageUrl() }}" class="remaining-images d-none">
                                <span> {{ $remainingImages }} </span>
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="house-section">
        <div class="container-fluid col-lg-9 mx-md-auto">
            <div class="row flex-md-row-reverse p-2 ms-md-5 mx-md-1">
                <div class="col-12 col-md-3 mb-4">
                    <div class="shadow-lg shadow-md-down-none d-flex justify-content-center py-3 position-sticky top-0">
                       <div>
                        <button class="btn btn-main p-2" data-bs-toggle="modal" data-bs-target="#register-modal" {{ $apartment->published ? 'disabled' : '' }}>
                            Deposer ma candidature
                        </button>
                        <hr>
                        <p><i class="fas fa-home me-2"></i> {{ $apartment->name }} ● {{ $apartment->furnished }}</p>
                        <p class="text-main"> <i class="fas fa-map-marker me-2"></i> {{ $apartment->property->location }}
                        </p>
                        <p> <i class="fas fa-dollar-sign me-2"></i> {{ $apartment->monthly_price }} XAF/mois</p>
                        <p class="text-mute ms-4">Dont {{ $apartment->monthly_price }} xaf de charges</p>
                        <p><i class="fas fa-landmark  me-2"></i>{{ $apartment->size }} m<sup>2</sup></p>
                        <p>
                            <i class="far fa-calendar me-2"></i>
                            Disponibilité: <span class="{{ $apartment->published ? 'text-danger' : '' }}">{{ $apartment->published ? 'déjà loué' : 'immédiate' }}</span>
                        </p>
                       </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <h1 class="text-main">Location d'un {{ $apartment->name }} {{ $apartment->furnished }}
                        {{ $apartment->property->location }}</h1>
                    <p>Les atouts du bien</p>
                    <div class="row d-flex align-items-center mt-4 mb-4">
                        @foreach ($amenities as $amenity)
                            <div class="col-3 text-center" style="border-right:1px solid #646464">
                                <img src="{{ asset('storage/' . $amenity->image) }}" class="img-fluid"
                                    style="height: 30px; width:30px;"><br><br>
                                <small> {{ $amenity->name }}</small>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <h3>Description de l'appartement</h3>
                    <div>{{ $apartment->description }} </div>
                    <hr>
                    <div class="d-block d-md-flex justify-content-between">
                        <div>Présenté par votre expert.e en location Logez-vous</div>
                        <div></div>
                        <div class="text-main expert"> <i class="fas fa-phone me-3" style="color:red"></i> +237 657170133</div>
                    </div>
                    <hr>
                    {{-- <h3>Caractéristiques du bien</h3>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <p class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Général
                                </button>
                            </p>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                                    body.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <p class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Détail des charges
                                </button>
                            </p>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                    body. Let's imagine this being filled with some actual content.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <p class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Mobilier et équipement
                                </button>
                            </p>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                    body. Nothing more exciting happening here in terms of content, but just filling up the
                                    space to make it look, at least at first glance, a bit more representative of how this
                                    would look in a real-world application.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <p class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Dépense énergétiques
                                </button>
                            </p>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                    body. Nothing more exciting happening here in terms of content, but just filling up the
                                    space to make it look, at least at first glance, a bit more representative of how this
                                    would look in a real-world application.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <p class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">

                                    Mesures
                                </button>
                            </p>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                    body. Nothing more exciting happening here in terms of content, but just filling up the
                                    space to make it look, at least at first glance, a bit more representative of how this
                                    would look in a real-world application.</div>
                            </div>
                        </div>
                    </div>
                    <hr><br><br>
                    <h3>Localisation</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127357.54623182249!2d9.659401863784996!3d4.0360708364783475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e1fe6d%3A0x92daa1444781c48b!2sDouala!5e0!3m2!1sfr!2scm!4v1690188289806!5m2!1sfr!2scm"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <p>Transports à proximité</p> --}}
                    <h3 class="mt-5">Nos autres logements à proximité de {{ $apartment->name }}</h3>
                    <div class="row flex-nowrap overflow-auto">
                        @foreach ($otherApartments as $apartment)
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('single-appartment', $apartment->id) }}">
                                @include('components.card', [
                                    'index' => $apartment,
                                    'showBanner' => false,
                                    'isSlider' => false,
                                    'showBorder' => true,
                                ])
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        lightGallery(document.getElementById('animated-thumbnails'), {
            thumbnail: true,
        });

        document.getElementById('candidaterButton').addEventListener('click', function() {
            document.getElementById('loginModal').style.display = 'block';
        });
        
    </script>
@endsection

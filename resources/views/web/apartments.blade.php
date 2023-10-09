@extends('web.layouts.app')

@section('content')
    <section class="search-section" style="padding-top: 8rem; padding-bottom: .5rem;">
        <div class="container-fluid mx-1 d-flex justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <form action="" method="post">
                    <input type="search" class="form-control rounded-pill" style="width: 300px">
                </form>
                <button class="trigger-btn filter-btn" data-popup-number="1" id="popupTriggerButton">
                    <i class="fa-solid fa-euro-sign"></i> Loyer
                </button>
                
                </button>
                <button class=" trigger-btn filter-btn gap-2" data-popup-number="2"><i
                        class="fa-regular fa-square"></i>Surface
                </button>
                <button class="trigger-btn filter-btn" data-popup-number="3"><i class="fa-solid fa-couch"></i>Meubles?
                </button>
                <button class="trigger-btn filter-btn" data-popup-number="4"><i class="fa-brands fa-windows"></i>Nombre de
                    pièces
                </button>
                <button class="trigger-btn filter-btn" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Plus
                    de filtres</button>
                <button class="btn btn-outline-main rounded-pill" type="button" class="btn btn-primary"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Créer une alerte
                </button>
            </div>

            <div>
                <input type="checkbox" id="logements-louer" value="true" checked>
                <label for="logements-louer">Afficher les logements déjà loués</label>
            </div>
        </div>
        <hr>
        <div class="container-fluid mx-1 d-flex justify-content-between">
            <div class="popup popup-1">
                <div class="wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-danger">Quel est votre budget?</h5>
                        <button class="btn-close" onclick="closePopup()"></button>
                    </div>
                    <form action="{{ route('apartments.filter') }}" method="POST" id="filterForm">
                        @csrf
                        <div class="d-flex justify-content-between price-input mb-1">
                            <div class="field col-5 input-group-sm d-flex mb-3">
                                <input type="number" class="input-min form-control rounded-start-pill" name="min_price" id="minPriceInput" value="0" oninput="updatePopupTrigger()">
                                <span class="input-group-text rounded-end-pill">CFA min</span>
                            </div>
                            <div class="separator">-</div>
                            <div class="field col-5 input-group-sm d-flex mb-3">
                                <input type="number" class="form-control rounded-start-pill input-max" name="max_price" id="maxPriceInput" value="10000" oninput="updatePopupTrigger()">
                                <span class="input-group-text rounded-end-pill">CFA max</span>
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input mb-4">
                            <input type="range" class="range-min" name="range_min" id="rangeMinInput" min="0" max="10000" value="0" oninput="updatePopupTrigger()">
                            <input type="range" class="range-max" name="range_max" id="rangeMaxInput" min="0" max="10000" value="10000" oninput="updatePopupTrigger()">
                        </div>
                
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fa fa-chevron-right"></i>
                                <span>Effacer</span>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-danger rounded-pill" onclick="setPopupTriggerText()">Afficher les logements</button>
                                <span id="apartmentCount" class="ms-2"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="popup popup-2">
                <div class="wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-danger">Quel est votre budget?</h5>
                        <button class="btn-close" onclick="closePopup()"></button>
                    </div>

                    <div class="d-flex justify-content-between price-input mb-1">
                        <div class="field col-5 input-group-sm d-flex mb-3">
                            <input type="number" class="input-min form-control rounded-start-pill " value="0">
                            <span class="input-group-text rounded-end-pill">CFA min</span>
                        </div>
                        <div class="separator">-</div>
                        <div class="field col-5 input-group-sm d-flex mb-3">
                            <input type="number" class="form-control rounded-start-pill input-max " value="10000">
                            <span class="input-group-text rounded-end-pill">CFA max</span>
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input mb-4">
                        <input type="range" class="range-min" name="range_min" min="0" max="10000"
                            value="0">
                        <input type="range" class="range-max" name="range_max" min="0" max="10000"
                            value="10000">
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2"><i
                                class="fa fa-chevron-right"></i><span>Effacer</span>
                        </div>
                        <div><button class="btn btn-danger rounded-pill">Afficher les logements</button></div>
                    </div>
                </div>
                {{-- <div class="wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-danger">Quelle surface souhaitez-vous?</h5>
                        <button class="btn-close" onclick="closePopup()"></button>
                    </div>
    
                    <div class="d-flex justify-content-between size-input mb-1">
                        <div class="field col-5 input-group-sm d-flex mb-3">
                            <input type="number" class="form-control rounded-start-pill input-min" value="0">
                            <span class="input-group-text rounded-end-pill"> m² min</span>
                        </div>
                        <div class="separator">-</div>
                        <div class="field col-5 input-group-sm d-flex mb-3">
                            <input type="number" class="form-control rounded-start-pill input-max " value="400">
                            <span class="input-group-text rounded-end-pill"> m² max</span>
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input mb-4">
                        <input type="range" class="range-min" name="range_min" min="0" max="400" value="0">
                        <input type="range" class="range-max" name="range_max" min="0" max="400" value="400">
                    </div>
    
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2"><i class="fa fa-chevron-right"></i><span>Effacer</span>
                        </div>
                        <div><button class="btn btn-danger rounded-pill">Afficher les logements</button></div>
                    </div>
                </div> --}}
            </div>
            <div class="popup popup-3">
                <div class="wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-danger">Meublé ou non meublé ?</h5>
                        <button class="btn-close" onclick="closePopup()"></button>
                    </div>
                    <div class="d-flex gap-3">
                        <div><img src="{{ asset('storage/images/logos/meublé.png') }}" alt="" class="img-fluid">
                        </div>
                        <div><img src="{{ asset('storage/images/logos/non-meublé.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2"><i
                                class="fa fa-chevron-right"></i><span>Effacer</span>
                        </div>
                        <div><button class="btn btn-danger rounded-pill">Afficher les logements</button></div>
                    </div>
                </div>
            </div>
            <div class="popup popup-4">
                <div class="wrapper">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-danger">Combien de pièces ?</h5>
                        <button class="btn-close" onclick="closePopup()"></button>
                    </div>
                    <div>
                        <small class="text-muted mb-5">Vous pouvez sélectionner plusieurs options.</small>
                        <div class="d-flex gap-2 mt-2">
                            <button class="btn border rounded-pill filter-btn">Studio</button>
                            <button class="btn border rounded-pill filter-btn">2</button>
                            <button class="btn border rounded-pill filter-btn">3</button>
                            <button class="btn border rounded-pill filter-btn">4</button>
                            <button class="btn border rounded-pill filter-btn">5+</button>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2"><i
                                class="fa fa-chevron-right"></i><span>Effacer</span>
                        </div>
                        <div><button class="btn btn-danger rounded-pill">Afficher les logements</button></div>
                    </div>
                </div>
            </div>
            <div class="popup-5">
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="d-flex justify-content-sm-center justify-content-lg-start gap-3">
                            <i class="fa-solid fa-map-location-dot"></i></i>
                            <h4>Rayon de <br> Recherche</h4>
                        </div>
                        <hr>
                        <div class="d-block d-md-flex gap-5 my-5">
                            <div class="d-flex gap-3">
                                <i class="fas fa-users"></i>
                                <h4>colocation</h4>
                            </div>
                            <div class="d-flex gap-2 col-md-10">
                                <button class="filter-btn"><i class="fas fa-bed"></i> Chambre dans une colocation</button>
                                <button class="filter-btn"><i class="fas fa-user-friends"></i> Colocation
                                    acceptée</button>
                            </div>
                        </div>
                        <hr>
                        <div class="d-block d-md-flex gap-5 my-5">
                            <div class="d-flex gap-3">
                                <i class="fas fa-building"></i>
                                <h4>Étage</h4>
                            </div>
                            <div class="d-flex gap-2 col-md-8">
                                <button class="filter-btn"><i class="fa-solid fa-arrow-down"></i> Rez-de-chaussée</button>
                                <button class="filter-btn"><i class="fas fa-caret-square"></i> Étage
                                    intermédiaire</button>
                                <button class="filter-btn"><i class="fa-solid fa-arrow-up"></i> Étage élevé</button>
                            </div>
                        </div>
                        <hr>
                        <div class="d-block d-md-flex gap-5 my-5">
                            <div class="d-flex gap-3">
                                <i class="fa-solid fa-gem"></i>
                                <h4>Commodité</h4>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="filter-btn"><i class="fas fa-parking"></i> Parking</button>
                                <button class="filter-btn"><i class="fas fa-caret-square"></i> Ascenseur</button>
                                <button class="filter-btn"><i class="fa-solid fa-arrow-up"></i> Gardien.ne</button>
                                <button class="filter-btn"><i class="fa-solid fa-arrow-up"></i> Cave</button>
                            </div>
                        </div>
                        <hr>
                        <div class="d-block d-md-flex gap-5 mt-5">
                            <div class="d-flex gap-3">
                                <i class="fas fa-plug"></i>
                                <h4>Équipement</h4>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="filter-btn">Lave-linge</button>
                                <button class="filter-btn"> Cuisine équipée</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-6">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content container">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="justify-content-center">
                                <img src="{{ asset('storage/images/logos/housephone.png') }}" alt=""
                                    class="img-fluid">
                                <h4>Recevez nos nouvelles annonces</h4>
                            </div>
                            <div class="shadow mb-4 bg-light" style="border-left: 5px solid red; border-radius: 5px;">
                                <div class="align-items-center rounded-1 pt-3 p-2 m-3 align-items-center">
                                    <p>Avec ces critères vous recevrez plus de 5 mails/jour</p>
                                    <p>Ajoutez des critères pour recevoir moins d'alertes quotidiennes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row ">
            <div class="col-lg-7 ps-3">
                <div class="d-flex justify-content-between  mb-1">
                    <div>
                        <h4> {{ \App\Models\Apartment::count() }} logements disponible <span class="text-muted" style="font-size: 16px">sur
                                </span></h4>
                    </div>
                    <div class="dropdown ">
                        <span>Trier par </span>
                        <span class="text-main" style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-paper-plane me-1"></i>distance du lieu choisi <i
                                class="fa fa-chevron-down"></i>
                        </span>
                        <ul class="dropdown-menu shadow-lg rounded-4 px-2 py-3 border border-0">
                            <small class="dropdown-item mb-4 text-main "><i class="fas fa-paper-plane"></i>
                                distance du lieu choisi </small>
                            <small class="dropdown-item mb-4"><i class="fa-solid fa-arrow-down"></i> Loyer
                                croissant</small>
                            <small class="dropdown-item mb-4"><i class="fa-solid fa-arrow-up"></i> Loyer
                                décroissant</small>
                            <small class="dropdown-item mb-4"><i class="fa-solid fa-arrow-down"></i> Surface
                                croissante</small>
                            <small class="dropdown-item mb-4"><i class="fa-solid fa-arrow-up"></i> Surface
                                décroissant</small>
                            <small class="dropdown-item mb-4"><i class="fa-solid fa-arrow-up"></i> Prix au m<sup>2</sup>
                                croissant</small>
                            <small class="dropdown-item"><i class="fa-solid fa-arrow-down"></i> Prix au m<sup>2</sup>
                                décroissant</small>
                        </ul>
                    </div>
                </div>
                <div class="ms-2">
                    <div class="row ">
                        @foreach ($apartments as $apartment)
                            <div class="col-6 col-md-4 col-xl-4 mb-3 ">
                                <a href="{{ route('single-appartment', $apartment->id) }}">
                                    @include('components.card', [
                                        'index' => $apartment,
                                        'showBanner' => false,
                                        'isSlider' => true,
                                        'showBorder' => true,
                                    ])
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127357.54623182249!2d9.659401863784996!3d4.0360708364783475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e1fe6d%3A0x92daa1444781c48b!2sDouala!5e0!3m2!1sfr!2scm!4v1690188289806!5m2!1sfr!2scm"
                    width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <script>
function updatePopupTrigger() {
    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');
    const apartmentCount = document.getElementById('apartmentCount');

    const minPrice = parseInt(minPriceInput.value);
    const maxPrice = parseInt(maxPriceInput.value);

    // Update the apartment count based on the selected price range
    const count = calculateApartmentCount(minPrice, maxPrice);
    apartmentCount.textContent = `(${count} apartments)`;

    // Update the popup trigger button text with the selected price range
    setPopupTriggerText();

    // Store the updated text in localStorage
    localStorage.setItem('popupTriggerText', popupTriggerButton.textContent);
}

function setPopupTriggerText() {
    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');
    const popupTriggerButton = document.getElementById('popupTriggerButton');

    const minPrice = parseInt(minPriceInput.value);
    const maxPrice = parseInt(maxPriceInput.value);

    // Update the popup trigger button text with the selected price range
    popupTriggerButton.textContent = `${minPrice} - ${maxPrice} CFA`;
}

function calculateApartmentCount(minPrice, maxPrice) {
    // Perform the necessary calculation to get the number of apartments in the given price range
    // Replace the following line with your actual logic to calculate the count
    const count = Math.floor(Math.random() * 100); // Example: random count between 0 and 100

    return count;
}

// Retrieve the stored popup trigger text on page load
window.addEventListener('DOMContentLoaded', function() {
    const popupTriggerButton = document.getElementById('popupTriggerButton');
    const storedText = localStorage.getItem('popupTriggerText');
    if (storedText) {
        popupTriggerButton.textContent = storedText ;
        popupTriggerButton.style.color = 'red';
        popupTriggerButton.style.border = '1px dashed red';
    }
});

    </script>
@endsection

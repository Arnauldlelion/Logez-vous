@extends('web.layouts.app')

@section('title', 'Appartements')

@section('content')

<section class="search-section">
    <hr>
    <div class="mx-1 d-flex justify-content-between align-items-center">
        <div class="d-flex gap-2">
            <form action="" method="get">
                <input type="search" class="form-control form-control-lg" style="width: 300px" name="keyword" id="searchInput" value="{{ old('keyword', $keyword) }}">
                {{-- <button type="button" onclick="cancelSearch()">Cancel</button> --}}
            </form>
            <button class="btn filter-btn" id="popupTriggerButton1">
                <i class="fa-solid fa-euro-sign"></i> Loyer
            </button>

            <button class="btn filter-btn" id="popupTriggerButton2">
                <i class="fa-regular fa-square me-1"></i>Surface
            </button>

            <button class="btn filter-btn" id="popupTriggerButton3">
                <i class="fa-solid fa-couch me-1"></i>Meubles?
            </button>

            <button class="btn filter-btn" id="popupTriggerButton4">
                <i class="fa-brands fa-windows me-1"></i>Nombre de pièces
            </button>
            <button class="btn filter-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" onclick="closePopup()">Plus
                de filtres</button>
            <button class="btn btn-outline-main btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Créer une alerte
            </button>
        </div>

        <div class="d-flex align-items-center gap-2">
            <input type="checkbox" id="logements-louer" value="true" checked>
            <label for="logements-louer">Afficher les logements déjà loués</label>
        </div>
    </div>
    <hr>
    <form action="{{ route('search-appartment') }}" method="GET">
        @csrf
        <div class="popup" id="popup1">
            <!-- Content for popup 1 -->
            <div class="wrapper">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-main">Quel est votre budget?</h5>
                    <button type="button" class="btn-close" onclick="closePopup()"></button>
                </div>
                <div class="d-flex justify-content-between price-input mb-1">
                    <div class="field col-5 input-group-sm d-flex mb-3">
                        <input type="number" class="input-min form-control rounded-start-pill" name="min_price" id="minPriceInput" value="{{ request('min_price', '0') }}">
                        <span class="input-group-text rounded-end-pill">CFA min</span>
                    </div>
                    <div class="separator">-</div>
                    <div class="field col-5 input-group-sm d-flex mb-3">
                        <input type="number" class="form-control rounded-start-pill input-max" name="max_price" id="maxPriceInput" value="{{ request('max_price', '10000') }}">
                        <span class="input-group-text rounded-end-pill">CFA max</span>
                    </div>
                </div>
                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input mb-4">
                    <input type="range" class="range-min" name="range_min" id="rangeMinInput" min="0" max="10000" value="{{ request('min_price') }}">
                    <input type="range" class="range-max" name="range_max" id="rangeMaxInput" min="0" max="10000" value="{{ request('max_price', 10000) }}">
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2" onclick="resetFields('popup1')">
                        <i class="fa fa-chevron-right"></i>
                        <span>Effacer</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-main rounded-pill">Afficher les logements</button>
                        <span id="apartmentCount" class="ms-2"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup" id="popup2">
            <!-- Content for popup 2 -->
            <div class="wrapper">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-main">Quelle est la superficie souhaitée?</h5>
                    <button type="button" class="btn-close" onclick="closePopup()"></button>
                </div>

                <div class="d-flex justify-content-between price-input mb-1">
                    <div class="field col-5 input-group-sm d-flex mb-3">
                        <input type="number" class="size-input-min form-control rounded-start-pill" name="min_surface_area" value="0">
                        <span class="input-group-text rounded-end-pill">m² min</span>
                    </div>
                    <div class="separator">-</div>
                    <div class="field col-5 input-group-sm d-flex mb-3">
                        <input type="number" class="form-control rounded-start-pill size-input-max" name="max_surface_area" value="100" onchange="updateButtonName()">
                        <span class="input-group-text rounded-end-pill">m² max</span>
                    </div>
                </div>
                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input mb-4">
                    <input type="range" class="size-range-min" name="size-range_min" min="0" max="100" value="0">
                    <input type="range" class="size-range-max" name="size-range_max" min="0" max="100" value="100">
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2" onclick="resetFields('popup2')">
                        <i class="fa fa-chevron-right"></i>
                        <span>Effacer</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-main rounded-pill">Afficher les logements</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup" id="popup3">
            <!-- Content for popup 3 -->
            <div class="wrapper">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-main">Meublé ou non meublé ?</h5>
                    <button type="button" class="btn-close" onclick="closePopup()"></button>
                </div>

                <div class="d-flex gap-3">
                    <label class="radio-label">
                        <input type="radio" id="furnished" name="furnished" value="meublé" onchange="toggleBorder(this)">
                        <img src="{{ asset('storage/images/logos/meublé.png') }}" alt="" class="img-fluid">
                    </label>
                    <label class="radio-label">
                        <input type="radio" id="furnished" name="furnished" value="Non meublé" onchange="toggleBorder(this)">
                        <img src="{{ asset('storage/images/logos/non-meublé.png') }}" alt="" class="img-fluid">
                    </label>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2" role="button" onclick="resetFields('popup3')">
                        <i class="fa fa-chevron-right"></i>
                        <span>Effacer</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-main rounded-pill">Afficher les logements</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="popup" id="popup4">
            <!-- Content for popup 4 -->
            <div class="wrapper px-1">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-main">Combien de pièces ?</h4>
                    <button type="button" class="btn-close" onclick="closePopup()"></button>
                </div>

                <div>
                    <small class="text-muted mb-5">Vous pouvez sélectionner plusieurs options.</small>
                    <div class="d-flex gap-3 mt-3">
                        <label class="checkbox-label">
                            <input type="checkbox" name="rooms[]" value="studio" onchange="toggleBorder(this)">
                            <span>Studio</span>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rooms[]" value="1" onchange="toggleBorder(this)">
                            <span>1</span>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rooms[]" value="2" onchange="toggleBorder(this)">
                            <span>2</span>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rooms[]" value="3" onchange="toggleBorder(this)">
                            <span>3</span>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rooms[]" value="4" onchange="toggleBorder(this)">
                            <span>4</span>
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" name="rooms[]" value="5+" onchange="toggleBorder(this)">
                            <span>5+</span>
                        </label>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2" role="button" onclick="resetFields('popup4')">
                        <i class="fa fa-chevron-right"></i>
                        <span>Effacer</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-main rounded-pill">Afficher les logements</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <div class="popup-5">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content container">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="justify-content-center">
                        <img src="{{ asset('storage/images/logos/housephone.png') }}" alt="" class="img-fluid">
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
</section>
<section class="filtered-apartment">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 ps-3 left-section">
                <div class="d-flex justify-content-between  mb-1">
                    <div>
                        @if (request()->isMethod('post'))
                        @php
                        $filteredApartments = $apartments->count();
                        @endphp
                        <h4>{{ $filteredApartments }} logements disponibles <span class="text-muted" style="font-size: 16px">sur {{ \App\Models\Apartment::count() }}
                            </span></h4>
                        @else
                        <h4>{{ \App\Models\Apartment::where('published', false)->count() }} logements disponible
                            <span class="text-muted" style="font-size: 16px">sur
                                {{ \App\Models\Apartment::count() }}
                            </span>
                        </h4>
                        @endif
                    </div>

                    <div class="dropdown ">
                        <span>Trier par </span>
                        <span class="text-main" style="cursor:pointer" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-paper-plane me-1"></i>distance du lieu choisi <i class="fa fa-chevron-down"></i>
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
                            <small class="dropdown-item mb-4"><i class="fa-solid fa-arrow-up"></i> Prix au
                                m<sup>2</sup>
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
                                <x-web.apartment-card :apartment="$apartment" />
                                {{--
                                @include('web.components.card', [
                                'apartment' => $apartment,
                                'index' => $apartment,
                                'showBanner' => now()->diffInWeeks($apartment->created_at) < 1, 'isSlider'=> true,
                                    'showBorder' => true,
                                    ])
                                --}}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127357.54623182249!2d9.659401863784996!3d4.0360708364783475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e1fe6d%3A0x92daa1444781c48b!2sDouala!5e0!3m2!1sfr!2scm!4v1690188289806!5m2!1sfr!2scm" width="100%" height="500vh" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<script>
    // Variable to store the currently opened popup
    var currentPopup = null;

    // Add click event listeners to the buttons
    document.getElementById("popupTriggerButton1").addEventListener("click", function() {
        openPopup("popup1", "popupTriggerButton1");
    });

    document.getElementById("popupTriggerButton2").addEventListener("click", function() {
        openPopup("popup2", "popupTriggerButton2");
    });

    document.getElementById("popupTriggerButton3").addEventListener("click", function() {
        openPopup("popup3", "popupTriggerButton3");
    });

    document.getElementById("popupTriggerButton4").addEventListener("click", function() {
        openPopup("popup4", "popupTriggerButton4");
    });

    // Function to open the popup
    function openPopup(popupId, buttonId) {
        var popup = document.getElementById(popupId);
        var button = document.getElementById(buttonId);
        var closeButton = popup.querySelector(".btn-close");

        // Close the currently opened popup (if any)
        if (currentPopup) {
            currentPopup.style.display = "none";
        }

        // Calculate the position of the button
        var buttonRect = button.getBoundingClientRect();
        var buttonTop = buttonRect.top + buttonRect.height;
        var buttonLeft = buttonRect.left;

        // Position the popup below the button
        popup.style.top = buttonTop + "px";
        popup.style.left = buttonLeft + "px";
        popup.style.display = "block";

        button.style.border = "1px dashed red";
        button.style.backgroundColor = "#FFEBEE";
        button.style.fontWeight = "bold";

        // Update the currently opened popup
        currentPopup = popup;

        // Add click event listener to the close button
        closeButton.addEventListener("click", function() {
            closePopup(popup);
        });

        // Add click event listener to window object to close the popup when clicking outside
        window.addEventListener("click", function(event) {
            if (!popup.contains(event.target) && event.target !== button) {
                closePopup(popup);
                button.style.border = "1px dashed #BCBCBC";
            }
        });
    }

    // Function to close the popup
    function closePopup(popup) {
        popup.style.display = "none";
        currentPopup = null;
    }

    function setupRangeInputs(popupId, minInputClass, maxInputClass, rangeMinClass, rangeMaxClass) {
        const popup = document.querySelector(`#${popupId}`);
        const minInput = popup.querySelector(`.${minInputClass}`);
        const maxInput = popup.querySelector(`.${maxInputClass}`);
        const rangeMinInput = popup.querySelector(`.${rangeMinClass}`);
        const rangeMaxInput = popup.querySelector(`.${rangeMaxClass}`);
        const progress = popup.querySelector(".progress");

        minInput.addEventListener("input", () => {
            let minVal = parseInt(minInput.value);
            let maxVal = parseInt(maxInput.value);

            if (minVal > maxVal) {
                minInput.value = maxVal;
            } else {
                rangeMinInput.value = minVal;
                updateProgress(rangeMinInput, rangeMaxInput, progress);
            }
        });

        maxInput.addEventListener("input", () => {
            let minVal = parseInt(minInput.value);
            let maxVal = parseInt(maxInput.value);

            if (maxVal < minVal) {
                maxInput.value = minVal;
            } else {
                rangeMaxInput.value = maxVal;
                updateProgress(rangeMinInput, rangeMaxInput, progress);
            }
        });

        rangeMinInput.addEventListener("input", () => {
            let minVal = parseInt(rangeMinInput.value);
            let maxVal = parseInt(rangeMaxInput.value);

            if (minVal > maxVal) {
                rangeMinInput.value = maxVal;
            } else {
                minInput.value = minVal;
                updateProgress(rangeMinInput, rangeMaxInput, progress);
            }
        });

        rangeMaxInput.addEventListener("input", () => {
            let minVal = parseInt(rangeMinInput.value);
            let maxVal = parseInt(rangeMaxInput.value);

            if (maxVal < minVal) {
                rangeMaxInput.value = minVal;
            } else {
                maxInput.value = maxVal;
                updateProgress(rangeMinInput, rangeMaxInput, progress);
            }
        });

        function updateProgress(minInput, maxInput, progress) {
            const minVal = parseInt(minInput.value);
            const maxVal = parseInt(maxInput.value);
            const maxRange = parseInt(minInput.max);

            progress.style.left = (minVal / maxRange) * 100 + "%";
            progress.style.right = (1 - maxVal / maxRange) * 100 + "%";
        }
    }

    // Call the setupRangeInputs function for price range inputs and sliders
    setupRangeInputs("popup1", "input-min", "input-max", "range-min", "range-max");

    // Call the setupRangeInputs function for size range inputs and sliders
    setupRangeInputs("popup2", "size-input-min", "size-input-max", "size-range-min", "size-range-max");



    function resetFields(popupId) {
        // Get the popup element
        var popup = document.getElementById(popupId);

        // Find all input elements within the popup
        var inputs = popup.getElementsByTagName('input');

        // Reset the input values
        for (var i = 0; i < inputs.length; i++) {
            var input = inputs[i];

            // Check the input type and reset accordingly
            if (input.type === 'text' || input.type === 'number' || input.type === 'range') {
                input.value = input.defaultValue;
            } else if (input.type === 'checkbox' || input.type === 'radio') {
                input.checked = input.defaultChecked;
            }
        }
    }

    function cancelSearch() {
        document.getElementById('searchInput').value = ''; // Clear the search input field
        document.querySelector('form').submit(); // Submit the form to perform a new search with no keyword
    }
</script>
@endsection

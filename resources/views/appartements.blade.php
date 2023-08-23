@extends('layouts.app')

@section('content')
    <section class="" style="padding-top: 8rem; padding-bottom: .5rem;">
        <div class="container-fluid mx-1 d-flex justify-content-between align-items-center">
            <div class="d-flex gap-1">
                <form action="" method="post">
                    <input type="search" class="form-control rounded-pill" style="width: 300px">
                </form>
                <button class="btn border rounded-pill trigger-btn filter-btn d-flex align-items-center gap-2"
                    data-popup-number="1">
                    <i class="fa-solid fa-euro-sign"></i> Loyer
                </button>
                <button class="btn border rounded-pill trigger-btn filter-btn d-flex align-items-center gap-2"
                    data-popup-number="2"><i class="fa-regular fa-square"></i>Surface
                </button>
                <button class="btn border rounded-pill trigger-btn filter-btn d-flex align-items-center gap-2"
                    data-popup-number="3"><i class="fa-solid fa-couch"></i>Meubles?
                </button>
                <button class="btn border rounded-pill trigger-btn filter-btn d-flex align-items-center gap-2"
                    data-popup-number="4"><i class="fa-brands fa-windows"></i>Nombre de pièces
                </button>
                {{-- <button class="btn border rounded-pill filter-btn" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Plus de filtres
                </button> --}}
                <button class="btn border rounded-pill trigger-btn filter-btn d-flex align-items-center gap-2 offcanvasOpenBtn">
                    Plus de filtres
                </button>
                
                <button class="btn btn-outline-danger border rounded-pill" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Créer une alerte
                </button>
            </div>
            <div>
                <input type="checkbox" id="logements-louer" value="true" checked>
                <label for="logements-louer">Afficher les logements déjà loués</label>
            </div>
        </div>
    </section>
    <hr>
    <div class="container-fluid mx-1 d-flex justify-content-between">
        <div class="popup popup-1">
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
                    <input type="range" class="range-min" name="range_min" min="0" max="10000" value="0">
                    <input type="range" class="range-max" name="range_max" min="0" max="10000" value="10000">
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2"><i class="fa fa-chevron-right"></i><span>Effacer</span>
                    </div>
                    <div><button class="btn btn-danger rounded-pill">Afficher les logements</button></div>
                </div>
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
                    <input type="range" class="range-min" name="range_min" min="0" max="10000" value="0">
                    <input type="range" class="range-max" name="range_max" min="0" max="10000" value="10000">
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2"><i class="fa fa-chevron-right"></i><span>Effacer</span>
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
                    <div><img src="{{ asset('storage/images/logos/non-meublé.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2"><i class="fa fa-chevron-right"></i><span>Effacer</span>
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
                    <div class="d-flex align-items-center gap-2"><i class="fa fa-chevron-right"></i><span>Effacer</span>
                    </div>
                    <div><button class="btn btn-danger rounded-pill">Afficher les logements</button></div>
                </div>
            </div>
        </div>
        <div class="popup-5">
                <div class="offcanvas-content">
                    <div class="float-end">
                        <button class="btn-close offcanvascloseBtn"></button>
                    </div>
                    <div class="d-flex">
                        <div>
                            <i class="fa fa-people"></i>
                            <p class="text-muted">Colocation</p>
                        </div>
                        <div>
                            <button class="btn rounded-pill"><i class="fa fa-bed"></i>Chambre dans une colocation</button>
                            <button class="btn rounded-pill"><i class="fa fa-bed"></i>Chambre dans une colocation</button>
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
                            <img src="{{ asset("storage/images/logos/housephone.png")}}" alt="" class="img-fluid">
                            <h4>Recevez nos nouvelles annonces</h4>
                        </div>
                        <div class="shadow mb-4 bg-light"  style="border-left: 5px solid red; border-radius: 5px;">
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


        <hr>
        <section class="container2">
            <div class="block-left">
                <h2> 95 logements disponible</h2>
                <div class="ms-2">

                    <h5 style="padding-left: 450px;">Trier par <i class="fas fa-paper-plane" style="color: #ff040c"></i>
                        <span style="color:#ff040c">distance du lieu choisi</span>
                    </h5>
                    <h5 style="color: gray;">sur 3138</h5>
                    <div class="row">

                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31] as $item)
                            <div class="col-md-6 col-xl-4 mb-3">
                                @include('components.card', [
                                    'index' => $item,
                                    'showBanner' => false,
                                    'isSlider' => true,
                                    'showBorder' => true,
                                ])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class=" block-right">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127357.54623182249!2d9.659401863784996!3d4.0360708364783475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e1fe6d%3A0x92daa1444781c48b!2sDouala!5e0!3m2!1sfr!2scm!4v1690188289806!5m2!1sfr!2scm"
                    width="700" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="scrollbar"></div>

    </div>
    </section>

    <script>
let activePopup = null;
let triggerBtnText = '';

function togglePopup(popupNumber) {
  const popup = document.querySelector('.popup.popup-' + popupNumber);
  const triggerBtn = document.querySelector('.trigger-btn[data-popup-number="' + popupNumber + '"]');

  const triggerRect = triggerBtn.getBoundingClientRect();
  const triggerBtnTop = triggerRect.top + triggerRect.height;
  const triggerBtnLeft = triggerRect.left;

  popup.style.top = triggerBtnTop + window.scrollY + 'px';
  popup.style.left = triggerBtnLeft + 'px';

  if (activePopup && activePopup !== popup) {
    activePopup.style.display = 'none';
  }

  if (popup.style.display === 'block') {
    popup.style.display = 'none';
    activePopup = null;
    document.body.classList.remove('popup-open');
    triggerBtn.innerHTML = triggerBtnText; // Reset trigger button text
      document.body.classList.remove('popup-open');
  } else {
    popup.style.display = 'block';
    activePopup = popup;
    document.body.classList.add('popup-open');
    triggerBtnText = triggerBtn.innerHTML; // Store the original trigger button text

    // Update trigger button text when the user selects a price range
    const rangeMinInput = popup.querySelector('.range-min');
    const rangeMaxInput = popup.querySelector('.range-max');

    rangeMinInput.addEventListener('input', updateTriggerButtonText.bind(null, triggerBtn));
    rangeMaxInput.addEventListener('input', updateTriggerButtonText.bind(null, triggerBtn));

    document.addEventListener('click', handleDocumentClick);
  }
}

function updateTriggerButtonText(triggerBtn) {
  const popup = triggerBtn.nextElementSibling;
  const rangeMinInput = popup.querySelector('.range-min');
  const rangeMaxInput = popup.querySelector('.range-max');

  if ( !rangeMinInput ) {
    console.error('Required elements not found');
    return;
  }

  const rangeMinValue = rangeMinInput.value;
  const rangeMaxValue = rangeMaxInput.value;

  triggerBtn.innerHTML = `<i class="fa-solid fa-euro-sign"></i> ${rangeMinValue} - ${rangeMaxValue}`;
}

function handleDocumentClick(event) {
  const isClickInsidePopup = activePopup.contains(event.target);
  const isClickInsideTriggerButton = event.target.classList.contains('trigger-btn');

  if (!isClickInsidePopup && !isClickInsideTriggerButton) {
    activePopup.style.display = 'none';
    activePopup = null;
    document.body.classList.remove('popup-open');
    const triggerBtn = document.querySelector('.trigger-btn[data-popup-number]');
    triggerBtn.innerHTML = triggerBtnText; // Reset trigger button text
    document.removeEventListener('click', handleDocumentClick);
  }
}

        function closePopup() {
            if (activePopup) {
                activePopup.style.display = 'none';
                activePopup = null;
                document.body.classList.remove('popup-open');
                const triggerBtn = document.querySelector('.trigger-btn[data-popup-number="' + activePopup.dataset
                    .popupNumber + '"]');
                triggerBtn.innerHTML = triggerBtnText; // Reset trigger button text
            }
        }

        // Attach event listeners to trigger buttons
        const triggerBtns = document.querySelectorAll('.trigger-btn');
        triggerBtns.forEach((triggerBtn) => {
            const popupNumber = triggerBtn.dataset.popupNumber;
            triggerBtn.addEventListener('click', () => togglePopup(popupNumber));
        });


        function setupRangeInputs(rangeInputSelector, priceInputSelector, progressSelector, priceGap, sizeInputSelector,
            sizeProgressSelector, sizeGap) {
            const rangeInput = document.querySelectorAll(rangeInputSelector);
            const priceInput = document.querySelectorAll(priceInputSelector);
            const progress = document.querySelector(progressSelector);
            const sizeInput = document.querySelectorAll(sizeInputSelector);
            const sizeProgress = document.querySelector(sizeProgressSelector);

            priceInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    //getting two inputs value and parsing them to number
                    let minVal = parseInt(priceInput[0].value);
                    let maxVal = parseInt(priceInput[1].value);

                    if ((maxVal - minVal >= priceGap) && maxVal <= 10000) {
                        if (e.target.className === "input-min") { //if active input is min input
                            rangeInput[0].value = minVal;
                            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        } else {
                            rangeInput[1].value = maxVal;
                            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                        }
                    }
                });
            });

            rangeInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    //getting two slider value and parsing them to slider
                    let minVal = parseInt(rangeInput[0].value);
                    let maxVal = parseInt(rangeInput[1].value);

                    if (maxVal - minVal < priceGap) {
                        if (e.target.className === "range-min") { //if active slider is min slider
                            rangeInput[0].value = maxVal - priceGap;
                        } else {
                            rangeInput[1].value = minVal + priceGap;
                        }
                    } else {
                        priceInput[0].value = minVal;
                        priceInput[1].value = maxVal;
                        progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                    }
                });
            });

            //for size 
            sizeInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    //getting two inputs value and parsing them to number
                    let minVal = parseInt(sizeInput[0].value);
                    let maxVal = parseInt(sizeInput[1].value);

                    if ((maxVal - minVal >= sizeGap) && maxVal <= 400) {
                        if (e.target.className === "input-min") { //if active input is min input
                            rangeInput[0].value = minVal;
                            sizeProgress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        } else {
                            rangeInput[1].value = maxVal;
                            sizeProgress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                        }
                    }
                });
            });

            rangeInput.forEach((input) => {
                input.addEventListener("input", (e) => {
                    //getting two slider value and parsing them to slider
                    let minVal = parseInt(rangeInput[0].value);
                    let maxVal = parseInt(rangeInput[1].value);

                    if (maxVal - minVal < sizeGap) {
                        if (e.target.className === "range-min") { //if active slider is min slider
                            rangeInput[0].value = maxVal - sizeGap;
                        } else {
                            rangeInput[1].value = minVal + sizeGap;
                        }
                    } else {
                        sizeInput[0].value = minVal;
                        sizeInput[1].value = maxVal;
                        sizeProgress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        sizeProgress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                    }
                });
            });
        }


        // Example usage with the provided HTML structure
        setupRangeInputs(
            ".popup-1 .range-input input",
            ".popup-1 .price-input input",
            ".popup-1 .slider .progress",
            1000,

            ".popup-1 .range-input input",
            ".popup-2 .size-input input",
            ".popup-2 .slider .progress",
            10
        );

        const openOffcanvasBtn = document.querySelector('.offcanvasOpenBtn');
        const closeOffcanvasBtn = document.querySelector('.offcanvascloseBtn');
        const offcanvasContent = document.querySelector('.offcanvas-content');

        openOffcanvasBtn.addEventListener('click', function(e){
            offcanvasContent.classList.add('active');
        });

        closeOffcanvasBtn.addEventListener('click', function(e){
            offcanvasContent.classList.remove('active');
        });

$(document).ready(function(e){
    $('popup-1 .range-min').on('change', function(){
        alert('hello');
    })
})
        function applyFilter() {
            const priceMin = document.querySelector('.input-min').value;
            const priceMax = document.querySelector('.input-max').value;

            // Perform an AJAX request with the filter parameters

            // Example using jQuery AJAX
            $.ajax({
                type: 'GET',
                url: '/filter',
                data: {
                    price_min: priceMin,
                    price_max: priceMax
                },
                success: function(response) {
                    // Handle the response and update the results accordingly
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

    </script>
@endsection

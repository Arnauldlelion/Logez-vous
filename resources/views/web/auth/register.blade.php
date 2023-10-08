@if(isset($apartment))
<div class="modal col-lg-8" id="register-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
              <div class="d-flex justify-content-end gap-5 text-center">
               
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="btn-group d-block d-md-flex justify-content-md-between gap-3 mt-2">
                   <b >Candidater</b>
                </div>
                <div class="text-center d-flex align-items-center my-3">
                  
                </div>
                <form action="{{ route('storeLocataire', ['apartment_id' => $apartment->id]) }}" method="POST">
                  @csrf
                   
                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('first_name') is-invalid @enderror" type="text"
                                   value="{{old('first_name')}}" name="first_name" placeholder="Prénom">
                            @error('first_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('last_name') is-invalid @enderror" type="text"
                                   value="{{old('last_name')}}" name="last_name" placeholder="Nom">
                            @error('last_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('email') is-invalid @enderror" type="email"
                                   value="{{old('email')}}" name="email"
                                   placeholder="Adresse email">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>
                    
                        <div class="form-group mb-3">
                          <input class="form-control rounded-pill @error('phone') is-invalid @enderror" type="text"
                                 value="{{old('phone')}}" name="phone" placeholder="Numero">
                          @error('phone')
                          <span class="invalid-feedback">{{ $message }}</span>
                          @enderror
                      </div>
                        <button id="registerButton" class="btn btn-main" style="width: 100%">S'enregistrer</button>

                        <div id="popupContainer">
                          <div id="popupContent">
                            <h2>Merci</h2>
                            <p>Vos informations ont été reçues avec succès. Un agent vous recontactera.</p>
                            <button id="closeButton">OK</button>
                          </div>
                        </div>
                </form>
                <div>
                    <small>En cliquant sur le "S'enregistrer" je confirme que j'accepte les
                    <a href="#" class="text-main">conditions d'utilisation.</a></small>
                </div>
                <div class="float-end">
                    <small>J'ai déjà un compte <a href="" class="text-main">Se connecter</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    // Initialize the intlTelInput plugin
    const input = document.querySelector("#phoneNumber");
    const iti = window.intlTelInput(input, {
      initialCountry: "auto",
      separateDialCode: true,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

  // Get the necessary elements
const registerButton = document.getElementById('registerButton');
const popupContainer = document.getElementById('popupContainer');
const closeButton = document.getElementById('closeButton');

// Function to show the pop-up
function showPopup(event) {
  event.preventDefault(); // Prevent form submission
  popupContainer.style.display = 'flex';
}

// Function to close the pop-up
function closePopup() {
  popupContainer.style.display = 'none';
}

// Event listener for the register button
registerButton.addEventListener('click', showPopup);

// Event listener for the close button
closeButton.addEventListener('click', closePopup);

    // Phone number validation function
    function validatePhoneNumber() {
      const phoneNumber = iti.getNumber();

      if (iti.isValidNumber()) {
        const selectedCountryData = iti.getSelectedCountryData();
        const countryFlagElement = document.querySelector(".selected-flag");
        countryFlagElement.innerHTML = `<img src="${selectedCountryData.flag}" alt="${selectedCountryData.name}">`;

      } else {
        alert('Le numéro de téléphone n’est pas valide.');
      }
    }

    @if(session('status'))
       alert({{session('status')}});
      
        @endif
  </script>



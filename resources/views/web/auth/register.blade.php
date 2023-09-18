<div class="modal col-lg-8" id="register-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
              <div class="d-flex justify-content-end gap-5 text-center">
                <h6 class="modal-title text-main">Inscription</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
                <div class="btn-group d-block d-md-flex justify-content-md-between gap-3 mt-2">
                    <button class="btn btn-lg btn-outline rounded-pill p-2 "> <img src="{{ asset('storage/images/facebook.jpeg') }}" class="float-start m-1" width="25px"> Facebook</button>
                    <button class="btn btn-lg btn-outline rounded-pill p-2"> <img src="{{ asset('storage/images/google.jpeg') }}" class="float-start m-1" width="25px"> Google</button>
                </div>
                <div class="text-center d-flex align-items-center my-3">
                    <hr class="w-50 mx-auto">
                    <small class="text-sec mx-2">OU</small>
                    <hr class="w-50 mx-auto">
                </div>
                <form action="{{ route('register')}}" method="post"> 
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
                        {{-- <div class="col-sm-6"></div>
                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('telephone') is-invalid @enderror" type="number"
                                   value="{{old('telephone')}}" name="telephone"
                                   placeholder="Numéro de téléphone">
                            @error('telephone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="intl-tel-input form-group mb-3 rounded-pill">
                          <div class="selected-flag rounded-start-pill"></div>
                          <input type="tel" class="form-control rounded-pill w-100" name="phone" id="phoneNumber" placeholder="Enter phone number">
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('password') is-invalid @enderror" type="password"
                                   id="password" name="password" placeholder="Mot de passe" style="width: 100% !important">
                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 ">
                            <input class="form-control rounded-pill" type="password" id="password" name="password_confirmation"
                                   placeholder="Confirmation du mot de passe">
                        </div>
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('location') is-invalid @enderror" type="text"
                                   id="location" name="location" placeholder="emplacement de votre propriété e.g Douala,Bonajo" style="width: 100% !important">
                            @error('location')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-4 ">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description"
                                      rows="5"
                                      placeholder="Décrivez votre propriété">{{old('description')}}</textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Je suis propriétaire d'un bien à louer me</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">Je m'abonne aux alertes de nouveaux appartements</label>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin">
                            <label class="form-check-label" for="checkbox-signin">je m'abonne aux bons plans de nos partenaires</label>
                        </div> --}}
                    <div class="">
                        <button type="submit" onclick="validatePhoneNumber()" class="btn btn-main btn-lg rounded-pill p-2 w-100 text-main mb-4">S'enregistrer</button>
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
<script>
    // Initialize the intlTelInput plugin
    const input = document.querySelector("#phoneNumber");
    const iti = window.intlTelInput(input, {
      initialCountry: "auto",
      separateDialCode: true,
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

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
  </script>
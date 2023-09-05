<div class="modal auth-modal" id="register-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Votre nom complet">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control  @error('email') is-invalid @enderror" placeholder="Adresse e-mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </div>
                        <input type="number" name="phone" value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="692890987">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
 
                    <input name="type" value="landlord" hidden>
 
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirmation du mot de passe" required>
                    </div>
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="type">
                        <label class="form-check-label" for="type">
                            Je suis propriétaire d'un bien à louer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="subscribed">
                        <label class="form-check-label" for="subscribed">
                            Je m'abonne aux alertes de nouveaux appartements
                        </label>
                    </div> --}}
                    <button type="submit" class="btn btn-main btn-lg mt-3 w-100">S'enregistrer</button>
                </form>
                <div class="text-center">
                    <div class="terms">
                        <span class="text-sec">En cliquant sur le "S'enregistrer" je confirme que j'accepte les</span>
                        <a href="#" class="btn-link">conditions d'utilisation.</a>
                    </div>
                    <div class="google">
                        <div class="text-center d-flex my-3">
                            <hr class="w-25 mx-auto">
                            <span class="text-sec">OU</span>
                            <hr class="w-25 mx-auto">
                        </div>
                        <form action="#">
                            <button type="submit" class="btn btn-google w-75 shadow-lg">
                                <img src="/storage/images/google-sm.png" alt="Google" class="img-fluid">
                                <span>Continuer avec Google</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-end">
                    <span class="text-sec">Déjà inscrit?</span>
                    <button class="btn btn-link" data-bs-toggle="modal"
                        data-bs-target="#login-modal">Connectez-vous</button>
                </div>
            </div>
        </div>
    </div>
</div>
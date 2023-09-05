<div class="modal auth-modal" id="login-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Heureux de vous revoir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-text">Connectez-vous afin d'accéder à votre compte</div>
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="email" name="email" class="form-control form-control-sm  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adresse e-mail" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password" class="form-control form-control-sm  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-main btn-lg mt-3 w-100">Connexion</button>
                </form>
                <div class="text-center">
                    <div class="google">
                        <div class="text-center d-flex mt-3">
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
                    <span class="text-sec">Vous n'avez pas encore de compte?</span>
                    <button class="btn btn-link" data-bs-toggle="modal"
                        data-bs-target="#register-modal">Inscrivez-vous</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="login-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Se Connecter</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="post" class="mx-4" id="login-form">
                    @csrf
                    <div class="form-group mb-4">
                        <input class="form-control rounded-pill @error('email') is-invalid @enderror" type="email"
                            value="{{ old('email') }}" name="email" placeholder="Adresse email">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <input class="form-control rounded-pill @error('password') is-invalid @enderror"
                            type="password" id="password" name="password" placeholder="Mot de passe"
                            style="width: 100% !important">
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-main w-100">Connectez-vous</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


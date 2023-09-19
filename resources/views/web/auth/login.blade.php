<div class="modal" id="login-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                {{-- <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button><br><br>
                <h3 class="text-main mb-5">Heureux de vous revoir</h3>
                <small>Connectez-vous afin d'accéder à votre compte</small>
                <form action="" method="post" class="mt-5">
                    @csrf
                    <div class="btn-group d-block">
                        <button class="btn btn-outline rounded-pill w-100 mb-3 p-2"> <img src="{{ asset('storage/images/facebook.jpeg') }}" class="float-start m-1" width="25px">Connexion avec Facebook</button>
                        <button class="btn btn-outline rounded-pill w-100 mb-3 p-2"><img src="{{ asset('storage/images/google.jpeg') }}" class="float-start m-1" width="25px"> Connexion avec Google</button>
                        <button class="btn btn-outline rounded-pill w-100 mb-4 p-2"><img src="{{ asset('storage/images/mail.jpeg') }}" class="float-start m-1" width="25px">Connexion avec par email</button>
                    </div>
                </form>
                <div>
                    <small class="text-muted">Vous n'avez pas encore de compte ?</small><br>
                    <small class="text-main mb-3">Inscrivez-vous</small>
                </div> --}}
                <form action="{{ route('login')}}" method="post"> 
                    @csrf
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('email') is-invalid @enderror" type="email"
                                   value="{{old('email')}}" name="email"
                                   placeholder="Adresse email">
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
    
                        
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('password') is-invalid @enderror" type="password"
                                   id="password" name="password" placeholder="Mot de passe" style="width: 100% !important">
                            @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    <div class="">
                        <button type="submit" class="btn btn-main btn-lg rounded-pill p-2 w-100 text-main mb-4">S'enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

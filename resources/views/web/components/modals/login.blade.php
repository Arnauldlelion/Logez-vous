<div class="modal" id="login-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button><br><br>
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal auth-modal" id="register-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Prénom et nom" required>
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </div>
                        <input type="number" name="phone" class="form-control" placeholder="692890987" required>
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirmation du mot de passe" required>
                    </div>
                    <div class="form-check">
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
                    </div>
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

<!-- Button trigger modal -->
<button data-bs-toggle="modal" id="trigger-register" hidden data-bs-target="#register-modal"></button>

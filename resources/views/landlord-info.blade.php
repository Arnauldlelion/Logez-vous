@extends('layouts.app')

@section('content')
    <div class="container mb-5" style="margin-top:8rem">
        <div class="shadow-lg bg-white p-3 p-lg-5">
            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1 mb-3">
                    <div class="landlord-info">
                        <form>
                            <p class="mb-3">Possedez-vous plusieurs logements</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" value="single">
                                <label class="form-check-label">Je possede un seul logement</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" value="many">
                                <label class="form-check-label">Je possede plusieurs logements</label>
                            </div>
                            <div class="mt-3">
                                <textarea class="form-control" cols="30" rows="10" placeholder="Entrez une description du/des logement(s)"></textarea>
                            </div>

                            <p class="mt-5">Ou se situe votre logement?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="location" value="town">
                                <label class="form-check-label">Town</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="location" value="quartier">
                                <label class="form-check-label">Quartier</label>
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Combien de piece possede t'il</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div style="margin-right: 10px; font-weight: bold">Studio</div>
                                    @foreach ([1, 2, 3, 4, '5+'] as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rooms"
                                                value="{{ $item }}">
                                            <label class="form-check-label">{{ $item }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <p class="mt-5">Recherchez-vous un locataire?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="looking" value="dont_have">
                                <label class="form-check-label">Oui je recherche un locataire</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="looking" value="have">
                                <label class="form-check-label">Non j'ai deja un locataire</label>
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Le logement serait il louer meuble?</p>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rents" value="yes">
                                        <label class="form-check-label">Oui</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rents" value="no">
                                        <label class="form-check-label">Non</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Superficie approximative du logement</p>
                                <input type="text">
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Montant approximatif du loyer</p>
                                <input type="text">
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Quand etes vous disponible</p>
                                <input type="datetime-local">
                            </div>

                            <div class="divider my-3"></div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-outline-main" href="#">Retour</a>
                                <button class="btn btn-main" type="submit">Valider les informations</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 mb-3">
                    <img src="/storage/images/house.png" alt="{{ config('app.name') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

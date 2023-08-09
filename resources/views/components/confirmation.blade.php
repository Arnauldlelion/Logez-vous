@extends('layouts.app')

@section('content')

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class=" auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="container col-lg-10">
            <div class="card-body">
                 <!-- title-->
                 <div class="d-flex align-items-center mb-5">
                    <img src="{{ asset('storage/images/logos/devis.png') }}" alt="" height="64">
                    <h1 class="text-danger">Votre devis</h1>
                </div>

                 <!-- form -->
                 <form action="" method="POST">
                    @csrf

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="lastname" class="col-sm-2 col-form-label-sm">Prénom</label>
                        <div class="col-12 col-lg-7">
                            <input class="form-control rounded-pill form-control-sm @error('lastname') is-invalid @enderror" type="text"
                            id="lastname" required=""
                            value="{{ old('lastname') }}"
                            name="lastname"
                            autofocus
                            placeholder="Idris">
                            @error('lastname')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="firstname" class="col-sm-2 col-form-label-sm">Nom</label>
                        <div class="col-12 col-lg-7">
                            <input class="form-control rounded-pill form-control-sm @error('firstname') is-invalid @enderror" type="text"
                               id="firstname" required=""
                               value="{{ old('firstname') }}"
                               name="firstname"
                               autofocus
                               placeholder="Kandem">
                        @error('firstname')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="tel_number" class="col-sm-2 col-form-label-sm">Numéro de téléphone</label>
                        <div class="col-12 col-lg-7">
                            <input class="form-control rounded-pill form-control-sm @error('tel_number') is-invalid @enderror" type="number"
                               id="tel_number" required=""
                               value="{{ old('tel_number') }}"
                               name="tel_number"
                               autofocus
                               placeholder="Idris">
                        @error('tel_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="emailaddress" class="col-sm-2 col-form-label-sm">Adresse email</label>
                        <div class="col-12 col-lg-7">
                            <input class="form-control rounded-pill form-control-sm @error('email') is-invalid @enderror" type="email"
                            id="emailaddress" required=""
                            value="{{ old('email') }}"
                            name="email"
                            autofocus
                            placeholder="idriskandem@gmail.com">
                     @error('email')
                     <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                        </div>
                      </div>

                      <div class="form-check align-items-center">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label col-form-label-sm " for="flexCheckDefault">
                            Je souhaite recevoir des mails d'informations liées à l’actualité immobilière de la part de Flatlooker.
                        </label>
                      </div>

                </form>
                <!-- end form-->
               </div>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right">
        <div class="auth-user-testimonial">
            <span>Estelle, Consultante immobilier</span><br>
            <small>Chez Logez-vous depuis 2 ans</small>
            <hr class="my-4">
            <div class="d-flex align-items-center gap-4 mb-4">
                <div>
                    <img src="{{ asset('storage/images/logos/hand-green.png') }}" alt="" height="54"> 
                </div>
                <div>
                    <h6>Déléguer 100% de la gestion de vos biens</h6>
                    <small>Laissez notre équipe immobilière résoudre les problèmes de gestion à votre place.</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-4">
                <div>
                    <img src="{{ asset('storage/images/logos/loop-green.png') }}" alt="" height="54"> 
                </div>
                <div>
                    <span>Trouver un locataire sérieux en 10 jours</span>
                    <small>Avec plus 15 000 mises en locations effectuées, notre équipe sait trouver des locataires fiables rapidement.</small>
                </div>
            </div>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

</div>



@extends('layouts.app')

@section('content')

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class=" auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- title-->
                        <div class="d-flex align-items-center my-5">
                            <img src="{{ asset('storage/images/logos/devis.png') }}" alt="" height="64">
                            <h1 class="text-danger">Rapport de Gestion</h1>
                        </div>

                        <!-- form -->
                        <form action="{{ route('landlord.rapports.store') }}" method="POST">
                            @csrf

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="annee_construction" class="col-sm-2 col-form-label-sm">Année de construction</label>
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('annee_construction') is-invalid @enderror"
                                        type="date" id="annee_construction" value="{{ old('annee_construction') }}" name="annee_construction"
                                        placeholder="">
                                    @error('annee_construction')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="nombreDeLocataire" class="col-sm-2 col-form-label-sm">Nombre de locataires</label>
                                <div class="col-12 col-lg-7">
                                    <input name="nombreDeLocataire"
                                        class="form-control rounded-pill form-control-sm @error('nombreDeLocataire') is-invalid @enderror"
                                        type="number" id="nombreDeLocataire" value="{{ old('nombreDeLocataire') }}"
                                        >
                                    @error('nombreDeLocataire')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="dureeDuLocataire" class="col-sm-2 col-form-label-sm">Durée du locataire</label>
                                <div class="col-12 col-lg-7">
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('dureeDuLocataire') is-invalid @enderror"
                                        type="text" id="dureeDuLocataire"
                                        value="{{ old('dureeDuLocataire') }}" name="dureeDuLocataire" autofocus
                                        placeholder="5 ans, 3 moi">
                                    @error('dureeDuLocataire')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100 mb-5">
                              <div class="text-black float-start">
                                  <a href="{{ route('landlord.apartments.showRapports', session('new_apt_id')) }}" class="text-secondary">
                                      Retour
                                  </a>
                              </div>
                              <button type="submit" class="btn btn-danger rounded-pill float-end">Ajouter</button>
                          </div>
                        </form>
                        <!-- end form-->
                    </div>

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->

        </div>
    </div>
    <!-- end auth-fluid-->

@endsection
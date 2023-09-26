<!-- form du proprietaire -->


@extends('web.layouts.app')

@section('content')

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class=" auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- title-->
                        <div class="d-flex align-items-center mb-5 mt-5">
                            <img src="{{ asset('storage/images/logos/devis.png') }}" alt="" height="64">
                            <h1 class="text-danger">Ajouter vos informations</h1>
                        </div>

                        <!-- form -->
                        <form action="{{ route('admin.property.store') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="name" class="col-sm-2 col-form-label-sm">Votre Nom</label>
                                <div class="col-12 col-lg-7">
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('name') is-invalid @enderror"
                                        type="text" id="name" value="{{ old('name') }}" name="name">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="apartmentType" class="col-sm-2 col-form-label-sm">Type d'Appartment</label>
                                <div class="col-12 col-lg-7">
                                    {{-- <input class="form-control rounded-pill form-control-sm @error('appartmentType') is-invalid @enderror" type="text"
                               id="appartmentType"
                               value="{{ old('appartmentType') }}"
                               name="appartmentType"
                               placeholder="chambre,studio,apartment 2chambre"> --}}

                                    @forelse (\App\Models\ApartmentType::all() as $apt_type)
                                        <div class="d-flex gap-3">
                                            <input type="checkbox" class="form-check-input" name="apartmentType[]" value={{ $apt_type->id }}
                                                id="">
                                            <label for="form-check-input">{{ $apt_type->name }}</label>
                                        </div>
                                    @empty
                                        <div>Aucun type d'appartement n'a ete ajoute. Contacter l'administrateur svp.</div>
                                    @endforelse
                                    @error('apartmentType')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="location" class="col-sm-2 col-form-label-sm">Emplacement</label>
                                <div class="col-12 col-lg-7">
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('location') is-invalid @enderror"
                                        type="text" id="location" value="{{ old('location') }}" name="location"
                                        placeholder="Douala,Bonanjo">
                                    @error('location')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="landlord" class="col-sm-2 col-form-label-sm">Landlord</label>
                                <div class="col-12 col-lg-7">
                                    <select class="form-control rounded-pill form-control-sm @error('landlord') is-invalid @enderror"
                                        id="landlord" name="landlord">
                                        <option value="">
                                            propriétaire</option>
                                        @foreach ($landlords as $landlord)
                                            <option value="{{ $landlord->id }}">{{ $landlord->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('landlord')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100 mb-5">
                                <div class="text-black float-start">
                                    <a href="{{ route('admin.property.index') }}" class="text-secondary">
                                        <i class="mdi mdi-chevron-left text-secondary"></i>
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
        <!-- end auth-fluid-form-box-->
    </div>
    <!-- end auth-fluid-->

    </div>

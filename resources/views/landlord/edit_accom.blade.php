@extends('layouts.app')

@section('content')
    <div class="container mb-5" style="margin-top:8rem">
        <div class="shadow-lg bg-white p-3 p-lg-5">
            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1 mb-3">
                    <div class="landlord-info">
                        <form method="POST" action="{{ route('landlord.update', $property->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <p class="mb-3">Possedez-vous plusieurs logements</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('accomodation') is-invalid @enderror"
                                    {{ $property->accomodation == 'single' ? 'checked' : '' }} type="radio"
                                    name="accomodation" value="{{ old('accomodation', 'single') }}">
                                <label class="form-check-label">Je possede un seul logement</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('accomodation') is-invalid @enderror"
                                    {{ $property->accomodation == 'many' ? 'checked' : '' }} type="radio"
                                    name="accomodation" value="{{ old('accomodation', 'many') }}">
                                <label class="form-check-label">Je possede plusieurs logements</label>
                            </div><br>
                            @error('accomodation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            <div class="mt-3">
                                <p class="mt-5">Description?</p>
                                <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"
                                    name="description" placeholder="Entrez une description du/des logement(s)">{{ old('description', $property->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <p class="mt-5">Ou se situe votre logement?</p>
                                <input type="text" name="location" value="{{ old('location', $property->location) }}"
                                    class="form-control @error('location') is-invalid @enderror">
                                @error('location')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <p class="mt-5"> type(s) d'accomodation?</p>
                                <div class="form-check">
                                    <input class="form-check-input" {{ in_array('room', $property->type) ? 'checked' : ''}} type="checkbox" name="type[]"
                                        value="{{ old('type', 'room') }}">
                                    <label class="form-check-label">Chambre</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" {{ in_array('studio', $property->type) ? 'checked' : ''}} type="checkbox" name="type[]"
                                        value="{{ old('type', 'studio') }}">
                                    <label class="form-check-label">Studio</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" {{ in_array('apartment', $property->type) ? 'checked' : ''}} type="checkbox" name="type[]"
                                        value="{{ old('type', 'apartment') }}">
                                    <label class="form-check-label">Appartement</label>
                                </div>
                                @error('type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="location" value="town">
                                <label class="form-check-label">Town</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="location" value="quarter">
                                <label class="form-check-label">Quartier</label>
                            </div> --}}

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Combien de piece possede t'il</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div style="margin-right: 10px; font-weight: bold">Studio</div>
                                    @foreach ([1, 2, 3, 4, '5+'] as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                {{ $property->number_of_rooms == $item ? 'checked' : '' }} type="radio"
                                                name="number_of_rooms" value="{{ $item }}">
                                            <label class="form-check-label">{{ $item }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('number_of_rooms')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <p class="mt-5">Recherchez-vous un locataire?</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="need_tenant"
                                    {{ $property->need_tenant == 'yes' ? 'checked' : '' }}
                                    value="{{ old('need_tenant', 'yes') }}">
                                <label class="form-check-label">Oui je recherche un locataire</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="need_tenant"
                                    {{ $property->need_tenant == 'no' ? 'checked' : '' }}
                                    value="{{ old('need_tenant', 'no') }}">
                                <label class="form-check-label">Non j'ai deja un locataire</label>
                            </div><br>
                            @error('need_tenant')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Le logement serait il louer meuble?</p>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="furnished"
                                            {{ $property->furnished == 'yes' ? 'checked' : '' }}
                                            value="{{ old('furnished', 'yes') }}">
                                        <label class="form-check-label">Oui</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="furnished"
                                            {{ $property->furnished == 'no' ? 'checked' : '' }}
                                            value="{{ old('furnished', 'no') }}">
                                        <label class="form-check-label">Non</label>
                                    </div>
                                </div>
                                @error('furnished')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Superficie approximative du logement</p>
                                <input type="text" class="@error('approx_surface_area') is-invalid @enderror"
                                    name="approx_surface_area"
                                    value="{{ old('approx_surface_area', $property->approx_surface_area) }}">
                                @error('approx_surface_area')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Montant approximatif du loyer</p>
                                <input type="text" class="@error('monthly_rent_price') is-invalid @enderror"
                                    name="monthly_rent_price"
                                    value="{{ old('monthly_rent_price', $property->monthly_rent_price) }}">
                                @error('monthly_rent_price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-5 d-lg-flex align-items-center justify-content-between">
                                <p class="mb-3 mb-lg-0">Quand etes vous disponible</p>
                                <input type="date" class="@error('availability_date') is-invalid @enderror"
                                    name="availability_date"
                                    value="{{ old('availability_date', $property->availability_date) }}">
                                @error('availability_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="divider my-3"></div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-outline-main" href="#">Retour</a>
                                <button type="submit" class="btn btn-main">Valider les informations</button>
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

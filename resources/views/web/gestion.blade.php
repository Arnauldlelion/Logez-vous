{{-- @extends('web.layouts.app')

@section('content')
    @include('sweetalert::alert')
    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class=" auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- title-->

                        <!-- form -->
                        <form action="{{ route('register') }}" method="POST" style="padding-top: 20%">
                            @csrf
                            <div class="form-group mb-3">
                                <input class="form-control rounded-pill @error('first_name') is-invalid @enderror"
                                    type="text" value="{{ old('first_name') }}" name="first_name" placeholder="Prénom">
                                @error('first_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control rounded-pill @error('last_name') is-invalid @enderror"
                                    type="text" value="{{ old('last_name') }}" name="last_name" placeholder="Nom">
                                @error('last_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 ">
                                <input class="form-control rounded-pill @error('email') is-invalid @enderror" type="email"
                                    value="{{ old('email') }}" name="email" placeholder="Adresse email">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- <div class="intl-tel-input form-group mb-3 rounded-pill">
                            <div class="selected-flag rounded-start-pill"></div>
                             <input type="tel" class="form-control rounded-pill w-100" name="phone" id="phoneNumber" placeholder="Enter phone number">
                        </div> -->
                            <div class="form-group mb-3">
                                <input class="form-control rounded-pill @error('phone') is-invalid @enderror" type="number"
                                    value="{{ old('phone') }}" name="phone" placeholder="Numero">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 ">
                                <input class="form-control rounded-pill @error('location') is-invalid @enderror"
                                    type="text" id="location" value="{{ old('phone') }}" name="location"
                                    placeholder="emplacement de votre propriété e.g Douala,Bonajo"
                                    style="width: 100% !important">
                                @error('location')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="d-flex gap-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="furnished"
                                            id="flexRadioDefault2" value="Non meublé"
                                            {{ old('furnished') == 'Non meublé' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Non meublé
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="furnished"
                                            id="flexRadioDefault1" value="Meublé"
                                            {{ old('furnished') == 'Meublé' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Meublé
                                        </label>
                                    </div>
                                </div>
                                @error('furnished')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <div class="col-12 col-lg-7">
                                    <label for="monthly_price" class="col-sm-2 col-form-label-sm">Loyer experer</label>
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('monthly_price') is-invalid @enderror"
                                        type="text" id="monthly_price" value="{{ old('monthly_price') }}"
                                        name="monthly_price" placeholder="100,000">
                                    @error('monthly_price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="description">Dèscription de votre bien <em>*</em></label>
                                    <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5"
                                        name="description" placeholder="">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class=" mb-5" style="padding-bottom: 15%">
                                <div class="text-black float-start">
                                    <a href="{{ route('index') }}" class="text-secondary">
                                        Retour
                                    </a>
                                </div>
                                <button id="registerButton" type="submit"
                                    class="btn btn-danger rounded-pill float-end">s'enregistrer</button>
                                <div id="popupContainer">
                                    <div id="popupContent">
                                        <h2>Merci</h2>
                                        <p>Vos informations ont été reçues avec succès. Un agent vous recontactera.</p>
                                        <button id="closeButton">OK</button>
                                    </div>
                                </div>
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

    </div> --}}

@extends('web.layouts.app')

@section('content')
    @include('sweetalert::alert')
    <div class="auth-fluid">
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- Rest of your content -->
                        <div class="card-body">
                            <!-- title-->

                            <!-- form -->
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input class="form-control rounded-pill @error('first_name') is-invalid @enderror"
                                        type="text" value="{{ old('first_name') }}" name="first_name"
                                        placeholder="Prénom">
                                    @error('first_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control rounded-pill @error('last_name') is-invalid @enderror"
                                        type="text" value="{{ old('last_name') }}" name="last_name" placeholder="Nom">
                                    @error('last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 ">
                                    <input class="form-control rounded-pill @error('email') is-invalid @enderror"
                                        type="email" value="{{ old('email') }}" name="email"
                                        placeholder="Adresse email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- <div class="intl-tel-input form-group mb-3 rounded-pill">
                                  <div class="selected-flag rounded-start-pill"></div>
                                   <input type="tel" class="form-control rounded-pill w-100" name="phone" id="phoneNumber" placeholder="Enter phone number">
                              </div> -->
                                <div class="form-group mb-3">
                                    <input class="form-control rounded-pill @error('phone') is-invalid @enderror"
                                        type="number" value="{{ old('phone') }}" name="phone" placeholder="Numero">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 ">
                                    <input class="form-control rounded-pill @error('location') is-invalid @enderror"
                                        type="text" id="location" value="{{ old('phone') }}" name="location"
                                        placeholder="emplacement de votre propriété e.g Douala,Bonajo"
                                        style="width: 100% !important">
                                    @error('location')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                    <div class="d-flex gap-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="furnished"
                                                id="flexRadioDefault2" value="Non meublé"
                                                {{ old('furnished') == 'Non meublé' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Non meublé
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="furnished"
                                                id="flexRadioDefault1" value="Meublé"
                                                {{ old('furnished') == 'Meublé' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Meublé
                                            </label>
                                        </div>
                                    </div>
                                    @error('furnished')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <div class="col-12 col-lg-7">
                                        <label for="monthly_price" class="col-sm-2 col-form-label-sm">Loyer experer</label>
                                        <input
                                            class="form-control rounded-pill form-control-sm @error('monthly_price') is-invalid @enderror"
                                            type="text" id="monthly_price" value="{{ old('monthly_price') }}"
                                            name="monthly_price" placeholder="100,000">
                                        @error('monthly_price')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                    <div class="col-12 col-lg-7">
                                        <label for="description">Dèscription de votre bien <em>*</em></label>
                                        <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5"
                                            name="description" placeholder="">{{ old('description') }}</textarea>

                                        @error('description')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class=" mb-5" style="padding-bottom: 15%">
                                    <div class="text-black float-start">
                                        <a href="{{ route('index') }}" class="text-secondary">
                                            Retour
                                        </a>
                                    </div>
                                    <button id="registerButton" type="submit"
                                        class="btn btn-danger rounded-pill float-end">s'enregistrer</button>
                                    <div id="popupContainer">
                                        <div id="popupContent">
                                            <h2>Merci</h2>
                                            <p>Vos informations ont été reçues avec succès. Un agent vous recontactera.</p>
                                            <button id="closeButton">OK</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- end form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    @extends('web.layouts.app')

    @section('content')
        <div class="auth-fluid">
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="container col-lg-10">
                        <div class="card-body">
                            <div class="card-body">
                                <!-- title-->
                                <div class="d-flex align-items-center mb-5 mt-5">
                                    <h1 class="text-danger">Detail de votre appartment</h1>
                                </div>

                                <!-- form -->
                                <form action="{{ route('admin.apartments.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <label for="name" class="col-sm-2 col-form-label-sm">Nom de
                                            l'Appartement</label>
                                        <div class="col-12 col-lg-7">
                                            <input
                                                class="form-control rounded-pill form-control-sm @error('name') is-invalid @enderror"
                                                type="text" id="name" value="{{ old('name') }}" name="name"
                                                placeholder="T48, Apart 237">
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <label for="nombre_of_pieces" class="col-sm-2 col-form-label-sm">Nombre </label>
                                        <div class="col-12 col-lg-7">
                                            <input
                                                class="form-control rounded-pill form-control-sm @error('nombre_of_pieces') is-invalid @enderror"
                                                type="number" id="nombre_of_pieces" value="{{ old('nombre_of_pieces') }}"
                                                name="nombre_of_pieces">
                                            @error('nombre_of_pieces')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <label for="floor" class="col-sm-2 col-form-label-sm">Niveau d'etage</label>
                                        <div class="col-12 col-lg-7">
                                            <input
                                                class="form-control rounded-pill form-control-sm @error('floor') is-invalid @enderror"
                                                type="number" id="floor" value="{{ old('floor') }}" name="floor"
                                                placeholder="8">
                                            @error('floor')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
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
                                                    {{ old('furnished') == 'Mublé' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Meublé
                                                </label>
                                            </div>
                                        </div>
                                        @error('furnished')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <label for="monthly_price" class="col-sm-2 col-form-label-sm">Prix</label>
                                        <div class="col-12 col-lg-7">
                                            <input
                                                class="form-control rounded-pill form-control-sm @error('monthly_price') is-invalid @enderror"
                                                type="number" id="monthly_price" value="{{ old('monthly_price') }}"
                                                name="monthly_price" placeholder="100,000">
                                            @error('monthly_price')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <label for="number_of_pieces" class="col-sm-2 col-form-label-sm">Nombre de
                                            Pièces</label>
                                        <div class="col-12 col-lg-7">
                                            <input
                                                class="form-control rounded-pill form-control-sm @error('number_of_pieces') is-invalid @enderror"
                                                type="number" id="number_of_pieces" value="{{ old('number_of_pieces') }}"
                                                name="number_of_pieces">
                                            @error('number_of_pieces')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <label for="size" class="col-sm-2 col-form-label-sm">Superficie</label>
                                        <div class="col-12 col-lg-7">
                                            <input
                                                class="form-control rounded-pill form-control-sm @error('size') is-invalid @enderror"
                                                type="text" id="size" value="{{ old('size') }}" name="size"
                                                placeholder="10x10, 40">
                                            @error('size')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5 d-block d-lg-flex align-items-center ">
                                        <div class="col-12 col-lg-7">
                                            <label>Image de couverture</label>
                                            <input type="file" class="form-control" id="cover_image" accept="image/*"
                                                name="cover_image">
                                            @error('cover_image')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row mb-5 d-block d-lg-flex ">
                                        <label for="description" class="col-sm-2 col-form-label-sm">Dèscription
                                            <em>*</em></label>
                                        <div class="col-12 col-lg-7">
                                            <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="8"
                                                name="description" placeholder="">{{ old('description') }}</textarea>

                                            @error('description')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-100 mb-5" style="padding-bottom: 10%">
                                        <div class="text-black float-start">
                                            <a href="{{ route('admin.property.show', session('new_prop_id')) }}"
                                                class="text-secondary">
                                                Retour
                                            </a>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-danger rounded-pill float-end">Ajouter</button>
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

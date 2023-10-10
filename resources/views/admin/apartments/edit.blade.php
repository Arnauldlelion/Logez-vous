@extends('web.layouts.app')

@section('content')

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class=" auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- title-->
                        <div class="d-flex align-items-center mb-5 mt-5" style="padding-top: 10%">
                           
                            <h1 class="text-danger">Detail de votre appartement</h1>
                        </div>

                        <!-- form -->
                        <form action="{{ route('admin.apartments.update', $apt->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="property" class="col-sm-2 col-form-label-sm">Property Category </label>
                        <div class="col-12 col-lg-7">
                            <select name="property"
                            class="form-control {{ $errors->has('property') ? ' is-invalid' : '' }}">
                            <option selected disabled hidden>Select property</option>
                            @foreach ($properties as $property)
                                <option value="{{ $property->id }}" {{ old('property') == $property->id ? 'selected' : '' }}>
                                    {{ $property->name }}</option>
                            @endforeach
                            </select>
                            @error('property')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div> --}}

                            {{-- <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="appartment_type" class="col-sm-2 col-form-label-sm">appartment_type Category </label>
                        <div class="col-12 col-lg-7">
                            <select name="appartment_type"
                            class="form-control {{ $errors->has('appartment_type') ? ' is-invalid' : '' }}">
                            <option selected disabled hidden>Select appartment_type</option>
                            @foreach ($appartment_types as $appartment_type)
                                <option value="{{ $appartment_type->id }}" {{ old('appartment_type') == $appartment_type->id ? 'selected' : '' }}>
                                    {{ $appartment_type->name }}</option>
                            @endforeach
                            </select>
                            @error('appartment_type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div> --}}

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="name" class="col-sm-2 col-form-label-sm">Nom de l'Appartement</label>
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('name') is-invalid @enderror"
                                        type="text" id="name" value="{{ old('name', $apt->name) }}" name="name"
                                        placeholder="T48, Apart 237">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="published">Disponibilité</label>
                                <select class="form-control" name="published" id="published">
                                    <option value="0" {{ $apt->published == 0 ? 'selected' : '' }}>Non Disponible</option>
                                    <option value="1" {{ $apt->published == 1 ? 'selected' : '' }}>Disponible</option>
                                </select>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                  
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="floor" class="col-sm-2 col-form-label-sm">Niveau d'etage</label>
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('floor') is-invalid @enderror"
                                        type="number" id="floor" value="{{ old('floor', $apt->floor) }}" name="floor"
                                        placeholder="8">
                                    @error('floor')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="d-flex gap-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="furnished"
                                            id="flexRadioDefault2" {{ $apt->furnished == 'Non meublé' ? 'checked' : '' }}
                                            value="Non meublé">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Non meublé
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="furnished"
                                            id="flexRadioDefault1" {{ $apt->furnished == 'Meublé' ? 'checked' : '' }}
                                            value="Meublé">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Meublé
                                        </label>
                                    </div>
                                </div>
                                @error('furnished')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <div class="col-12 col-lg-7">
                                    <label for="monthly_price" class="col-sm-2 col-form-label-sm">Prix</label>
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('monthly_price') is-invalid @enderror"
                                        type="number" id="monthly_price"
                                        value="{{ old('monthly_price', $apt->monthly_price) }}" name="monthly_price"
                                        placeholder="100,000">
                                    @error('monthly_price')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="number_of_appartments" class=" col-form-label-sm">Nombre de pieces</label>
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('number_of_pieces') is-invalid @enderror"
                                        type="number" id="number_of_pieces"
                                        value="{{ old('number_of_pieces', $apt->number_of_pieces) }}"
                                        name="number_of_pieces"
                                        placeholder="2">
                                    @error('number_of_pieces')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="size" class="col-sm-2 col-form-label-sm">Superficie</label>
                                <div class="col-12 col-lg-7">
                                    <input class="form-control rounded-pill form-control-sm @error('size') is-invalid @enderror" type="text"
                                       id="size" required=""
                                       value="{{ old('size', $apt->size) }}"
                                       name="size"
                                       placeholder="10x10, 40">
                                @error('size')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                </div>
                              </div>

                            @if ($apt->coverImage)
                                <div class="form-group mb-1">
                                    <label for="existing_cover_image">Image de couverture existante</label>
                                    <br>
                                    <img src="{{ asset('storage/' . $apt->coverImage->url) }}" alt="Image de couverture existante" style="max-width: 120px; max-height: 90px;">
                                </div>
                            @endif
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                  <label>Image de couverture</label>
                              <input type="file" class="form-control" id="cover_image" accept="image/*" name="cover_image">
                              @error('cover_image')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                    <label for="description">Description <em>*</em></label>
                                    <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5"
                                        name="description" placeholder="">{{ old('description', $apt->description) }}</textarea>

                                    @error('description')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-100 mb-5" style="padding-bottom: 10%">
                                <div class="text-black float-start">
                                    <a href="{{ route('admin.property.show', session('new_prop_id')) }}" class="text-secondary">
                                        Retour
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-danger rounded-pill float-end">Mettre à jour</button>
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

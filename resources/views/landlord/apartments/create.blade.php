
@extends('layouts.app')

@section('content')

<div class="auth-fluid" >
    <!--Auth fluid left content -->
    <div class=" auth-fluid-form-box" >
        <div class="align-items-center d-flex h-100" >
            <div class="container col-lg-10">
            <div class="card-body">
                 <!-- title-->
                 <div class="d-flex align-items-center mb-5 mt-5">
                    <img src="{{ asset('storage/images/logos/devis.png') }}" alt="" height="64">
                    <h1 class="text-danger">Detail de votre appartment</h1>
                </div>

                 <!-- form -->
                 <form action="{{ route('landlord.apartments.store') }}" method="POST">
                    @csrf


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
                            <label for="floor" class="col-sm-2 col-form-label-sm">Niveau d'etage</label>
                            <input class="form-control rounded-pill form-control-sm @error('floor') is-invalid @enderror" type="text"
                            id="floor"
                            value="{{ old('floor') }}"
                            name="floor"
                            placeholder="8">
                            @error('floor')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                         <div class="d-flex gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="furnished" id="flexRadioDefault2" value="Non meublé">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Non meublé
                                </label>
                              </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="furnished" id="flexRadioDefault1" value="Meublé">
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
                            <input class="form-control rounded-pill form-control-sm @error('monthly_price') is-invalid @enderror" type="text"
                               id="monthly_price"
                               value="{{ old('monthly_price') }}"
                               name="monthly_price"
                               placeholder="100,000">
                        @error('monthly_price')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>


                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                          <div class="col-12 col-lg-7">
                            <label for="number_of_appartments" class=" col-form-label-sm">Nombre de pieces</label>
                            <input class="form-control rounded-pill form-control-sm @error('number_of_appartments') is-invalid @enderror" type="number"
                               id="number_of_appartments"
                               value="{{ old('number_of_appartments') }}"
                               name="number_of_appartments">
                        @error('number_of_appartments')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <div class="col-12 col-lg-7">
                        <label for="description">Dèscription  <em>*</em></label>
                        <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                  rows="5"
                                  name="description"
                                  placeholder=""
                                  >{{ old('description') }}</textarea>
    
                        @error('description')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        </div>
                      </div>

                      <div class="w-100 mb-5">
                        <div class="text-black float-start">
                            <a href="{{ route('landlord.property.show', session('new_prop_id')) }}" class="text-secondary">
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



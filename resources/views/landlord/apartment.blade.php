
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
                 <form action="" method="POST">
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
                            <label for="floor_level" class="col-sm-2 col-form-label-sm">Niveau</label>
                            <input class="form-control rounded-pill form-control-sm @error('floor_level') is-invalid @enderror" type="text"
                            id="floor_level" required=""
                            value="{{ old('floor_level') }}"
                            name="floor_level"
                            autofocus
                            placeholder="Idris">
                            @error('floor_level')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                      
                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                         <div class="d-flex gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Non meublé
                                </label>
                              </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Meublé
                                </label>
                              </div>
                         </div>
                         <div class="col-12 col-lg-7">
                            <label for="price" class="col-sm-2 col-form-label-sm">Prix</label>
                            <input class="form-control rounded-pill form-control-sm @error('price') is-invalid @enderror" type="text"
                               id="price" required=""
                               value="{{ old('price') }}"
                               name="price"
                               autofocus
                               placeholder="50000frs/month">
                        @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>


                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                          <div class="col-12 col-lg-7">
                            <label for="appartment_num" class=" col-form-label-sm">Number of appartment</label>
                            <input class="form-control rounded-pill form-control-sm @error('appartment_num') is-invalid @enderror" type="number"
                               id="appartment_num" required=""
                               value="{{ old('appartment_num') }}"
                               name="appartment_num">
                        @error('appartment_num')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <div class="col-12 col-lg-7">
                        <label for="description">Description <em>*</em></label>
                        <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                  rows="5"
                                  name="description"
                                  placeholder="2 parlor,1 kitchen"
                                  >{{ old('description') }}</textarea>
    
                        @error('description')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        </div>
                      </div>

                      <div class="float-end mb-5">
                        <button class="btn btn-danger rounded-pill ">Ajouter</button>
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



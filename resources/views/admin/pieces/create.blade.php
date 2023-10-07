@extends('web.layouts.app')

@section('content')
    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class=" auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- title-->
                        <div class="d-flex align-items-center my-5" style="padding-top: 10%">
                            
                            <h1 class="text-danger">Pièce</h1>
                        </div>

                        <!-- form -->
                        <form action="{{ route('admin.pieces.store') }}" method="POST">
                            @csrf

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="pieces_types_id" class="col-sm-2 col-form-label-sm">Type de piece</label>
                                <div class="col-12 col-lg-7">
                                    {{-- <input class="form-control rounded-pill form-control-sm @error('pieces_types_id') is-invalid @enderror" type="text"
                             id="pieces_types_id"
                             value="{{ old('pieces_types_id') }}"
                             name="pieces_types_id"
                             placeholder="chambre,studio,apartment 2chambre"> --}}

                                    @forelse(\App\Models\PieceType::all() as $piece_type)
                                        <div class="d-flex gap-3">
                                            <input type="radio" name="piece_types_id" value={{ $piece_type->id }}
                                                id="">
                                            <label for="">{{ $piece_type->name }}</label>
                                        </div>
                                    @empty
                                        <div>Aucun type de pieces n'a ete ajoute. Contacter l'administrateur svp.</div>
                                    @endforelse
                                    @error('piece_types_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
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

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="size" class="col-sm-2 col-form-label-sm">Superficie</label>
                                <div class="col-12 col-lg-7">
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('size') is-invalid @enderror"
                                        type="text" id="size" value="{{ old('size') }}" name="size"
                                        placeholder="10x10">
                                    @error('size')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <div class="col-12 col-lg-7">
                                <label for="description">Dèscription</label>
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
                            <div class="w-100 mb-5" style="padding-bottom: 10%">
                                <div class="text-black float-start">
                                    <a href="{{ route('admin.apartments.show', session('new_apt_id')) }}"
                                        class="text-secondary">
                                       Retour
                                    </a>
                                </div>
                                <button type="submit" class="btn btn-danger rounded-pill float-end" >Ajouter</button>
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

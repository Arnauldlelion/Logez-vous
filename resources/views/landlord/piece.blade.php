@extends('layouts.app')

@section('content')

<div class="auth-fluid" >
    <!--Auth fluid left content -->
    <div class=" auth-fluid-form-box" >
        <div class="align-items-center d-flex h-100" >
            <div class="container col-lg-10">
            <div class="card-body">
                 <!-- title-->
                 <div class="d-flex align-items-center my-5">
                    <img src="{{ asset('storage/images/logos/devis.png') }}" alt="" height="64">
                    <h1 class="text-danger">Piece</h1>
                </div>

                 <!-- form -->
                 <form action="" method="POST">
                    @csrf

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="piece_num" class="col-sm-2 col-form-label-sm">Nombre de pièce</label>
                        <div class="col-12 col-lg-7">
                            <input class="form-control rounded-pill form-control-sm @error('piece_num') is-invalid @enderror" type="number"
                            id="piece_num" required=""
                            value="{{ old('piece_num') }}"
                            piece_num="piece_num"
                            autofocus>
                            @error('piece_num')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                        <label for="size" class="col-sm-2 col-form-label-sm">Superficie</label>
                        <div class="col-12 col-lg-7">
                            <input class="form-control rounded-pill form-control-sm @error('size') is-invalid @enderror" type="text"
                               id="size" required=""
                               value="{{ old('size') }}"
                               name="size"
                               autofocus
                               placeholder="10x10m2">
                        @error('size')
                        <span class="invalid-feedback">{{ $message }}</span>
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
</div>
<!-- end auth-fluid-->

</div>



@extends('admin.layouts.app')
@section('title', 'Propriétaire')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Propriétaire</li>
                    </ol>
                </div>
                <h4 class="page-title">Créer un Propriétaire</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="px-4">
                    <h4 class="page-title my-2">Entrez les détails du Propriétaire ci-dessous</h4>
                    <form method="post" action="{{route('admin.landlords.store')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="firstname">Nom</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                value="{{ old('name', $landlord->first_name. ' '.$landlord->last_name ?? '') }}" name="name" placeholder="Entrez le nom complète du propriétaire ">
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                value="{{ old('name', $landlord->email ?? '') }}" name="email"
                                       placeholder="Entrez l’adresse e-mail du propriétaire">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="form-group col-sm-6">
                                <label for="phone">Numero</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                value="{{ old('name', $landlord->phone ?? '') }}" name="phone" placeholder="Entrez le numero du propriétaire ">
                                @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-sm-6"></div>
                            <div class="form-group col-sm-6">
                                <label for="password">Mot de passe</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                       id="password" name="password" placeholder="Entrez le mot de passe">
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="password">Confirmer le mot de passe</label>
                                <input class="form-control" type="password" id="password" name="password_confirmation"
                                       placeholder="Confirmer le mot de passe">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="{{route('admin.landlords.index')}}" type="button"
                                       class="btn w-sm btn-light waves-effect">Annuler</a>
                                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Sauvegarder
                                    </button>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </form>
                   
                </div>
            </div> <!-- end card-box-->
        </div>
    </div>


@endsection

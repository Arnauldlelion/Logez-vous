@extends('admin.layouts.app')
@section('title', 'Locataire')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Locataire</li>
                    </ol>
                </div>
                <h4 class="page-title">Modifier</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <div class="px-4">
                    <h4 class="page-title my-2">Modifier les information de {{ $tenant->first_name }}
                        {{ $tenant->last_name }}</h4>
                    <form action="{{ route('admin.tenants.update', $tenant->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('first_name') is-invalid @enderror"
                                type="text" value="{{ old('first_name', $tenant->first_name) }}" name="first_name"
                                placeholder="Prénom">
                            @error('first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('last_name') is-invalid @enderror" type="text"
                                value="{{ old('last_name', $tenant->last_name) }}" name="last_name" placeholder="Nom">
                            @error('last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="form-group mb-3 ">
                            <input class="form-control rounded-pill @error('email') is-invalid @enderror" type="email"
                                value="{{ old('email', $tenant->email) }}" name="email" placeholder="Adresse email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6"></div>

                        <div class="form-group mb-3">
                            <input class="form-control rounded-pill @error('phone') is-invalid @enderror" type="text"
                                value="{{ old('phone', $tenant->phone) }}" name="phone" placeholder="Numero">
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="apartment">Appartement</label>
                            <select class="form-control @error('apartment') is-invalid @enderror" id="apartment"
                                name="apartment">
                                <option value="">Sélectionnez un appartement</option>
                                @foreach ($admin->properties as $property)
                                    @foreach ($property->apartments as $apartment)
                                        <option value="{{ $apartment->id }}"
                                            {{ old('apartment', $tenant->apartment_id) == $apartment->id ? 'selected' : '' }}>
                                            {{ $apartment->name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('apartment')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary float-right" type="submit">Mettre à jour</button>
                    </form>
                </div>
            </div> <!-- end card-box-->
        </div>
    </div>


@endsection

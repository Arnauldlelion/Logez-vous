@extends('layouts.app')

@section('content')
    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class=" auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="container col-lg-10">
                    <div class="card-body">
                        <!-- title-->
                        <div class="d-flex align-items-center my-5">
                            <img src="{{ asset('storage/images/logos/devis.png') }}" alt="" height="64">
                            <h1 class="text-danger">Paiement</h1>
                        </div>

                        <!-- form -->
                        <form action="{{ route('landlord.payments.store') }}" method="POST">
                            @csrf


                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="prices" class="col-sm-2 col-form-label-sm">Commision</label>
                                <div class="col-12 col-lg-7">
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('prices') is-invalid @enderror"
                                        type="text" id="prices" value="{{ old('prices') }}" name="prices"
                                        placeholder="70,000 XAF">
                                    @error('prices')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 d-block d-lg-flex align-items-center gap-5">
                                <label for="commission" class="col-sm-2 col-form-label-sm">Prix</label>
                                <div class="col-12 col-lg-7">
                                    <input
                                        class="form-control rounded-pill form-control-sm @error('commission') is-invalid @enderror"
                                        type="text" id="commission" 
                                        value="{{ old('commission') }}" name="commission"
                                        placeholder="5%">
                                    @error('commission')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-100 mb-5">
                                <div class="text-black float-start">
                                    <a href="{{ route('landlord.apartments.showPayments', session('new_apt_id')) }}" class="text-secondary">
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
    </div>
    <!-- end auth-fluid-->
@endsection

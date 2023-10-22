@extends('admin.layouts.app')
@section('title', $landlord->first_name)

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.administrator.index') }}">Gestionnaire</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $landlord->first_name}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $landlord->first_name}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">

                <h4 class="mb-0">{{ $landlord->first_name }}</h4>
                <p class="text-muted">{{ $landlord->email }}</p>
                <hr>
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13">
                        <strong>Name :</strong> <span class="ml-2">{{ $landlord->first_name }} {{ $landlord->last_name }}</span>
                    </p>
                    <p class="text-muted mb-2 font-13">
                        <strong>Numéro de téléphone :</strong> <span class="ml-2 ">{{ $landlord->phone}}</span></p>
                    <p class="text-muted mb-2 font-13">
                        <strong>Email :</strong> <span class="ml-2 ">{{ $landlord->email }}</span></p>
                        <a href="{{ route('admin.landlord.create', $landlord->id) }}" class="btn btn-success  btn-sm mr-1">
                            Approuver</a>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-box">
                <h4>Emplacement</h4>
                {!! $landlord->location ?: '--' !!}
                <h4 class="mt-4">A propos</h4>
                {!! $landlord->description ?: '--' !!}
                
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Propriétaire</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $landlord->first_Name }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $landlord->first_Name }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                {{-- <img src="{{ $user->profileURL() }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"> --}}

                <h4 class="mb-0">{{ $landlord->name }}</h4>
                <p class="text-muted">{{ $landlord->email }}</p>
                <hr>
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13">
                        <strong>Nom :</strong> <span class="ml-2">{{ $landlord->name }}</span>
                    </p>
                    <p class="text-muted mb-2 font-13">
                        <strong>Email :</strong> <span class="ml-2 ">{{ $landlord->email }}</span></p>
                        <p class="text-muted mb-2 font-13">
                            <strong>Numéro de téléphone :</strong> <span class="ml-2">{{ $landlord->phone  }}</span>
                        </p>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-box">
                <h4  class="my-4">Description</h4>
                {!! $landlord->description ?: '--' !!}
                <h3>Bien Immobillier</h3>
                @if ($landlord->properties->count() > 0)
                    <ul>
                        @foreach ($landlord->properties as $property)
                            <li>{{ $property->name }} ({{$property->location}})</li>
                            <!-- Display other property details -->
                        @endforeach
                    </ul>
                @else
                    <p>Aucune bien immobillier trouvée.</p>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

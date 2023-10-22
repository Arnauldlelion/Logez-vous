@extends('landlord.layouts.app')

@section('content')
    <h2 class="page-title text-capitalize mb-3">Mes Logements</h2>
    <div class="table-responsive">
        <table class="table table-centered table-striped">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>Nom</th>
                    <th>Nombre d'Appartement</th>
                    <th>Emplacement</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                    <tr role="row">
                        <td>{{ $loop->index + 1 }}</td>
                        <td> {{ $property->name }}</td>
                        <td> <a href="{{ route('apartments.show', ['propertyId' => $property->id]) }}"
                                class="btn btn-success btn-sm align-items-center">
                                {{ $property->apartments->count() }} Appartement.s <i class="fas fa-eye eye-icon"></i> </td>
                        <td> {{ $property->location }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucun enregistrement trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- {{ $admins->appends($search)->links()}} --}}
@endsection

@section('footer_script')
    <script></script>
@endsection

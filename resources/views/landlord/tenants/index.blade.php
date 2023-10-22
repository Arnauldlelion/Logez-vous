@extends('landlord.layouts.app')

@section('content')

    <h2 class="page-title text-capitalize mb-3">Mes Locataire</h2>
    <div class="table-responsive">
        <table class="table table-centered table-striped">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>Locataires</th>
                    <th>Appartement</th>
                    <th>Propriété</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tenants as $tenant)
                    <tr role="row">
                        <td>{{ $loop->index + 1 }}</td>
                    
                                <td>{{ $tenant->first_name }} {{ $tenant->last_name }}</td>
                                <td>{{ $tenant->apartment->name }}</td>
                                <td>{{ $tenant->apartment->property->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucun enregistrement trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


@endsection

@section('footer_script')
    <script></script>
@endsection

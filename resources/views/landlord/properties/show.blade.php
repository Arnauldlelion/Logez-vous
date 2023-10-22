@extends('landlord.layouts.app')

@section('content')

<h2 class="page-title text-capitalize mb-3">Appartement de {{ $property->name}}</h2>
    <div class="table-responsive">
        <table class="table table-centered table-striped">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                @forelse($property->apartments as $apartment)
                <tr role="row">
                    <td>{{ $loop->index + 1 }}</td>
                    <td> {{ $apartment->name }}</td>
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

@extends('landlord.layouts.app')

@section('content')

    <div class="table-responsive">
        <table class="table table-centered table-striped">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>Nom</th>
                    <th>Emplacement</th>
                    {{-- <th>Nombre d'Appartement</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                    <tr role="row">
                        <td>{{ $loop->index + 1 }}</td>
                        <td> {{ $property->name }}</td>
                        <td> {{ $property->location }}</td>
                        {{-- @if ($property->apartments)
                            <td>
                                <a href="" class="btn-btn-success btn-sm">
                                    
                                </a>
                                <a href="{{ route('apartments.show', ['propertyId' => $property->id]) }}"
                                    class="btn btn-success btn-sm align-items-center">
                                    {{ $property->apartments->count() }} Appartement <i class="fas fa-eye eye-icon"></i> 
                            </td>
                        @else
                            <td>0</td>
                        @endif --}}
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
    </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

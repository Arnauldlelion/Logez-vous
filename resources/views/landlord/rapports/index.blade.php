@extends('layouts.panel')

@section('content')
    <div>
        <div class="text-white">
            <a href="{{route("landlord.property.show", session('new_prop_id'))}}" class="text-white">
                <i class="mdi mdi-chevron-left"></i>
                Appartments
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="p-4">
                        <h4 class="text-capitalize">{{ $apartment->property->name }} > Apartment {{ $apartment->id }} >
                            Rapports De Gestion - {{ $apartment->property->location }}</h4>
                    </div>
                    <div class="text-end p-2">
                        <a href="{{ route('landlord.rapports.create') }}" class="btn btn-secondary">Add New Rapport De
                            Gestion</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-white">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Annee Construction</th>
                                    <th>Nombre des Locataire</th>
                                    <th>Duree du Locataire</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rapports as $rapport)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $rapport->annee_construction->format('d-m-y') }}</td>
                                        <td>{{ $rapport->nombreDeLocataire }}</td>
                                        <td>{{ $rapport->dureeDuLocataire }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('landlord.rapports.edit', $rapport->id) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $rapport->id }}"
                                                    href="#" class="btn btn-danger btn-sm"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                        <x-delete-modal :id="$rapport->id" :url="route('landlord.rapports.destroy', $rapport->id)" :content="'Are you sure you want to delete this Rapport <strong>' .
                                            $rapport->id .
                                            '</strong>? This action is irreversible'" />
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">No Rapport Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $Rapport- De Gestion>links() }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

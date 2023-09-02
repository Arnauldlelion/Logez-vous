@extends('layouts.panel')

@section('content')
    <div>
        <div class="text-white">
            <a href="{{route("landlord.index")}}" class="text-white">
                <i class="mdi mdi-chevron-left"></i>
                Properties
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="p-4">
                        <h4 class="text-capitalize">{{ $property->name }} Apartments - {{ $property->location }}</h4>
                    </div>
                    <div class="text-end p-2">
                        <a href="{{ route('landlord.apartments.create') }}" class="btn btn-secondary">Add New apartments</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-white">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Monthly Price</th>
                                    <th>Furnished</th>
                                    <th>Number of Apartments</th>
                                    <th>Floor Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($apartments as $apartment)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $apartment->monthly_price }}</td>
                                        <td>{{ $apartment->furnished }}</td>
                                        <td>{{ $apartment->number_of_appartments }}</td>
                                        <td>{{ $apartment->floor }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('landlord.apartments.edit', $apartment->id) }}"
                                                    style="height: fit-content;" class="btn btn-secondary btn-sm">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $apartment->id }}"
                                                    href="#" style="height: fit-content;" class="btn btn-danger btn-sm"><i
                                                        class="mdi mdi-delete"></i></a>
                                                <div>
                                                    <a href="{{ route('landlord.apartments.show', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm ml-4">
                                                        <i class="mdi mdi-eye"></i> Pieces</a>
                                                    <br><br>
                                                    <a href="{{ route('landlord.apartments.showRapports', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm ml-4">
                                                        <i class="mdi mdi-eye"></i> Rapports de Gestion</a>
                                                    <br><br>
                                                    <a href="{{ route('landlord.apartments.showPayments', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm ml-4">
                                                        <i class="mdi mdi-eye"></i> Payments</a>
                                                </div>
                                            </div>

                                        </td>
                                        <x-delete-modal :id="$apartment->id" :url="route('landlord.apartments.destroy', $apartment->id)" :content="'Are you sure you want to delete this Apartment <strong>' .
                                            $apartment->id .
                                            '</strong>? This action is irreversible'" />

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="100%">No Appartment Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $apartment->links() }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

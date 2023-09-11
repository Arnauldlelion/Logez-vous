@extends('layouts.panel')

@section('content')
    <div>
        <div class="text-white">
            <a href="{{route("landlord.property.show", session('new_prop_id'))}}" class="text-white">
                <i class="mdi mdi-chevron-left"></i>
                Appartements
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="p-4">
                        <h4 class="text-capitalize">{{ $apartment->property->name }} > Apartment {{ $apartment->id }} >
                            Payments - {{ $apartment->property->location }}</h4>
                    </div>
                    <div class="text-end p-2">
                        <a href="{{ route('landlord.payments.create') }}" class="btn btn-secondary">Ajouter un appartement</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-white">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Prix</th>
                                    <th>Commission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $payment->prices }}</td>
                                        <td>{{ $payment->commission }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('landlord.payments.edit', $payment->id) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $payment->id }}"
                                                    href="#" class="btn btn-danger btn-sm"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                        <x-delete-modal :id="$payment->id" :url="route('landlord.payments.destroy', $payment->id)" :content="'Are you sure you want to delete this Payment <strong>' .
                                            $payment->id .
                                            '</strong>? This action is irreversible'" />
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">Aucun appartement trouve.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $payment->links() }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection


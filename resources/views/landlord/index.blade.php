@extends('layouts.panel')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="text-right p-2">
                        <a href="{{ route('landlord.create') }}" class="btn btn-secondary">Add Accomodation</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Accomodation</th>
                                    <th>Location</th>
                                    <th>Accomodation Type(s)</th>
                                    <th>Need Tenant</th>
                                    <th>Furnished</th>
                                    <th>Monthly Rent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($properties as $property)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $property->accomodation }}</td>
                                        <td>{{ $property->location }}</td>
                                        <td>{{ $property->type }}</td>
                                        <td>{{ $property->need_tenant }}</td>
                                        <td>{{ $property->furnished }}</td>
                                        <td>{{ $property->monthly_rent_price }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('landlord.edit', $property->slug) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <form method="POST" action="{{ route('landlord.destroy', $property->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" href="#" class="btn btn-danger btn-sm"><i
                                                            class="mdi mdi-delete"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="100%">No Post Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $properties->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

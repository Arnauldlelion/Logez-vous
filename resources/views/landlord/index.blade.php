@extends('layouts.panel')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="text-right p-2">
                        <a href="{{ route('landlord.property.create') }}" class="btn btn-secondary">Add New Property</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-white">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Apartment Types</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($properties as $property)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $property->name }}</td>
                                        <td>{{ $property->location }}</td>
                                        <td>
                                            {{-- @if ($property->appartmentType != null) --}}
                                            @forelse (explode(', ', $property->appartmentType) as $apt_type_id)
                                                @if (\App\Models\AppartmentType::find((int) $apt_type_id))
                                                    {{ \App\Models\AppartmentType::find((int) $apt_type_id)->name }},
                                                @else
                                                    <span></span>
                                                @endif
                                            @empty
                                                {{-- @else --}}
                                                <span>-</span>
                                            @endforelse
                                            {{-- @endif --}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('landlord.property.edit', $property->slug) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $property->id }}"
                                                    href="#" class="btn btn-danger btn-sm"><i
                                                        class="mdi mdi-delete"></i></a>
                                                <a href="{{ route('landlord.property.show', $property->id) }}"
                                                    class="btn btn-secondary btn-sm ml-4">
                                                    <i class="mdi mdi-eye"></i> Apartments</a>
                                            </div>

                                        </td>
                                        <x-delete-modal :id="$property->id" :url="route('landlord.property.destroy', $property->id)" :content="'Are you sure you want to delete this Property: <strong>' .
                                            $property->name .
                                            '</strong>?</br> This action is irreversible'" />
                                    </tr>



                                @empty
                                    <tr>
                                        <td colspan="100%">No Property Found</td>
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

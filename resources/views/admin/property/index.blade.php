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
						<li class="breadcrumb-item active">Propriété</li>
					</ol>
				</div>
				<h4 class="page-title">Propriété</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
    <div>
        <div class="text-white">
            <a href="{{route("admin.property.index")}}" class="text-white">
                <i class="mdi mdi-chevron-left"></i>
                Properties
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="p-4">
                        {{-- <h4 class="text-capitalize">{{ $property->name }} Apartements - {{ $property->location }}</h4> --}}
                    </div>
                    <div class="text-end p-2">
                        <a href="{{ route('admin.property.create') }}" class="btn btn-secondary float-right">Ajouter de nouveaux logements</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Nom</th>
                                    <th>Emplacement</th>
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
                                            <div class="btn-group">
                                                <a href="{{ route('admin.property.edit', $property->id) }}"
                                                    style="height: fit-content;" class="btn btn-success  btn-sm">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $property->id }}"
                                                    href="#" style="height: fit-content;" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <div>
                                                    <a href="{{ route('admin.property.show', $property->id) }}"
                                                        class="btn btn-secondary btn-sm ml-4">
                                                        <i class="mdi mdi-eye"></i> Appartements
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <x-delete-modal :id="$property->id"
                                            :url="route('admin.property.destroy', $property->id)"
                                            :content="'Are you sure you want to delete this Apartment <strong>' .
                                            $property->id .
                                            '</strong>? Cette action est irréversible'" />
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">Aucune propriété trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

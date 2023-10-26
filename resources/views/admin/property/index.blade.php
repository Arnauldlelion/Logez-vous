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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
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
                                    <th>Propriétaire</th>
                                    <th>Atout</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($properties as $property)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $property->name }}</td>
                                        <td>{{ $property->location }}</td>
                                        <td>{{ $property->landlord->name }}</td>
                                        <td>
                                            @foreach ($property->amenities as $amenity)
                                                <span class="d-flex">{{ $amenity->name }} </span><i class="mdi mdi-delete">
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group d-flex">
                                                <div>
                                                    <a href="{{ route('admin.property.show', $property->id) }}"
                                                        class="btn btn-secondary btn-sm mb-1">
                                                        <i class="mdi mdi-eye"></i> Appartements
                                                    </a>
                                               
                                                    <a href="{{ route('admin.showPropertyImagesform', $property->id) }}"
                                                        class="btn btn-secondary btn-sm ml-1">
                                                        <i class="mdi mdi-eye"></i> Images
                                                    </a>
                                                </div>
                                                <a href="{{ route('admin.property.edit', $property->id) }}"
                                                    style="height: fit-content;" class="btn btn-success  btn-sm ml-5">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $property->id }}"
                                                    href="#" style="height: fit-content;" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </div>
                                          
                                        </td>
                                        <x-delete-modal :id="$property->id"
                                            :url="route('admin.property.destroy', $property->id)"
                                            :content="'Êtes-vous sûre de vouloir supprimer cet propriété <strong>' .
                                            $property->name .
                                            '</strong>? <b>Cette action est irréversible</b>'" />
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">Aucune propriété trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Display Bootstrap pagination links -->
                <div class="d-flex justify-content-center">
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection

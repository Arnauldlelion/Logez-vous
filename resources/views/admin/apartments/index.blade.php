@extends('admin.layouts.app')
@section('title', 'Appartements')

@section('content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.property.index')}}">{{ $property->name}}</a></li>
						<li class="breadcrumb-item active">Appartement</li>
					</ol>
				</div>
				<h4 class="page-title text-capitalize">Appartement</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="text-end p-2">
                        <a href="{{ route('admin.apartments.create') }}" class="btn btn-secondary float-right">Ajouter de nouveaux appartements</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm ">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Nom</th>
                                    <th>Loyer mensuel</th>
                                    <th>Meublé</th>
                                    <th>Numbre d'appartements</th>
                                    <th>Niveau d'etage</th>
                                    <th>Rapports de Gestion</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($apartments as $apartment)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $apartment->name }}</td>
                                        <td>{{ $apartment->monthly_price }}</td>
                                        <td>{{ $apartment->furnished }}</td>
                                        <td>{{ $apartment->number_of_pieces }}</td>
                                        <td>{{ $apartment->floor }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('admin.generalrapportIndex', $apartment->id) }}"
                                                    class="btn btn-secondary btn-sm mb-1">
                                                    <i class="mdi mdi-eye"></i> Rapport Général</a><br>
                                                    <a href="{{ route('admin.rapportIndex', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm ">
                                                        <i class="mdi mdi-eye"></i> Rapport Hebdomadaire</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <div>
                                                    <a href="{{ route('admin.showApartmentImagesform', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="mdi mdi-eye"></i> Images
                                                    </a>

                                                    <a href="{{ route('admin.apartments.show', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="mdi mdi-eye"></i> Pièce</a>
                                                    
                                                   
                                                    {{-- <a href="{{ route('admin.apartments.showPayments', $apartment->id) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="mdi mdi-eye"></i> Paiements</a> --}}
                                                        </div>
                                                </div>
                                                <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                                                    style="height: fit-content;" class="btn btn-success  btn-sm ml-4">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $apartment->id }}"
                                                    href="#" style="height: fit-content;" class="btn btn-danger btn-sm"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>

                                        </td>
                                        <x-delete-modal :id="$apartment->id" :url="route('admin.apartments.destroy', $apartment->id)" :content="'Are you sure you want to delete this Apartment <strong>' .
                                            $apartment->id .
                                            '</strong>?  Cette action est irréversible'" />

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="6">Aucun Appartement trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $apartment->links() }} --}}
                </div>
            </div>
        </div>
@endsection
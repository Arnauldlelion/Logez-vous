@extends('admin.layouts.app')
@section('title', 'Nouvelles')

@section('content')
	
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Nouvelles</li>
					</ol>
				</div>
				<h4 class="page-title">Nouvelles</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
	
	<div class="">
		<div class="card card-body">
			<div class="text-right mb-3">
				<a href="{{ route('admins.news.create') }}" class="btn btn-secondary">Ajouter une Nouvelles</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-sm">
					<thead>
					<tr>
						<th>S/N</th>
						<th>Nom</th>
						<th>Titre</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@forelse($news as $new)
						<tr>
							<td>{{ $loop->index + 1 }}</td>
							<td>
								<div class="d-flex align-items-center">
									<img src="{{ $new->getImageUrl() }}"
									     class="img-thumbnail"
									     style="width: 2.75rem; max-height: 2.75rem;">
									<div class="pl-2">
										<p class="mb-0">{{ $new->name }}</p>
									</div>
								</div>
							</td>
							<td>{{ $new->title }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('admins.news.edit', $new->id) }}"
									   class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
									<a href="#"
									   data-toggle="modal"
									   data-target="#deleteModal{{ $new->id }}"
									   class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
						
						
						<x-delete-modal
								:id="$new->id"
								:url="route('admins.news.destroy', $new->id)" />
					
					@empty
						<tr>
							<td colspan="100%">Aucun enregistrement trouvé</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection
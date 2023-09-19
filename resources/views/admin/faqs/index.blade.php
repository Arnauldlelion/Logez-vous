@extends('admin.layouts.app')
@section('title', 'FAQs')

@section('content')
	
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">FAQs</li>
					</ol>
				</div>
				<h4 class="page-title">FAQs</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
	
	<div class="">
		<div class="card card-body">
			<div class="text-right mb-3">
				<a href="{{ route('admins.faqs.create') }}" class="btn btn-secondary">Ajouter FAQ</a>
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
					@forelse($faqs as $faq)
						<tr>
							<td>{{ $loop->index + 1 }}</td>
							<td>{{ $faq->type }}</td>
							<td>{{ $faq->title }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('admins.faqs.edit', $faq->id) }}"
									   class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
									<a href="#"
									   data-toggle="modal"
									   data-target="#deleteModal{{ $faq->id }}"
									   class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
						
						
						<x-delete-modal
								:id="$faq->id"
								:url="route('admins.faqs.destroy', $faq->id)" />
					
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
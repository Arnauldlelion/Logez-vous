@extends('admin.layouts.app')
@section('title', 'Testimonials')

@section('content')
	
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Testimonials</li>
					</ol>
				</div>
				<h4 class="page-title">Testimonials</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
	
	<div class="">
		<div class="card card-body">
			<div class="text-right mb-3">
				<a href="{{ route('admins.testimonials.create') }}" class="btn btn-secondary">Add Testimony</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-sm">
					<thead>
					<tr>
						<th>S/N</th>
						<th>Name</th>
						<th>Title</th>
						<th>Video</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					@forelse($testimonials as $testimony)
						<tr>
							<td>{{ $loop->index + 1 }}</td>
							<td>
								<div class="d-flex align-items-center">
									<img src="{{ $testimony->getImageUrl() }}"
									     class="img-thumbnail"
									     style="width: 2.75rem; max-height: 2.75rem;">
									<div class="pl-2">
										<p class="mb-0">{{ $testimony->name }}</p>
									</div>
								</div>
							</td>
							<td>{{ $testimony->title }}</td>
							<td>{{ $testimony->video }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('admins.testimonials.edit', $testimony->id) }}"
									   class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
									<a href="#"
									   data-toggle="modal"
									   data-target="#deleteModal{{ $testimony->id }}"
									   class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
						
						
						<x-delete-modal
								:id="$testimony->id"
								:url="route('admins.testimonials.destroy', $testimony->id)" />
					
					@empty
						<tr>
							<td colspan="100%">No Records Found</td>
						</tr>
					@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection
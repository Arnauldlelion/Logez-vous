@extends('admin.layouts.app')
@section('title', 'Piece Types')

@section('content')
	
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item active">Piece Types</li>
					</ol>
				</div>
				<h4 class="page-title">Piece Types</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
	
	<div class="row">
		<div class="col-md-8">
			<div class="card card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead>
						<tr>
							<th>S/N</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@forelse($piece_types as $piece_type)
							<tr>
								<td>{{ $loop->index + 1 }}</td>
								<td>{{ $piece_type->name }}</td>
								<td>
									<div class="btn-group">
										<a href="{{ route('admins.piece_types.edit', $piece_type->id) }}"
										   class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
										<a href="#"
										   data-toggle="modal"
										   data-target="#deleteModal{{ $piece_type->id }}"
										   class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>
							
							<x-delete-modal
									:id="$piece_type->id"
									:url="route('admins.piece_types.destroy', $piece_type->id)"
									:content="'Are you sure you want to delete this category <strong>'.$piece_type->name.'</strong>? This action is irreversible'"/>

							
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
		<div class="col-md-4">
			<div class="card card-body">
				<form action="{{ route('admins.piece_types.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="form-group">
						<label>Name <em>*</em></label>
						<input type="text"
						       class="form-control @error('name') is-invalid @enderror"
						       name="name"
						       placeholder="e.g. General"
						       value="{{ old('name') }}"/>
						@error("name") <span class="invalid-feedback">{{ $message }}</span> @enderror
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-secondary">Save</button>
					</div>
				
				</form>
			</div>
		</div>
	</div>

@endsection
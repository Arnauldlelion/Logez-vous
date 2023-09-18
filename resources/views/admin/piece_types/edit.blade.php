@extends('admin.layouts.app')
@section('title', 'Types de pièces')

@section('content')
	
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.piece_types.index') }}">Types de pièces</a></li>
						<li class="breadcrumb-item active">Éditer</li>
					</ol>
				</div>
				<h4 class="page-title">Types de pièces: {{ $piece_type->name }}</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
	
	<div class="">
		<div class="card card-body">
			<form action="{{ route('admin.piece_types.update', $piece_type->id) }}"
			      method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				
				<div class="form-group">
					<label>Nom <em>*</em></label>
					<input type="text"
					       class="form-control @error('name') is-invalid @enderror"
					       name="name"
					       placeholder="e.g. Chambre"
					       value="{{ old('name', $piece_type->name) }}"/>
					@error("name") <span class="invalid-feedback">{{ $message }}</span> @enderror
				</div>
				
				<div class="text-right">
					<button type="submit" class="btn btn-secondary">Sauvegarder</button>
				</div>
			
			</form>
		</div>
	</div>

@endsection
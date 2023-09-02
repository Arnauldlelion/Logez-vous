@extends('admin.layouts.app')
@section('title', 'News')

@section('content')
	
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admins.news.index') }}">News</a></li>
						<li class="breadcrumb-item active">Create</li>
					</ol>
				</div>
				<h4 class="page-title">News</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->
	
	<div class="">
		<div class="card card-body">
			<form action="{{ route('admins.news.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group">
					<label>Name <em>*</em></label>
					<input type="text"
					       class="form-control @error('name') is-invalid @enderror"
					       name="name"
					       placeholder="e.g. John Doe"
					       value="{{ old('name') }}"/>
					@error("name") <span class="invalid-feedback">{{ $message }}</span> @enderror
				</div>
				
				<div class="form-group">
					<label>Logo <em></em></label>
					<input type="file"
					       accept="image/*"
					       class="form-control @error('logo') is-invalid @enderror"
					       name="logo"/>
					@error("logo") <span class="invalid-feedback">{{ $message }}</span> @enderror
				</div>
				
				
				<div class="mb-4"></div>
				
				
				<div class="form-group">
					<label>Title <em>*</em></label>
					<input type="text"
					       class="form-control @error('title') is-invalid @enderror"
					       name="title"
					       placeholder="e.g. Great Customer Experience"
					       value="{{ old('title') }}"/>
					@error("title") <span class="invalid-feedback">{{ $message }}</span> @enderror
				</div>
				<div class="form-group">
					<label>Description <em>*</em></label>
					<textarea
							rows="5"
							class="form-control @error('description') is-invalid @enderror"
							name="description">{{ old('description') }}</textarea>
					@error("description") <span class="invalid-feedback">{{ $message }}</span> @enderror
				</div>
				
				<div class="text-right">
					<button type="submit" class="btn btn-secondary">Save</button>
				</div>
			
			</form>
		</div>
	</div>

@endsection
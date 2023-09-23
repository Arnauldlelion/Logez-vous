@extends('admin.layouts.app')
@section('title', 'Images')

@section('content')
    	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.property.index')}}">{{ $apartment->property->name}}</a></li>
						<li class="breadcrumb-item "><a href="">Appartement {{ $apartment->id}}</a></li>
						<li class="breadcrumb-item active"> Images</li>
					</ol>
				</div>
				<h4 class="page-title text-capitalize">Images</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->


    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">

                <h4 class="mb-0">Appartement{{ $apartment->id }}</h4>
                <hr>
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13">
                        <strong>Nom :</strong> <span class="ml-2">{{ $apartment->id }}</span>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-box">
                <form action="{{ route('admin.apartment-images', $apartment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" class="form-control" id="apt-image" accept="image/*" 
                        name="images[]" multiple>
                    @error('images')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-secondary">Sauvegarder</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card card-body">
            @if ($images->isNotEmpty())
    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-2">
            <div class="card">
                <img class="card-img-top" src="{{ Storage::url($image->url) }}" alt="Apartment Image" class="object-fit-cover" height="100px">
                <button data-toggle="modal" data-target="#deleteModal{{ $image->id }}" class="btn btn-danger btn-sm">
                    <i class="mdi mdi-delete"></i>
                </button>
                <div class="card-body">
                    <h5 class="card-title">{{ $image->original_name }}</h5>
                </div>
            </div>
        </div>
    
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $image->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $image->id }}">Delete Apartment Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Voulez-vous vraiment supprimer cette l'image de cette appartement ?</strong></p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('admin.delete-apartment-image', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@else
    <p class="text-center">Aucune image disponible pour cette appartement.</p>
@endif
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

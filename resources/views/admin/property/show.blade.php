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
                        <li class="breadcrumb-item active"><a
                                href="{{ route('admin.property.index') }}">{{ $property->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">Images</li>
                    </ol>
                </div>
                {{-- <h4 class="page-title">{{ $landlord->first_Name }}</h4> --}}
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">

                <h4 class="mb-0">{{ $property->name }}</h4>
                <p class="text-muted">{{ $property->location }}</p>
                <hr>
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13">
                        <strong>Nom :</strong> <span class="ml-2">{{ $property->name }}</span>
                    </p>
                    <p class="text-muted mb-2 font-13">
                        <strong>Emplacement :</strong> <span class="ml-2">{{ $property->location }}</span>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-box">
                <form action="{{ route('admin.property-images', $property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" class="form-control{{ $errors->has('images.*') || $errors->has('empty_form') ? ' is-invalid' : '' }}" id="apt-image" accept="image/*" name="images[]" multiple>
                        @if ($errors->has('images.*'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('images.*') }}</strong>
                            </span>
                        @elseif ($errors->has('empty_form'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('empty_form') }}</strong>
                            </span>
                        @endif
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
                            <div class="col-6 col-md-2">
                                <div class="card">
                                    <img class="object-fit-cover" src="{{ Storage::url($image->url) }}" alt="piece Image">
                                    <button data-toggle="modal" data-target="#deleteModal-{{ $image->id }}" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $image->original_name }}</h5>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal-{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $image->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $image->id }}">Delete Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this image?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.deletePropertyImage', $image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Delete Modal -->
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

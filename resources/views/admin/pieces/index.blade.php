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
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.property.index') }}">{{ $apartment->property->name }}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.property.show', session('new_prop_id')) }}">Apartement
                                {{ $apartment->id }}</a></li>
                        <li class="breadcrumb-item active">Pièces</li>
                    </ol>
                </div>
                <h4 class="page-title">Pièces</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <div class="text-end p-2">
                    <a href="{{ route('admin.pieces.create') }}" class="btn btn-secondary float-right">Ajouter une Pièce</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm ">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Nombre de Pièce</th>
                                <th>Superficie</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pieces as $piece)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $piece->nombre_of_pieces }} (
                                        @if ($piece->pieceType)
                                            {{ $piece->pieceType->name }}
                                        @else
                                            <span></span>
                                        @endif
                                        )
                                    </td>
                                    <td>{{ $piece->size }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.pieces.edit', $piece->id) }}"
                                                class="btn btn-success  btn-sm">
                                                <i class="mdi mdi-pencil"></i></a>
                                            <a data-toggle="modal" data-target="#deleteModal{{ $piece->id }}"
                                                href="#" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </div>
                                        {{-- <a href="{{ route('admin.pieces.show', $piece->id) }}"
                                            class="btn btn-secondary btn-sm ml-4">
                                            <i class="mdi mdi-eye"></i> Pièces</a>
                                        <br><br> --}}
                                    </td>
                                    <x-delete-modal :id="$piece->id" :url="route('admin.pieces.destroy', $piece->id)" :content="'Are you sure you want to delete this Piece <strong>' .
                                        $piece->id .
                                        '</strong>?  Cette action est irréversible'" />
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">Aucune Pièce trouvée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- {{ $piece->links() }} --}}
            </div>
        </div>
    </div>


    <form action="{{ route('admin.apartments.storeImages') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mx-0">
            <div class="col-6 d-flex align-items-center justify-content-start border-2-3xl">
                <span class="text-16 text-black-medium font-500">
                    <input type="file" class="" id="cover_image" accept="image/*" style="display: none;"
                        name="cover_image">
                    @error('cover_image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <img src="{{ asset('business_assets/icons/icon-upload-photos.svg') }}" alt=""
                        class="mr-1 mr-md-2">
                    <label for="cover_image"> Image de couverture</label>
                </span>
                <span class="text-16 text-black-medium font-500">
                    <input type="file" class="" id="apt-image" accept="image/*" style="display: none;"
                        name="images[]" multiple>
                    @error('images')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <img src="{{ asset('business_assets/icons/icon-upload-photos.svg') }}" alt=""
                        class="mr-1 mr-md-2">
                    <label for="apt-image"> Photos</label>
                </span>
            </div>
            <div class=" col-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    Enregistrer les images
                </button>
            </div>
        </div>
    </form>

    <div class="previewImages px-2 py-3 d-none"></div>
    <div>
        @if ($apartment->coverImage)
            <img src="{{ asset('storage/' . $apartment->coverImage->url) }}" alt="{{ config('app.name') }}" width="150px"
                id="coverImage">
        @endif
    </div>
    <hr>
    <div class="col-12 row mx-0 py-4">
        @if (count($aptImages) > 0)
            @foreach ($aptImages as $aptImage)
                <div class="col-6 col-md-4 col-lg-2 mb-4">
                    <img src="{{ $aptImage->getImageUrl() }}" alt="" class="db-images "
                        data-image="{{ $aptImage->getImageUrl() }}">

                    <div class="d-flex">
                        <form action="{{ route('admin.changeCoverImage') }}" method="POST" enctype="multipart/form-data"
                            id="changeCoverForm">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="image_id" value="{{ $aptImage->id }}">
                            <!-- Add any additional input fields or styling as needed -->
                            <button type="submit" class="btn btn-success btn-sm mx-auto change-cover-link">
                                <i class="mdi mdi-upload"></i>
                            </button>
                        </form>
                        <a data-toggle="modal" data-target="#deleteModal{{ $aptImage->id }}" href="#"
                            class="btn btn-danger btn-sm mx-auto"><i class="mdi mdi-delete"></i></a>
                    </div>

                </div>
                <x-delete-modal :id="$aptImage->id" :url="route('admin.pieces.destroyImage', $aptImage->id)" :content="'Voulez-vous vraiment supprimer cette image: ?</br> Cette action est irréversible'" />
            @endforeach
        @else
            <div class="text-center pt-5">
                <h3 class="text-primary">Aucune image n’a été ajoutée.</h3>
            </div>
        @endif
    </div>

@endsection

@section('footer_script')
    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, previewImages) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                previewImages);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };


            $('#apt-image').on('change', function() {
                $('.previewImages').removeClass('d-none');
                imagesPreview(this, 'div.previewImages');
            });

            $(".image-thumbnail").click(function() {
                const imageUrl = $(this).data('image');
                $("#expanded-image").attr('src', imageUrl);
                $("#blurred-background").fadeIn();
                $("#expanded-container").fadeIn();
            });

            // Hide the blurred background and expanded image when clicking anywhere on the blurred background
            $("#blurred-background").click(function() {
                $(this).fadeOut();
                $("#expanded-container").fadeOut();
            });
        });
    </script>
@endsection

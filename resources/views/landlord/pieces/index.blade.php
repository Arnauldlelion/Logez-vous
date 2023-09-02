@extends('layouts.panel')

@section('content')
    <div>
        <div class="text-white">
            <a href="{{ route('landlord.property.show', session('new_prop_id')) }}" class="text-white">
                <i class="mdi mdi-chevron-left"></i>
                Appartments
            </a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="p-4">
                        <h4 class="text-capitalize">{{ $apartment->property->name }} > Apartment {{ $apartment->id }} >
                            Pieces - {{ $apartment->property->location }}</h4>
                    </div>
                    <div class="text-end p-2">
                        <a href="{{ route('landlord.pieces.create') }}" class="btn btn-secondary">Add New Piece</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-white">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Number of Pieces</th>
                                    <th>Size</th>
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
                                                <a href="{{ route('landlord.pieces.edit', $piece->id) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="mdi mdi-pencil"></i></a>
                                                <a data-toggle="modal" data-target="#deleteModal{{ $piece->id }}"
                                                    href="#" class="btn btn-danger btn-sm"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                        <x-delete-modal :id="$piece->id" :url="route('landlord.pieces.destroy', $piece->id)" :content="'Are you sure you want to delete this Piece <strong>' .
                                            $piece->id .
                                            '</strong>? This action is irreversible'" />
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">No Piece Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{ $piece->links() }} --}}
                </div>
            </div>
        </div>

        <form action="{{ route('landlord.apartments.storeImages') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="post-form-images-bottom row mx-0">
                <div class="col-6 d-flex align-items-center justify-content-start border-2-3xl">
                    <span class="text-16 text-black-medium font-500">
                        <input type="file" class="" id="apt-image" accept="image/*" style="display: none;"
                            name="images[]" multiple>
                        @error('images')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <img src="{{ asset('business_assets/icons/icon-upload-photos.svg') }}" alt=""
                            class="mr-1 mr-md-2">
                        <label for="apt-image"> Upload Photos</label>
                    </span>
                </div>
                <div class=" col-6 d-flex justify-content-end">
                    <button type="submit" class="post-btn bg-primary">
                        Save Images
                    </button>
                </div>
            </div>
        </form>

        <div class="previewImages px-2 py-3 d-none"></div>
        <br>
        <hr>
        <br>
        <div class="col-12 row py-3 mx-0">
            @if (count($aptImages) > 0)
                @foreach ($aptImages as $aptImage)
                    <div class="col-6 col-md-4 col-lg-2 py-3 px-1">
                        <img src="{{ $aptImage->getImageUrl() }}" alt=""
                            class="img-fluid db-images image-thumbnail" data-image="{{ $aptImage->getImageUrl() }}">
                        <br>
                        <a data-toggle="modal" data-target="#deleteModal{{ $aptImage->id }}" href="#"
                            class="btn btn-danger btn-sm mx-auto"><i class="mdi mdi-delete"></i></a>
                    </div>
                    <x-delete-modal :id="$aptImage->id" :url="route('landlord.pieces.destroyImage', $aptImage->id)" :content="'Are you sure you want to delete this Image: ?</br> This action is irreversible'" />
                @endforeach
            @else
                <div class="text-center pt-5">
                    <h3 class="text-primary">No Appartment Image has been uploaded.</h3>
                </div>
            @endif
        </div>
    </div>
    <div class="blurred-background" id="blurred-background">
        <!-- Empty div for spacing -->
    </div>

    <!-- The expanded image container -->
    <div class="expanded-container" id="expanded-container">
        <img src="" alt="Expanded Image" class="expanded-image" id="expanded-image">
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

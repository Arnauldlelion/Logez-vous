@extends('admin.layouts.app')
@section('title', 'Atout')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Atout</li>
                    </ol>
                </div>
                <h4 class="page-title">Atout</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card card-body">
        <div class="text-right mb-3">
            <a href="{{ route('admin.amenities.create') }}"
               class="btn btn-success mb-3">
               Ajouter de un Atout
            </a>
        </div>
        <div class="table-responsive position-relative">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="sort">
                @forelse($amenities as $amenity)
                    <tr>
                        <td>{{ $amenity->name }}</td>
                        <td><img src="{{asset('storage/'.$amenity->image)}}" style="height: 40px; width: 40px"  alt="Image"></td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.amenities.edit', $amenity->id) }}"
                                   class="btn btn-sm btn-secondary"><span class="fa fa-edit"></span></a>
                                <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal"
                                        data-target="#deleteModal{{ $amenity->id }}"><span class="fa fa-trash"></span>
                                </button>
                            </div>
                        </td>

                        
                    </tr>

                    <div class="modal fade" id="deleteModal{{ $amenity->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterLabel">Confirm Delete </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="POST" action="{{ route('admin.amenities.destroy', $amenity->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                Are you sure you want to delete this amenity({{ $amenity->name }}) ?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            NO
                                        </button>
                                        <button type="submit" class="btn btn-danger">YES</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No records found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $amenities->links() }}
        </div>
    </div>



@endsection

@section('footer_script')
    <script></script>
@endsection
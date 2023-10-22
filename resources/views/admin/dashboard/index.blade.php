@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row gap-3">
        <div class="col-auto">
            <a href="">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-file-text font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="mt-1">Nombre d'Agents</h3>
                                {{-- <p class="text-muted mb-1 text-truncate">Total ({{ \App\Post::count() }}) </p> --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </a> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-auto">
            <a href="">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-user-check font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="mt-1">Nombre de propriétaires</h3>
                                {{-- <p class="text-muted mb-1 text-truncate">Total ({{ \App\Testimony::count() }}) </p> --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </a> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-auto">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Nom</th>
                                <th>Numéro de téléphone</th>
                                <th>Appartement</th>
                                <th>Propriété</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidatures as $candidature)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $candidature->first_name }} {{ $candidature->last_name }}</td>
                                    <td>{{ $candidature->phone }}</td>
                                    <td>{{ $candidature->apartment->name }}</td>
                                    <td>{{ $candidature->apartment->property->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($candidature->created_at)->locale('fr_FR')->isoFormat('dddd D MMMM YYYY, HH:mm:ss') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if (!$candidature->is_approved)
                                            <form method="POST" action="{{ route('admin.candidatures.approve', $candidature->id) }}" class="mr-1">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Approuver</button>
                                            </form>
                                            
                                            <form action="{{ route('admin.candidatures.reject', $candidature->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Rejecter</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>


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
        <div class="col-auto">
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($landlords as $landlord)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $landlord->first_name }}</td>
                                <td>{{ $landlord->last_name }}</td>
                                <td>{{ $landlord->is_approved ? 'Approved' : 'En instance' }}</td>
                                <td>
                                    <div class="btn-group ">
                                        <a href="{{ route('admin.landlord-details', $landlord->id) }}"
                                            class="btn btn-success btn-sm text-white align-items-center" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if (!$landlord->is_approved)
                                            {{-- <form method="POST" action="{{ route('admin.users.approve', $landlord->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Approuver</button>

                                            </form> --}}
                                            <form method="POST" action="{{ route('admin.users.approve', $landlord->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Approuver</button>
                                            </form>
                        
                                            <form action="{{ route('admin.users.reject', $landlord) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
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
    </div>


@endsection

@section('footer_script')
    <script></script>
@endsection

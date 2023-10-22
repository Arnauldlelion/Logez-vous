@extends('admin.layouts.app')
@section('title', 'Candidature')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Locataires</li>
                    </ol>
                </div>
                <h4 class="page-title">Locataires</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-striped">
                    <thead>
                    <tr role="row" class="bold-text">
                        <th>#</th>
                        <th>Locataire</th>
                        <th>Numéro de téléphone</th>
                        <th>Email</th>
                        <th>Appartement</th>
                         <th>Propriété</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($candidatures as $candidature)
                        <tr role="row">
                            <td>{{ $loop->index + 1 }}</td>
                           
                            <td>{{ $candidature->first_name }} {{ $candidature->last_name }}</td>
                            <td>{{ $candidature->phone }}</td>
                            <td>{{ $candidature->email ?: 'N/A' }}</td>
                            <td>{{ $candidature->apartment->name  }}</td>
                            <td>{{ $candidature->apartment->property->name }}</td>
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
                            <td colspan="4" class="text-center">Aucun enregistrement trouvé</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Display Bootstrap pagination links -->
            <div class="d-flex justify-content-center">
                {{ $candidatures->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

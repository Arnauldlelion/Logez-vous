@extends('admin.layouts.app')

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
                                href="{{ route('admin.property.show', session('new_prop_id')) }}">
                                {{ $apartment->name }}</a></li>
                        <li class="breadcrumb-item active">Rapports</li>
                    </ol>
                </div>
                <h4 class="page-title">Rapports De Gestion</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="text-end p-2">
                        <a href="{{ route('admin.rapports.create') }}" class="btn btn-secondary float-right">Ajouter un
                            Rapport De
                            Gestion</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm ">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Rapport</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($apartment->rapportDeGestions as $rapport)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <a href="#"
                                                onclick="openPdfModal('{{ asset('storage/Rapport/' . $rapport->rapport) }}')">
                                                <i class="mdi mdi-file-pdf" style="color: red; font-size: 24px;"
                                                    aria-hidden="true"></i> Voir
                                            </a>
                                        </td>
                                        <td>
                                            (Téléchargé le {{ \Carbon\Carbon::parse($rapport->created_at)->locale('fr_FR')->isoFormat('dddd D MMMM YYYY, HH:mm:ss') }})
                                        </td>
                                        <td>
                                            <div class="btn-group">

                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $rapport->id }}" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <x-delete-modal :id="$rapport->id" :url="route('admin.rapports.destroy', $rapport->id)" :content="'Voulez-vous vraiment supprimer ce Rapport <strong>' .
                                                    $rapport->id .
                                                    '</strong>? Cette action est irréversible'"
                                                    :modalId="'deleteModal'.$rapport->id" />
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">Aucun rapport de gestion trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <!-- Modal -->
                            <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog"
                                aria-labelledby="pdfModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe id="pdfIframe" width="100%" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                    {{-- {{ $Rapport- De Gestion>links() }} --}}
                </div>
            </div>
        </div>
    </div>
    
@endsection
<script>
    function openPdfModal(url) {
        var pdfIframe = document.getElementById('pdfIframe');
        pdfIframe.src = url;
        $('#pdfModal').modal('show');
    }
</script>

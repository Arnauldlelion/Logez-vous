@extends('landlord.layouts.app')
@section('title', 'Gestionnaire')

@section('content')
    <h1 class="mb-5">Rapport de Gestion</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Rapport</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rapportDeGestions as $index => $rapportDeGestion)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#myModal{{ $index }}" class="text-decoration-none">
                                <i class="fas fa-file-pdf" style="color: red; font-size: 24px;"></i> Voir
                            </a>
                        </td>
                        <td>
                            (Téléchargé le
                            {{ Carbon\Carbon::parse($rapportDeGestion->created_at)->locale('es')->formatLocalized('%d %B %Y %A H:i:s') }})
                        </td>
                    </tr>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Rapport de Gestion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="{{ asset('storage/Rapport/' . $rapportDeGestion->rapport) }}" width="100%" height="500px"></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucun rapport de gestion trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

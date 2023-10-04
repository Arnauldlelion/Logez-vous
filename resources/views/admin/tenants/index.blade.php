@extends('admin.layouts.app')
@section('title', 'Locataires')

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
            <div class="filter">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <button class="btn btn-success btn-sm btn-rounded waves-effect mr-2"
                                title="Filtrer les résultats" type="button" data-toggle="collapse"
                                data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                            <i class="mdi mdi-filter"></i>
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-success px-2 btn-sm" id="resultCount" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> {{ $search['limit'] ?: 20 }} <i
                                        class=" ml-2 fa fa-angle-down"></i></button>
                            <div class="dropdown-menu w-25" aria-labelledby="resultCount">
                                <a class="dropdown-item"
                                   href="{{ route('admin.tenant', ['q'=>$search['q'], 'limit' => 10]) }}">10</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.tenant', ['q'=>$search['q'], 'limit' => 20]) }}">20</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.tenant', ['q'=>$search['q'], 'limit' => 50]) }}">50</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.tenant', ['q'=>$search['q'], 'limit' => 100]) }}">100</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-nowrap align-items-center">
                        <small class="mx-2">page {{ $tenants->currentPage() }} de {{ $tenants->total() }} résultats</small>
                    </div>
                </div>

                <div class="collapse {{ $search['q'] ? 'show' : ''}}" id="collapseFilter">
                    <form action="{{ route('admin.tenant') }}">
                        <input type="hidden" name="limit" value="{{ $search['limit'] }}">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="q" value="{{ $search['q'] }}"
                                       class="form-control form-control-sm"
                                       placeholder="Enter user name">
                            </div>
                            <div class="col-md-2 text-right d-flex align-items-end justify-content-end mt-3 mt-md-0">
                                <button class="btn btn-success btn-sm" type="submit">Filtre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-centered table-striped">
                    <thead>
                    <tr role="row">
                        <th>#</th>
                        <th>Locatiare</th>
                        <th>numéro de téléphone</th>
                        <th>Email</th>
                        <th>Appartement</th>
                         <th>Propriété</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($tenants as $tenant)
                        <tr role="row">
                            <td>{{ $loop->index + 1 }}</td>
                           
                            <td>{{ $tenant->first_name }} {{ $tenant->last_name }}</td>
                            <td>{{ $tenant->phone }}</td>
                            <td>{{ $tenant->email ?: 'N/A' }}</td>
                            <td>{{ $tenant->apartment_id }}</td>
                            <td>{{ $tenant->apartment->property->name }}</td>
                            
                            {{-- <td>
                                @if(!$tenant->super_tenant)
                                    <a class="btn btn-danger btn-sm text-white" onclick="event.preventDefault();
                                            document.getElementById('{{$tenant->id}}').submit();">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                @endif

                                <form action=""
                                      id="" method="POST" style="display: none;">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                </form>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Aucun enregistrement trouvé</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $tenants->appends($search)->links()}}
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

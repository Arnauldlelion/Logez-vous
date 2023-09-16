@extends('admin.layouts.app')
@section('title', 'Administrators')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Administrators</li>
                    </ol>
                </div>
                <h4 class="page-title">Administrators</h4>
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
                                   href="{{ route('admin.administrator.index', ['q'=>$search['q'], 'limit' => 10]) }}">10</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.administrator.index', ['q'=>$search['q'], 'limit' => 20]) }}">20</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.administrator.index', ['q'=>$search['q'], 'limit' => 50]) }}">50</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.administrator.index', ['q'=>$search['q'], 'limit' => 100]) }}">100</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-nowrap align-items-center">
                        <small class="mx-2">page {{ $admins->currentPage() }} of {{ $admins->total() }} results</small>
                        <a href="{{route('admin.administrator.create')}}" class="btn btn-success text-white btn-sm">New
                            Administrator</a>
                    </div>
                </div>

                <div class="collapse {{ $search['q'] ? 'show' : ''}}" id="collapseFilter">
                    <form action="{{ route('admin.administrator.index') }}">
                        <input type="hidden" name="limit" value="{{ $search['limit'] }}">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="q" value="{{ $search['q'] }}"
                                       class="form-control form-control-sm"
                                       placeholder="Enter user name">
                            </div>
                            <div class="col-md-2 text-right d-flex align-items-end justify-content-end mt-3 mt-md-0">
                                <button class="btn btn-success btn-sm" type="submit">Filter</button>
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
                        <th>Client</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($admins as $admin)
                        <tr role="row">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <div class="table-user">
                                    <img src="{{ $admin->profileURL() }}" class="mr-2 rounded-circle">
                                    <a href="{{ route('admin.administrator.show', $admin->id) }}"

                                       class="text-body font-weight-semibold">{{ $admin->name }}</a>
                                </div>
                            </td>
                            <td>
                                {{ $admin->email ?: 'N/A' }}
                            </td>
                            <td>
                                @if(!$admin->super_admin)
                                    <a class="btn btn-danger btn-sm text-white" onclick="event.preventDefault();
                                            document.getElementById('{{$admin->id}}').submit();">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                @endif

                                <a href="{{ route('admin.administrator.show', $admin->id) }}"
                                   class="btn btn-success btn-sm text-white" title="View">
                                    <i class="fa fa-eye"></i></a>

                                <form action="{{route('admin.administrator.destroy',$admin->id)}}"
                                      id="{{$admin->id}}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Records Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{ $admins->appends($search)->links()}}
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

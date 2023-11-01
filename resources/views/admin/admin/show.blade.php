@extends('admin.layouts.app')
@section('title', $user->name)

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.administrator.index') }}">Gestionnaire</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $user->name }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $user->name }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <img src="{{ $user->profileURL() }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mb-0">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->email }}</p>
                <hr>
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13">
                        <strong>Name :</strong> <span class="ml-2">{{ $user->name }}</span>
                    </p>
                    <p class="text-muted mb-2 font-13">
                        <strong>Email :</strong> <span class="ml-2 ">{{ $user->email }}</span>
                    </p>

                </div>
                @if (!$user->super_admin)
                    <hr>
                    <form action="{{ route('admin.administrator.destroy', $user->id) }}" method="POST">
                        @method('DELETE')
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-xs btn-block  waves-effect mb-2 waves-light">
                            Supprimer <span class="fa fa-trash"></span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-box">
                <h4>A propos</h4>
                {!! $user->about ?: '--' !!}
                <h3>Propriétaire</h3>
                @if ($user->landlords->count() > 0)
                @foreach ($landlords as $landlord)
                <div class="d-flex align-items-center g-3">
                    <ul>
                        <li>{{ $landlord->name }}</li>
                    </ul>
                    <!-- Display other property details -->
                    <div style="margin-left: 10px;"> <!-- Add margin-left for spacing -->
                        <button class="btn btn-link toggle-form" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse{{ $landlord->id }}" aria-expanded="false" aria-controls="formCollapse{{ $landlord->id }}">Reattribuer</button>
                        <div class="collapse" id="formCollapse{{ $landlord->id }}">
                            <form action="{{ route('admin.landlords.updateAdmin', ['landlord' => $landlord->id]) }}" method="post">
                                @csrf <!-- Include CSRF token -->
                                <select name="admin" class="form-control form-control-sm {{ $errors->has('admin') ? 'is-invalid' : '' }}" onchange="this.form.submit()">
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}" {{ old('admin') == $admin->id || $landlord->admin_id == $admin->id ? 'selected' : '' }}>
                                            {{ $admin->name }}
                                        </option>
                                    @endforeach
                                    @error('admin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
                  
                @else
                    <p>No properties found.</p>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

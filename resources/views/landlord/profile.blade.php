@extends('layouts.panel')

@section('content')
    <div>

        @if (session('success'))
            <div class="col-12 pt-4 pb-3 px-0">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row mx-0">
                        <div class="col-12 pt-4 pb-3 px-0">
                            <h5 class="font-900">Profile</h5>
                        </div>
                        <form method="POST" action="{{ route('landlord.profile') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12 py-5 px-2 px-md-4 main-box">
                                <div class="col-12 form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label for="email">Email *</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 pt-2 d-flex">
                                    <button class="btn btn-primary mt-2">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <div class="row mx-0">
                        <form method="POST" action="{{ route('landlord.change_password') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row right-box mx-0 px-2 px-md-3 pt-2 pb-3 mt-4 mt-md-0">
                                <div class="col-12 py-3">
                                    <h6 class="font-weight-bold">
                                        Change Password
                                    </h6>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" name="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror">
                                    @error('current_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror">
                                    @error('new_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                    <label for="conform_password">Confirm Password</label>
                                    <input type="password" name="new_confirm_password"
                                        class="form-control @error('new_confirm_password') is-invalid @enderror">
                                    @error('new_confirm_password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 pt-2 d-flex">
                                    <button class="btn btn-primary mt-2">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

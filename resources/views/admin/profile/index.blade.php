@extends('admin.layouts.app')
@section('title', 'Profile')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Account Details</h5>
                    <form method="post" action="{{ route('admin.profile.edit') }}">
                        @csrf

                        <div class="form-group">
                            <label>Name <em>*</em></label>
                            <input type="text"
                                   name="name" value="{{ old('name', $user->name) }}"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="Nom" required="">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{ $user->email }}"
                                   class="form-control"
                                   placeholder="Email" readonly>
                        </div>


                        <div class="form-group">
                            <label>About</label>
                            <textarea class="form-control @error('about') is-invalid @enderror"
                                      name="about"
                                      rows="5"
                                      placeholder="This will be displayed under articles written by this user.">{{old('about', $user->about)}}</textarea>
                            @error('about')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Change Password</h5>

                    <form method="post" action="{{ route('admin.profile.password') }}">
                        @csrf

                        <div class="form-group">
                            <label>Current Password <em>*</em></label>
                            <input type="password"
                                   class="form-control {{ $errors->has('current_password') ? "is-invalid" : "" }}"
                                   name="current_password">

                            @if ($errors->has('current_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </div>
                            @endif
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password"
                                   class="form-control {{ $errors->has('password') ? "is-invalid" : "" }}"
                                   name="password">

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <!-- Retype New Password -->
                        <div class="form-group">

                            <label>Retype New Password</label>

                            <input type="password" class="form-control"
                                   name="password_confirmation">

                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection

@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Security</h4>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::routeIs(['profiles.index']) ? 'active' : '' }}"
                        href="{{ route('profiles.index') }}"><i class="ti-xs ti ti-users me-1"></i>
                        Account</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::routeIs(['profiles.change-password']) ? 'active' : '' }}"
                        href="{{ route('profiles.change-password') }}">
                        <i class="ti-xs ti ti-lock me-1"></i> Security</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <form action="{{ route('profiles.update-password') }}" id="formAccountSettings" method="post">
                @csrf

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label for="oldPasswordInput" class="form-label">Current Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control @error('old_password') is-invalid @enderror"
                                id="oldPasswordInput" type="password" name="old_password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label for="newPasswordInput" class="form-label">New Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control @error('new_password') is-invalid @enderror"
                                id="newPasswordInput" type="password" name="new_password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                        <div class="input-group input-group-merge">
                            <input name="new_password_confirmation" type="password" class="form-control"
                                id="confirmNewPasswordInput"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <h6>Password Requirements:</h6>
                        <ul class="ps-3 mb-0">
                            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-1">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
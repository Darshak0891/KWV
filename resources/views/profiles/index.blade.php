@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Account</h4>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::routeIs(['profiles.index']) ? 'active' : '' }}" href="route('profiles.index')"><i class="ti-xs ti ti-users me-1"></i>
                        Account</a>
                </li>
                <li class="nav-item {{ Request::routeIs(['profiles.change-password']) ? 'active' : '' }}">
                    <a class="nav-link {{ Request::routeIs(['profiles.change-password']) ? 'active' : '' }}" href="{{ route('profiles.change-password') }}"><i class="ti-xs ti ti-lock me-1"></i>
                        Security</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="../../assets/img/avatars/14.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="ti ti-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </div>
            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <form action="{{ route('profiles.update') }}" id="formAccountSettings" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">India (+91)</span>
                            <input type="text" id="phoneNumber" name="phone" class="form-control" value="{{  auth()->user()->phone }}" />
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
            </form>
        </div>
        <!-- /Account -->
    </div>
</div>
@endsection
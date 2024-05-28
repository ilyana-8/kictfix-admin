@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-5">
                    <div class="mb-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-4">Update Profile</h5>
                            <a href="{{ route('dashboard')}}" class="btn btn-secondary">Back</a>
                        </div>

                        <form action="{{ route('profile.updateProfile', $profile->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-12 col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{ (old('name')) ? old('name') : $profile->name }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" value="{{ (old('email')) ? old('email') : $profile->email }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-md-6 mb-4">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="tel" value="{{ (old('phone_number')) ? old('phone_number') : $profile->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <h5 class="mb-4">Change Password</h5>
                        <form action="{{ route('profile.updatePassword', $profile->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-12 col-md-6 mb-3">
                                <label for="current-password">Current Password <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('current_password') is-invalid @enderror" id="current-password" name="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-md-6 mb-3">
                                <label for="password">New Password <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-md-6 mb-4">
                                <label for="password-confirm">New Password Confirmation <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="password-confirm" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

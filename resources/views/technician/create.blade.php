@extends('layouts.app')
@section('title', 'Add Technician')

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-primary">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('technician.index') }}" class="link-primary">Technicians</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-4">Register Technician</h5>
                        <a href="{{ route('technician.index') }}" class="btn btn-secondary">Back</a>
                    </div>

                    <form action="{{ route('technician.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="matric_id" class="form-label">Matric ID</label>
                            <input type="number" class="form-control @error('matric_id') is-invalid @enderror" id="matric_id" name="matric_id">
                            @error('matric_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6 mb-4">
                            <label for="password-confirm">Password Confirmation</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Register Technician</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

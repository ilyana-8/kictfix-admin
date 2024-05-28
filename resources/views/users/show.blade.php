@extends('layouts.app')
@section('title', 'User Details')

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-primary">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.index') }}" class="link-primary">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">#{{ $user->id }} - {{ $user->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-4">User Details</h5>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                    </div>

                    <div class="form-group col-12 col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-3">
                        <label for="name" class="form-label">Matric ID</label>
                        <input type="number" value="{{ $user->matric_id }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-4">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tel" value="{{ $user->phone_number }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

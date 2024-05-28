@extends('layouts.app')
@section('title', 'Edit Report')

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-primary">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('report.index') }}" class="link-primary">Reports</a></li>
                    <li class="breadcrumb-item active" aria-current="page">#{{ $report->reporting_id }} - {{ $report->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-5">
                    {{-- View Report details section --}}
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="mb-4">Report Details</h5>
                        </div>
                        <div>
                            @if ($report->technician->id == 2)
                                <a href="#update-technician" class="btn btn-warning me-1">Assign Technician</a>
                            @else
                                <a href="#update-technician" class="btn btn-warning me-1">Update</a>
                            @endif
                            <a href="{{ route('report.index') }}" class="btn btn-secondary ms-1">Back</a>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{ $report->title }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" value="{{ $report->type }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" readonly>{{ $report->description }}</textarea>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-2">
                        <label for="status" class="form-label me-1">Status:</label>
                        @if ($report->status == 'in progress')
                            <td class="align-middle"><span class="badge rounded-pill text-bg-warning">{{ $report->status }}</span></td>
                        @elseif ($report->status == 'not process yet')
                            <td class="align-middle"><span class="badge rounded-pill" style="background-color: #0d6efd;">{{ $report->status }}</span></td>
                        @elseif ($report->status == 'not forwarded')
                            <td class="align-middle"><span class="badge rounded-pill text-bg-danger">{{ $report->status }}</span></td>
                        @elseif ($report->status == 'completed')
                            <td class="align-middle"><span class="badge rounded-pill text-bg-success">{{ $report->status }}</span></td>
                        @endif
                    </div>

                    <div class="form-group col-12 col-md-6 mb-5">
                        <label for="description" class="form-label">Attachment:</label>
                        @if ($report->attachment != null)
                            <a href="{{ env('MAIN_APP_URL') . '/storage/' . $report->attachment }}" target="_blank" class="btn btn-link">Open Attachment<i class="bi bi-box-arrow-up-right ms-2"></i></a>
                        @else
                            <span class="ms-1">No Attachment</span>
                        @endif
                    </div>

                    <hr />

                    {{-- View User details section --}}
                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <h5 class="mb-4">User Details</h5>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-4">
                        <label for="user" class="form-label">User Name</label>
                        <input type="text" value="#{{ $report->user->id }} - {{ $report->user->name }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-4">
                        <label for="matric" class="form-label">Matric No</label>
                        <input type="text" value="{{ $report->user->matric_id }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-4">
                        <label for="email" class="form-label">User Email</label>
                        <input type="text" value="{{ $report->user->email }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-12 col-md-6 mb-5">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" value="{{ $report->user->phone_number }}" class="form-control" readonly>
                    </div>

                    <hr />

                    {{-- View Technician details section --}}
                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <h5 class="mb-4">Technician Details</h5>
                    </div>
                    @if ($report->technician->id == 2)
                        <div class="alert alert-danger col-12 col-md-6 mb-5">
                            <span class="form-label text-danger">{{ $report->technician->name }}</span>
                        </div>
                    @else
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="technician" class="form-label">Technician Name</label>
                            <input type="text" value="#{{ $report->technician->id }} - {{ $report->technician->name }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-12 col-md-6 mb-4">
                            <label for="matric" class="form-label">Matric No</label>
                            <input type="text" value="{{ $report->technician->matric_id }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-12 col-md-6 mb-4">
                            <label for="email" class="form-label">Technician Email</label>
                            <input type="text" value="{{ $report->technician->email }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-12 col-md-6 mb-5">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" value="{{ $report->technician->phone_number }}" class="form-control" readonly>
                        </div>
                    @endif

                    <hr />

                    {{-- Update Technician section --}}
                    <div class="d-flex justify-content-between align-items-center mt-5">
                        @if ($report->technician->id == 2)
                            <h5 class="mb-4">Assign Technician</h5>
                        @else
                            <h5 class="mb-4">Update Report</h5>
                        @endif
                    </div>

                    <form action="{{ route('report.update', $report->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12 col-md-6 mb-3">
                            <label for="name" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="{{ $report->status }}" selected>
                                    {{ $report->status }}
                                </option>
                                @if ($report->status !== 'not process yet')
                                    <option value="not process yet">
                                        not process yet
                                    </option>
                                @endif
                                @if ($report->status !== 'in progress')
                                    <option value="in progress">
                                        in progress
                                    </option>
                                @endif
                                @if ($report->status !== 'not forwarded')
                                    <option value="not forwarded">
                                        not forwarded
                                    </option>
                                @endif
                                @if ($report->status !== 'completed')
                                    <option value="completed">
                                        completed
                                    </option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 mb-4" id="update-technician">
                            <label for="technician" class="form-label">Technician</label>
                            <select class="form-select @error('technician_id') is-invalid @enderror" id="technician_id" name="technician_id">
                                <option value="">Select Technician</option>
                                @foreach($technicians as $technician)
                                    <option value="{{ $technician->id }}" {{ (old('technician_id') == $technician->id || $report->technician_id == $technician->id) ? 'selected' : '' }}>
                                        #{{ $technician->id }} - {{ $technician->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('technician_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if ($report->technician->id == 2)
                            <button type="submit" class="btn btn-primary">Assign Technician</button>
                        @else
                            <button type="submit" class="btn btn-primary">Update Report</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Technician')

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Technicians</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <form action="{{ route('technician.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="query" class="form-control" placeholder="Technicians" aria-label="Search tecnicians" aria-describedby="button-search" value="{{ request()->input('query') }}">
                                    <button class="btn btn-secondary" type="submit" id="button-search">Search</button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('technician.register') }}" class="btn btn-success"><i class="bi bi-plus-lg me-2"></i>Technician</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th>Name</th>
                                    <th>Matric ID</th>
                                    <th>Email Address</th>
                                    <th>Phone Number</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($technicians->count())
                                    @foreach ($technicians as $technician)
                                        <tr>
                                            <td class="align-middle text-center">{{ $technician->id }}</td>
                                            <td class="align-middle">{{ $technician->name }}</td>
                                            <td class="align-middle">{{ $technician->matric_id }}</td>
                                            <td class="align-middle"><a href="mailto:{{ $technician->email }}" class="link-primary">{{ $technician->email }}</a></td>
                                            <td class="align-middle"><a href="tel:{{ $technician->phone }}" class="link-primary">{{ $technician->phone_number }}</a></td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-link link-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="{{ route('technician.show', $technician->id) }}" class="dropdown-item" type="button">View</a></li>
                                                        <li><a href="{{ route('technician.edit', $technician->id) }}" class="dropdown-item" type="button">Edit</a></li>
                                                        <li>
                                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $technician->id }}">
                                                                Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="staticBackdrop{{ $technician->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Technician</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        This process can't be undone! Are you sure you want to delete this technician <span class="fw-bold">#{{ $technician->id }} - {{ $technician->name }}</span> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <form action="{{ route('technician.delete', $technician->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger ms-0">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="align-middle text-center py-3">There is no data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <small>Showing {{$technicians->count()}} of {{ $technicians->total() }} technician(s).</small>
                        {!! $technicians->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

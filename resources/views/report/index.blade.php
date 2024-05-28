@extends('layouts.app')
@section('title', 'Reports')

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <form action="{{ route('report.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="query" class="form-control" placeholder="Reports" aria-label="Search reports" aria-describedby="button-search" value="{{ request()->input('query') }}">
                                    <button class="btn btn-secondary" type="submit" id="button-search">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date Issued</th>
                                    <th>Technician</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reports->count())
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td class="align-middle text-center">{{ $report->reporting_id }}</td>
                                            <td class="align-middle">{{ $report->title }}</td>
                                            <td class="align-middle">{{ $report->type }}</td>
                                            @if ($report->status == 'in progress')
                                                <td class="align-middle"><span class="badge rounded-pill text-bg-warning">{{ $report->status }}</span></td>
                                            @elseif ($report->status == 'not process yet')
                                                <td class="align-middle"><span class="badge rounded-pill" style="background-color: #0d6efd;">{{ $report->status }}</span></td>
                                            @elseif ($report->status == 'not forwarded')
                                                <td class="align-middle"><span class="badge rounded-pill text-bg-danger">{{ $report->status }}</span></td>
                                            @elseif ($report->status == 'completed')
                                                <td class="align-middle"><span class="badge rounded-pill text-bg-success">{{ $report->status }}</span></td>
                                            @endif
                                            <td class="align-middle">{{ $report->created_at }}</td>
                                            @if ($report->technician->id == 2 )
                                                <td class="align-middle text-danger">{{ $report->technician->name }}</td>
                                            @else
                                                <td class="align-middle">{{ $report->technician->name }}</td>
                                            @endif
                                            <td class="align-middle text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-link link-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a href="{{ route('report.edit', $report->id) }}" class="dropdown-item" type="button">Edit</a></li>
                                                        <li>
                                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $report->reporting_id }}">
                                                                Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="staticBackdrop{{ $report->reporting_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Report</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        This process can't be undone! Are you sure you want to delete this report <span class="fw-bold">#{{ $report->reporting_id }} - {{ $report->title }}</span> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <form action="{{ route('report.delete', $report->id) }}" method="POST">
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
                        <small>Showing {{$reports->count()}} of {{ $reports->total() }} report(s).</small>
                        {!! $reports->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 border">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-sm-12 col-md-8 col-lg-6">
            <div class="card alert alert-light text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-boxes"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Hello, {{ Auth::user()->name }}! You have <span class="fw-semibold">{{ $todayReportsCount }} report(s)</span> that have been created today and need your attention.</p>
                            <p class="fs-4 fw-bold text-end mb-0">{{ date('D, d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-light text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-person-x"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Reports No Technicians Assigned</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $reportTechnicianPendingCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-light text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-bar-chart"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Total Reports</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $reportCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-primary text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-x-circle"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Not Process Yet</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $reportNotProcessYetCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-warning text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-hourglass-split"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">In Progress</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $reportInProgressCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-danger text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-arrow-right"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Not Forwarded</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $reportNotForwardedCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-success text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-check-circle"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Completed</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $reportCompletedCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-light text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-people"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Total Users</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $userCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card alert alert-light text-dark shadow h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="fs-2 bi bi-person-gear"></i></h5>
                    <div class="card-text">
                        <div class="d-flex justify-content-between">
                            <p class="align-self-center text-wrap mb-0">Total Technicians</p>
                            <p class="fs-2 fw-bold text-end mb-0">{{ $technicianCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

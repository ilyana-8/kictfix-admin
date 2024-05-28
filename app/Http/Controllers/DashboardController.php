<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::where('role', User::TYPE_USER)->count();
        $technicianCount = User::where('role', User::TYPE_TECHNICIAN)->count();
        $reportCount = Report::count();
        $reportTechnicianPendingCount = Report::where('technician_id', 2)->count();
        $reportInProgressCount = Report::where('status', Report::STATUS_IN_PROGRESS)->count();
        $reportNotProcessYetCount = Report::where('status', Report::STATUS_NOT_PROCESS_YET)->count();
        $reportNotForwardedCount = Report::where('status', Report::STATUS_NOT_FORWARDED)->count();
        $reportCompletedCount = Report::where('status', Report::STATUS_COMPLETED)->count();
        $todayReportsCount = Report::whereDate('created_at', date('Y-m-d'))->count();

        return view('dashboard', compact(
            ['userCount',
            'technicianCount',
            'reportCount',
            'reportInProgressCount',
            'reportTechnicianPendingCount',
            'reportNotProcessYetCount',
            'reportNotForwardedCount',
            'reportCompletedCount',
            'todayReportsCount'
            ]
        ));
    }
}

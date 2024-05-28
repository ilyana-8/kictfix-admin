<?php

namespace App\Http\Controllers;

use App\Mail\TechnicianNotificationMail;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with('technician')->orderBy('created_at', 'DESC')->paginate(10);
        return view('report.index', compact('reports'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = Report::with(['user', 'technician'])->findOrFail($id);
        $technicians = User::where('role', User::TYPE_TECHNICIAN)->get();
        return view('report.edit', compact('report', 'technicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = Report::with(['user', 'technician'])->findOrFail($id);

        $data = $request->validate([
            'status' => 'required|string',
            'technician_id' => 'required|integer',
        ]);

        $oldTechnicianId = $report->technician_id;

        try {
            $emailSentSuccessMsg = '';

            $report->update([
                'status' => $data['status'],
                'technician_id' => $data['technician_id'],
            ]);

            // Check if technician_id was updated
            if ($oldTechnicianId != $data['technician_id'] && $data['technician_id'] != 2) {
                $technician = User::findOrFail($data['technician_id']);

                // Send email to the new technician with attachment
                Mail::to($technician->email)->send(new TechnicianNotificationMail($report, $technician));

                $emailSentSuccessMsg = ' Email has been sent to notify the technician.';
            }

            if ( $emailSentSuccessMsg != '') {
                return redirect()->back()->with('success', 'Report details updated successfully.' . $emailSentSuccessMsg);
            } else {
                return redirect()->back()->with('success', 'Report details updated successfully.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);

        try {
            $report->delete();

            return redirect()->back()->with('success', 'Report deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    public function searchReport(Request $request) {
        $query = $request->input('query');

        $reports = Report::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'LIKE', "%{$query}%")
                             ->orWhere('type', 'LIKE', "%{$query}%")
                             ->orWhere('status', 'LIKE', "%{$query}%")
                             ->orWhere('name', 'LIKE', "%{$query}%")
                             ->orWhere('reporting_id', 'LIKE', "%{$query}%");
            })
            ->paginate(50);

        return view('report.index', compact('reports'));
    }
}

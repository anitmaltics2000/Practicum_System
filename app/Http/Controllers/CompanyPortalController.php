<?php

namespace App\Http\Controllers;

use App\Models\PracticumPlacement;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CompanyPortalController extends Controller
{
    public function dashboard(Request $request)
    {
        $company = Auth::user()->company;

        if (!$company) {
            return redirect('/')->with('error', 'Company profile not found.');
        }

        $query = PracticumPlacement::where('company_id', $company->id)
            ->with('student');

        // Search/filter by course (major)
        if ($request->has('course') && $request->course) {
            $query->whereHas('student', function($q) use ($request) {
                $q->where('major', 'like', '%' . $request->course . '%');
            });
        }

        $applications = $query->paginate(10);

        return view('company-portal', compact('applications', 'company'));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $application = PracticumPlacement::findOrFail($id);
        $company = Auth::user()->company;

        if ($application->company_id !== $company->id) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:accepted,rejected'
        ]);

        $application->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    public function generateReport(Request $request)
    {
        $company = Auth::user()->company;

        $query = PracticumPlacement::where('company_id', $company->id)
            ->with('student');

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $applications = $query->get();

        $pdf = Pdf::loadView('reports.company-applications', compact('applications', 'company'));

        return $pdf->download('company-applications-report.pdf');
    }
}

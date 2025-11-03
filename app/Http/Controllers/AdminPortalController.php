<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\PracticumPlacement;

class AdminPortalController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_students' => User::where('role', 'student')->count(),
            'total_companies' => Company::count(),
            'total_applications' => PracticumPlacement::count(),
            'pending_applications' => PracticumPlacement::where('status', 'pending')->count(),
            'approved_applications' => PracticumPlacement::where('status', 'approved')->count(),
            'rejected_applications' => PracticumPlacement::where('status', 'rejected')->count(),
        ];

        $recent_applications = PracticumPlacement::with(['student', 'company'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $recent_users = User::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin-portal', compact('stats', 'recent_applications', 'recent_users'));
    }

    public function manageUsers()
    {
        $students = User::where('role', 'student')->with('company')->get();
        $companies = User::where('role', 'company')->with('company')->get();
        $admins = User::where('role', 'admin')->get();

        return view('admin.manage-users', compact('students', 'companies', 'admins'));
    }

    public function manageApplications()
    {
        $applications = PracticumPlacement::with(['student', 'company'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.manage-applications', compact('applications'));
    }

    public function generateReports()
    {
        // Generate comprehensive system reports
        $report_data = [
            'user_stats' => [
                'students' => User::where('role', 'student')->count(),
                'companies' => User::where('role', 'company')->count(),
                'admins' => User::where('role', 'admin')->count(),
            ],
            'application_stats' => [
                'total' => PracticumPlacement::count(),
                'pending' => PracticumPlacement::where('status', 'pending')->count(),
                'approved' => PracticumPlacement::where('status', 'approved')->count(),
                'rejected' => PracticumPlacement::where('status', 'rejected')->count(),
            ],
            'company_stats' => Company::selectRaw('industry, COUNT(*) as count')
                ->groupBy('industry')
                ->get(),
        ];

        return view('admin.reports', compact('report_data'));
    }

    public function systemSettings()
    {
        return view('admin.system-settings');
    }
}

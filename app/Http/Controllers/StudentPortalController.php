<?php

namespace App\Http\Controllers;

use App\Models\PracticumPlacement;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentPortalController extends Controller
{
    public function dashboard()
    {
        $applications = Auth::user()->practicumPlacements()
            ->with('company')
            ->get();

        return view('student-portal', compact('applications'));
    }

    public function showApplyForm()
    {
        $companies = Company::all();
        return view('apply', compact('companies'));
    }

    public function submitApplication(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'position_title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'requirements' => 'nullable|string',
            'stipend' => 'nullable|numeric|min:0',
            'supervisor_name' => 'required|string|max:255',
            'supervisor_email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('applications/cv', 'public');
        $coverLetterPath = $request->file('cover_letter')->store('applications/cover_letter', 'public');

        PracticumPlacement::create([
            'student_id' => Auth::id(),
            'company_id' => $request->company_id,
            'position_title' => $request->position_title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'requirements' => $request->requirements,
            'stipend' => $request->stipend,
            'supervisor_name' => $request->supervisor_name,
            'supervisor_email' => $request->supervisor_email,
            'cv_path' => $cvPath,
            'cover_letter_path' => $coverLetterPath,
            'status' => 'pending',
        ]);

        return redirect()->route('student.portal')->with('success', 'Application submitted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\HRStaff;
use App\Models\Employee;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // List of reports
    public function index()
    {
        $reports = Report::with(['hr', 'employee'])->get();

        return view('reports.index', compact('reports'));
    }

    // Show create form
    public function create()
    {
        $hrstaff = HRStaff::all();
        $employees = Employee::all();

        return view('reports.create', compact('hrstaff', 'employees'));
    }

    // Store new report
    public function store(Request $request)
    {
        $request->validate([
            'hr_id'         => 'required',
            'employee_id'   => 'required',
            'report_type'   => 'required|string|max:255',
            'generated_date'=> 'required|date',
            'description'   => 'nullable|string',
        ]);

        Report::create([
            'hr_id'         => $request->hr_id,
            'employee_id'   => $request->employee_id,
            'report_type'   => $request->report_type,
            'generated_date'=> $request->generated_date,
            'description'   => $request->description,
        ]);

        return redirect()->route('reports.index')
                         ->with('success', 'Report created successfully.');
    }

    // Show single report
    public function show(Report $report)
    {
        // $report is auto-loaded by id
        return view('reports.show', compact('report'));
    }
}

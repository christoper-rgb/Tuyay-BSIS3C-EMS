<?php

namespace App\Http\Controllers;

use App\Models\EmploymentHistory;
use App\Models\Employee;
use App\Models\Department;
use App\Models\JobRole;
use Illuminate\Http\Request;

class EmploymentHistoryController extends Controller
{
    public function index()
    {
        $histories = EmploymentHistory::with(['employee', 'department', 'jobRole'])->get();
        return view('employmenthistory.index', compact('histories'));
    }

    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $jobroles = JobRole::all();

        return view('employmenthistory.create', compact('employees', 'departments', 'jobroles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'job_role_id'   => 'required|exists:job_roles,id',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
        ]);

        EmploymentHistory::create($request->all());

        return redirect()->route('employmenthistory.index')
            ->with('success', 'Employment history added successfully.');
    }

    public function edit(EmploymentHistory $employmenthistory)
    {
        $employees = Employee::all();
        $departments = Department::all();
        $jobroles = JobRole::all();

        return view('employmenthistory.edit', compact('employmenthistory', 'employees', 'departments', 'jobroles'));
    }

    public function update(Request $request, EmploymentHistory $employmenthistory)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'job_role_id'   => 'required|exists:job_roles,id',
            'start_date'    => 'required|date',
            'end_date'      => 'nullable|date|after_or_equal:start_date',
        ]);

        $employmenthistory->update($request->all());

        return redirect()->route('employmenthistory.index')
            ->with('success', 'Employment history updated successfully.');
    }

    public function destroy(EmploymentHistory $employmenthistory)
    {
        $employmenthistory->delete();

        return redirect()->route('employmenthistory.index')
            ->with('success', 'Employment history deleted successfully.');
    }
}

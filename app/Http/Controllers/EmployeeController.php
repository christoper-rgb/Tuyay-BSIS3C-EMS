<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\JobRole;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['department', 'jobRole'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $jobroles = JobRole::all();
        return view('employees.create', compact('departments', 'jobroles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'birthdate'     => 'nullable|date',
            'contact_info'  => 'nullable|string|max:255',
            'address'       => 'nullable|string|max:255',
            'status'        => 'required|string|max:50',
            'department_id' => 'nullable|exists:departments,id',
            'job_role_id'   => 'nullable|exists:job_roles,id',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $jobroles = JobRole::all();
        return view('employees.edit', compact('employee', 'departments', 'jobroles'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'birthdate'     => 'nullable|date',
            'contact_info'  => 'nullable|string|max:255',
            'address'       => 'nullable|string|max:255',
            'status'        => 'required|string|max:50',
            'department_id' => 'nullable|exists:departments,id',
            'job_role_id'   => 'nullable|exists:job_roles,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}

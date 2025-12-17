<?php

namespace App\Http\Controllers;

use App\Models\JobRole;
use Illuminate\Http\Request;

class JobRoleController extends Controller
{
    public function index()
    {
        $jobroles = JobRole::all();
        return view('jobroles.index', compact('jobroles'));
    }

    public function create()
    {
        return view('jobroles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        JobRole::create($request->all());

        return redirect()->route('jobroles.index')
            ->with('success', 'Job Role created successfully.');
    }

    public function edit(JobRole $jobrole)
    {
        return view('jobroles.edit', compact('jobrole'));
    }

    public function update(Request $request, JobRole $jobrole)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $jobrole->update($request->all());

        return redirect()->route('jobroles.index')
            ->with('success', 'Job Role updated successfully.');
    }

    public function destroy(JobRole $jobrole)
    {
        $jobrole->delete();

        return redirect()->route('jobroles.index')
            ->with('success', 'Job Role deleted successfully.');
    }
}

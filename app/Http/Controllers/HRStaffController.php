<?php

namespace App\Http\Controllers;

use App\Models\HRStaff;
use Illuminate\Http\Request;

class HRStaffController extends Controller
{
    public function index()
    {
        $hrstaff = HRStaff::all();
        return view('hrstaff.index', compact('hrstaff'));
    }

    public function create()
    {
        return view('hrstaff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'      => 'required|unique:hr_staff,username',
            'password_hash' => 'required',
            'full_name'     => 'nullable|string|max:255',
            'role'          => 'nullable|string|max:255',
        ]);

        HRStaff::create([
            'username'      => $request->username,
            'password_hash' => password_hash($request->password_hash, PASSWORD_DEFAULT),
            'full_name'     => $request->full_name,
            'role'          => $request->role ?? 'HR',
        ]);

        return redirect()->route('hrstaff.index')
                         ->with('success', 'HR Staff added successfully.');
    }
}

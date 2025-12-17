<?php

namespace App\Http\Controllers;

use App\Models\SystemAdmin;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    public function index()
    {
        $admins = SystemAdmin::all();
        return view('systemadmin.index', compact('admins'));
    }

    public function create()
    {
        return view('systemadmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|max:255|unique:system_admins,username',
            'password_hash' => 'required|string|max:255',
            'full_name'     => 'required|string|max:255',
            'role'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        SystemAdmin::create($request->all());

        return redirect()->route('systemadmin.index')
            ->with('success', 'System Admin created successfully.');
    }

    public function edit(SystemAdmin $systemadmin)
    {
        return view('systemadmin.edit', compact('systemadmin'));
    }

    public function update(Request $request, SystemAdmin $systemadmin)
    {
        $request->validate([
            'username'      => 'required|string|max:255|unique:system_admins,username,' . $systemadmin->id,
            'password_hash' => 'required|string|max:255',
            'full_name'     => 'required|string|max:255',
            'role'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        $systemadmin->update($request->all());

        return redirect()->route('systemadmin.index')
            ->with('success', 'System Admin updated successfully.');
    }

    public function destroy(SystemAdmin $systemadmin)
    {
        $systemadmin->delete();

        return redirect()->route('systemadmin.index')
            ->with('success', 'System Admin deleted successfully.');
    }
}

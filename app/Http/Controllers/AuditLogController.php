<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\HRStaff;
use App\Models\SystemAdmin;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::with(['hr', 'admin'])->get();
        return view('auditlogs.index', compact('logs'));
    }

    public function create()
    {
        $hrstaff = HRStaff::all();
        $admins = SystemAdmin::all();
        return view('auditlogs.create', compact('hrstaff', 'admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hr_id'       => 'nullable|exists:hr_staff,id',
            'admin_id'    => 'nullable|exists:system_admins,id',
            'action_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'timestamp'   => 'required|date',
            'performed_by'=> 'required|string|max:255',
        ]);

        AuditLog::create($request->all());

        return redirect()->route('auditlogs.index')
            ->with('success', 'Audit log created successfully.');
    }

    public function edit(AuditLog $auditlog)
    {
        $hrstaff = HRStaff::all();
        $admins = SystemAdmin::all();
        return view('auditlogs.edit', compact('auditlog', 'hrstaff', 'admins'));
    }

    public function update(Request $request, AuditLog $auditlog)
    {
        $request->validate([
            'hr_id'       => 'nullable|exists:hr_staff,id',
            'admin_id'    => 'nullable|exists:system_admins,id',
            'action_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'timestamp'   => 'required|date',
            'performed_by'=> 'required|string|max:255',
        ]);

        $auditlog->update($request->all());

        return redirect()->route('auditlogs.index')
            ->with('success', 'Audit log updated successfully.');
    }

    public function destroy(AuditLog $auditlog)
    {
        $auditlog->delete();

        return redirect()->route('auditlogs.index')
            ->with('success', 'Audit log deleted successfully.');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobRoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmploymentHistoryController;
use App\Http\Controllers\HRStaffController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\SystemAdminController;

Route::get('/', function () {
    return redirect()->route('departments.index');
});

Route::resource('departments', DepartmentController::class);
Route::resource('jobroles', JobRoleController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('employmenthistory', EmploymentHistoryController::class);
Route::resource('hrstaff', HRStaffController::class);
Route::resource('reports', ReportController::class);
Route::resource('auditlogs', AuditLogController::class);
Route::resource('systemadmin', SystemAdminController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
use Illuminate\Support\Facades\DB;
Route::get('/dashboard', function () {

    $departments = DB::table('departments')->count();
    $jobRoles = DB::table('job_roles')->count();
    $employees = DB::table('employees')->count();
    $hrStaff = DB::table('hr_staff')->count();
    $auditLogs = DB::table('audit_logs')->count();
    $reports = DB::table('reports')->count();
    $systemAdmin = DB::table('system_admin')->count();

    return view('dashboard', compact(
        'departments',
        'jobRoles',
        'employees',
        'hrStaff',
        'auditLogs',
        'reports',
        'systemAdmin'
    ));
});
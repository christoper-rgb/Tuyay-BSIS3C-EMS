@extends('layout')

@section('content')
<div class="container-fluid mt-4">

    <h2 class="mb-4">EMPLOYEE MANAGEMENT SYSTEM Dashboard</h2>

    <div class="row">

        <!-- Departments -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('departments.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>Departments</h4>
                    <div style="font-size:40px;">📁</div>
                    <h3 class="mt-2">{{ $departments }}</h3>
                </div>
            </a>
        </div>

        <!-- Job Roles -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('jobroles.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>Job Roles</h4>
                    <div style="font-size:40px;">🧩</div>
                    <h3 class="mt-2">{{ $jobRoles }}</h3>
                </div>
            </a>
        </div>

        <!-- Employees -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('employees.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>Employees</h4>
                    <div style="font-size:40px;">👥</div>
                    <h3 class="mt-2">{{ $employees }}</h3>
                </div>
            </a>
        </div>

        <!-- HR Staff -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('hrstaff.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>HR Staff</h4>
                    <div style="font-size:40px;">🧑‍💼</div>
                    <h3 class="mt-2">{{ $hrStaff }}</h3>
                </div>
            </a>
        </div>

        <!-- Audit Logs -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('auditlogs.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>Audit Logs</h4>
                    <div style="font-size:40px;">📝</div>
                    <h3 class="mt-2">{{ $auditLogs }}</h3>
                </div>
            </a>
        </div>

        <!-- Reports -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('reports.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>Reports</h4>
                    <div style="font-size:40px;">📊</div>
                    <h3 class="mt-2">{{ $reports }}</h3>
                </div>
            </a>
        </div>

        <!-- System Admin -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('systemadmin.index') }}" class="text-decoration-none text-dark">
                <div class="card text-center p-3 shadow-sm">
                    <h4>System Admin</h4>
                    <div style="font-size:40px;">⚙️</div>
                    <h3 class="mt-2">{{ $systemAdmin }}</h3>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection

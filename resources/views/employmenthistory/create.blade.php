@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Add Employment History</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Fix the errors below:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employmenthistory.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                <option value="">-- Select Employee --</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}">
                        {{ $emp->first_name }} {{ $emp->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">-- Select Department --</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Job Role</label>
            <select name="job_role_id" class="form-control" required>
                <option value="">-- Select Job Role --</option>
                @foreach($jobroles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('employmenthistory.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

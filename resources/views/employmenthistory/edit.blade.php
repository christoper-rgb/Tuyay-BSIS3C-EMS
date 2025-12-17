@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Employment History</h2>

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

    <form action="{{ route('employmenthistory.update', $employmenthistory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}"
                        {{ $employmenthistory->employee_id == $emp->id ? 'selected' : '' }}>
                        {{ $emp->first_name }} {{ $emp->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control" required>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}"
                        {{ $employmenthistory->department_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->department_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Job Role</label>
            <select name="job_role_id" class="form-control" required>
                @foreach($jobroles as $role)
                    <option value="{{ $role->id }}"
                        {{ $employmenthistory->job_role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->role_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control"
                   value="{{ $employmenthistory->start_date }}" required>
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control"
                   value="{{ $employmenthistory->end_date }}">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('employmenthistory.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

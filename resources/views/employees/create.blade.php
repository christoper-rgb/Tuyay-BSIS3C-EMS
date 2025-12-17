@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Add Employee</h2>

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

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label class="form-label">Birthdate</label>
                <input type="date" name="birthdate" class="form-control">
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label">Contact Info</label>
                <input type="text" name="contact_info" class="form-control">
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control">
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">Department</label>
                <select name="department_id" class="form-control">
                    <option value="">-- Select Department --</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Job Role</label>
                <select name="job_role_id" class="form-control">
                    <option value="">-- Select Job Role --</option>
                    @foreach($jobroles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

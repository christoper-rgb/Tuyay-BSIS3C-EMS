@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Add Audit Log</h2>

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

    <form action="{{ route('auditlogs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>HR Staff</label>
            <select name="hr_id" class="form-control">
                <option value="">-- None --</option>
                @foreach($hrstaff as $hr)
                    <option value="{{ $hr->id }}">{{ $hr->full_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Admin</label>
            <select name="admin_id" class="form-control">
                <option value="">-- None --</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->full_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Action Type</label>
            <input type="text" name="action_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Timestamp</label>
            <input type="datetime-local" name="timestamp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Performed By</label>
            <input type="text" name="performed_by" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('auditlogs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

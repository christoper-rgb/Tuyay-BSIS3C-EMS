@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Audit Logs</h2>

    <a href="{{ route('auditlogs.create') }}" class="btn btn-primary mb-3">
        Add Audit Log
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($logs->count() == 0)
        <div class="alert alert-info">No audit logs found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>HR Staff</th>
                    <th>Admin</th>
                    <th>Action</th>
                    <th>Description</th>
                    <th>Timestamp</th>
                    <th>Performed By</th>
                    <th width="200px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->hr->full_name ?? '-' }}</td>
                    <td>{{ $log->admin->full_name ?? '-' }}</td>
                    <td>{{ $log->action_type }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->timestamp }}</td>
                    <td>{{ $log->performed_by }}</td>
                    <td>
                        <a href="{{ route('auditlogs.edit', $log->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('auditlogs.destroy', $log->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Delete this log?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

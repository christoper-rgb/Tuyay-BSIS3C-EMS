@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Employment History</h2>

    <a href="{{ route('employmenthistory.create') }}" class="btn btn-primary mb-3">
        Add Employment History
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($histories->count() == 0)
        <div class="alert alert-info">No employment history found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Job Role</th>
                    <th>Start</th>
                    <th>End</th>
                    <th width="200px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $h)
                <tr>
                    <td>{{ $h->id }}</td>
                    <td>{{ $h->employee->first_name }} {{ $h->employee->last_name }}</td>
                    <td>{{ $h->department->department_name }}</td>
                    <td>{{ $h->jobRole->role_name }}</td>
                    <td>{{ $h->start_date }}</td>
                    <td>{{ $h->end_date ?? 'Present' }}</td>
                    <td>
                        <a href="{{ route('employmenthistory.edit', $h->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('employmenthistory.destroy', $h->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Delete this record?');">
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

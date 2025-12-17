@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Employees</h2>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
        Add Employee
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($employees->count() == 0)
        <div class="alert alert-info">No employees found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Department</th>
                    <th>Job Role</th>
                    <th style="width: 210px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $emp)
                    <tr>
                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->first_name }} {{ $emp->last_name }}</td>
                        <td>{{ $emp->birthdate }}</td>
                        <td>{{ $emp->contact_info }}</td>
                        <td>{{ $emp->address }}</td>
                        <td>{{ $emp->status }}</td>
                        <td>{{ $emp->department ? $emp->department->department_name : '-' }}</td>
                        <td>{{ $emp->jobRole ? $emp->jobRole->role_name : '-' }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $emp->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('employees.destroy', $emp->id) }}"
                                  method="POST"
                                  style="display:inline-block;"
                                  onsubmit="return confirm('Delete this employee?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

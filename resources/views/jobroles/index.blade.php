@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Job Roles</h2>

    <a href="{{ route('jobroles.create') }}" class="btn btn-primary mb-3">
        Add Job Role
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($jobroles->count() == 0)
        <div class="alert alert-info">No job roles found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Role Name</th>
                    <th>Description</th>
                    <th style="width: 210px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobroles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="{{ route('jobroles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('jobroles.destroy', $role->id) }}"
                                  method="POST"
                                  style="display:inline-block;"
                                  onsubmit="return confirm('Delete this job role?');">
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

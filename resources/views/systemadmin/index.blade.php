@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">System Administrators</h2>

    <a href="{{ route('systemadmin.create') }}" class="btn btn-primary mb-3">
        Add System Admin
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($admins->count() == 0)
        <div class="alert alert-info">No system admins found.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th width="200px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->full_name }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>{{ $admin->description }}</td>
                    <td>
                        <a href="{{ route('systemadmin.edit', $admin->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('systemadmin.destroy', $admin->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Delete this admin?');">
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

@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Departments</h2>

    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">
        Add Department
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($departments->count() == 0)
        <div class="alert alert-info">
            No departments found. Click "Add Department" to create one.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Department Name</th>
                    <th>Description</th>
                    <th style="width: 210px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $dept)
                    <tr>
                        <td>{{ $dept->id }}</td>
                        <td>{{ $dept->department_name }}</td>
                        <td>{{ $dept->description }}</td>
                        <td>
                            <a
                                href="{{ route('departments.edit', $dept->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('departments.destroy', $dept->id) }}"
                                method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('Are you sure you want to delete this department?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
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

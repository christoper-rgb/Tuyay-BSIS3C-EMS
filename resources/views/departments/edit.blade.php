@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Department</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input
                type="text"
                name="department_name"
                class="form-control"
                value="{{ old('department_name', $department->department_name) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea
                name="description"
                class="form-control"
                rows="3"
            >{{ old('description', $department->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Update
        </button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection

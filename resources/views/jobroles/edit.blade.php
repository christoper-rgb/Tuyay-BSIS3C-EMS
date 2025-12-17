@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Job Role</h2>

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

    <form action="{{ route('jobroles.update', $jobrole->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Role Name</label>
            <input type="text" name="role_name" class="form-control" value="{{ $jobrole->role_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $jobrole->description }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('jobroles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

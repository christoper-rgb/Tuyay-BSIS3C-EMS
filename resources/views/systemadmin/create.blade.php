@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Add System Admin</h2>

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

    <form action="{{ route('systemadmin.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password Hash</label>
            <input type="text" name="password_hash" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <input type="text" name="role" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('systemadmin.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

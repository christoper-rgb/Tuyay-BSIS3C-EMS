@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Add HR Staff</h2>

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

    <form action="{{ route('hrstaff.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password_hash" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <input type="text" name="role" class="form-control" value="HR">
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('hrstaff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

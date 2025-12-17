@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit HR Staff</h2>

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

    <form action="{{ route('hrstaff.update', $hrstaff->hr_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control"
                   value="{{ $hrstaff->username }}" required>
        </div>

        <div class="mb-3">
            <label>Password Hash</label>
            <input type="text" name="password_hash" class="form-control"
                   value="{{ $hrstaff->password_hash }}" required>
        </div>

        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control"
                   value="{{ $hrstaff->full_name }}">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <input type="text" name="role" class="form-control"
                   value="{{ $hrstaff->role }}">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('hrstaff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

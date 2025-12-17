@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">HR Staff List</h2>

    <a href="{{ route('hrstaff.create') }}" class="btn btn-primary mb-3">Add HR Staff</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            @foreach($hrstaff as $hr)
            <tr>
                <td>{{ $hr->hr_id }}</td>
                <td>{{ $hr->username }}</td>
                <td>{{ $hr->full_name }}</td>
                <td>{{ $hr->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

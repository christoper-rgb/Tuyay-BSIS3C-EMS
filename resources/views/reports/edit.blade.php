@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Edit Report</h2>

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

    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>HR Staff</label>
            <select name="hr_id" class="form-control" required>
                @foreach($hrstaff as $hr)
                    <option value="{{ $hr->id }}"
                        {{ $report->hr_id == $hr->id ? 'selected' : '' }}>
                        {{ $hr->full_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}"
                        {{ $report->employee_id == $emp->id ? 'selected' : '' }}>
                        {{ $emp->first_name }} {{ $emp->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Report Type</label>
            <input type="text" name="report_type" class="form-control"
                   value="{{ $report->report_type }}" required>
        </div>

        <div class="mb-3">
            <label>Generated Date</label>
            <input type="date" name="generated_date" class="form-control"
                   value="{{ $report->generated_date }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $report->description }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

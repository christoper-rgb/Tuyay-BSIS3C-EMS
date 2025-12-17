@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Reports</h2>

    <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Add Report</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>HR Staff</th>
                <th>Employee</th>
                <th>Type</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->hr->full_name ?? '-' }}</td>
                <td>
                    {{ $report->employee->first_name ?? '' }}
                    {{ $report->employee->last_name ?? '' }}
                </td>
                <td>{{ $report->report_type }}</td>
                <td>{{ $report->generated_date }}</td>
                <td>
                    <a href="{{ route('reports.show', $report) }}" class="btn btn-info btn-sm">
                        View
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

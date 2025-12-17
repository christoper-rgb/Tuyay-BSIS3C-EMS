@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-3">Report Details</h2>

    <p><strong>HR Staff:</strong> {{ $report->hr->full_name ?? '-' }}</p>
    <p><strong>Employee:</strong>
        {{ $report->employee->first_name ?? '' }}
        {{ $report->employee->last_name ?? '' }}
    </p>
    <p><strong>Type:</strong> {{ $report->report_type }}</p>
    <p><strong>Date:</strong> {{ $report->generated_date }}</p>
    <p><strong>Description:</strong> {{ $report->description }}</p>

    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection

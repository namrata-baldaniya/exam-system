@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>My Exam Results</h2>
        <p class="text-muted">Check your performance for each exam.</p>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam</th>
                <th>Score</th>
                <th>Percentage</th>
                <th>Status</th>
                <th>Taken At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($results as $index => $result)
                @php
                    $totalQuestions = $result->exam->questions->count();
                    $percentage = $totalQuestions > 0 ? ($result->score / $totalQuestions) * 100 : 0;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $result->exam->title }}</td>
                    <td>{{ $result->score }}/{{ $totalQuestions }}</td>
                    <td>{{ round($percentage,2) }}%</td>
                    <td>
                        <span class="badge {{ $percentage >= $result->exam->passing_percentage ? 'bg-success' : 'bg-danger' }}">
                            {{ $percentage >= $result->exam->passing_percentage ? 'Pass' : 'Fail' }}
                        </span>
                    </td>
                    <td>{{ $result->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No results found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

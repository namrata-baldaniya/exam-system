@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Exam Results</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>User</th>
                <th>Exam</th>
                <th>Score</th>
                <th>Total Marks</th>
                <th>Percentage</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($results as $r)
                <tr>
                    <td>{{ $r->user->name }}</td>
                    <td>{{ $r->exam->title }}</td>
                    <td>{{ $r->score }}</td>
                    <td>{{ $r->total_marks }}</td>
                    <td>{{ round(($r->score/$r->total_marks)*100,2) }}%</td>
                    <td>
                        @if($r->passed)
                            <span class="badge bg-success">Pass</span>
                        @else
                            <span class="badge bg-danger">Fail</span>
                        @endif
                    </td>
                    <td>{{ $r->created_at->format('d M, Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No results found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

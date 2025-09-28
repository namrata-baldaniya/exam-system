@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="text-center mb-4">
        <h2>Available Exams</h2>
        <p class="text-muted">Click "Take Exam" to start.</p>
    </div>

    <div class="row">
        @forelse($exams as $exam)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">{{ $exam->title }}</h5>
                    <p class="card-text">
                        Duration: {{ $exam->duration }} minutes<br>
                        Start: {{ $exam->start_time?->format('d M, Y H:i') ?? 'Anytime' }}<br>
                        End: {{ $exam->end_time?->format('d M, Y H:i') ?? 'No deadline' }}<br>
                        Passing Percentage: {{ $exam->passing_percentage }}%
                    </p>
                    <a href="{{ route('user.exams.show', $exam->id) }}" class="btn btn-success mt-auto">Take Exam</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                No exams available at the moment.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
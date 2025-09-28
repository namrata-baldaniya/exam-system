@extends('layouts.app')

@section('content')
<h2>Edit Exam</h2>

<form action="{{ route('admin.exams.update', $exam->id) }}" method="POST">
    @csrf
    @method('PUT')

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Exam Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $exam->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Duration (minutes)</label>
        <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $exam->duration) }}" required>
    </div>

    <div class="mb-3">
        <label for="passing_percentage" class="form-label">Passing Percentage</label>
        <input type="number" class="form-control" id="passing_percentage" name="passing_percentage" value="{{ old('passing_percentage', $exam->passing_percentage) }}" required>
    </div>

    <div class="mb-3">
        <label for="start_time" class="form-label">Start Time</label>
        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $exam->start_time ? $exam->start_time->format('Y-m-d\TH:i') : '') }}">
    </div>

    <div class="mb-3">
        <label for="end_time" class="form-label">End Time</label>
        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $exam->end_time ? $exam->end_time->format('Y-m-d\TH:i') : '') }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Exam</button>
    <a href="{{ route('admin.exams.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

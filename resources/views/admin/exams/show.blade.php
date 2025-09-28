@extends('layouts.app')

@section('content')
<h2>Exam Details</h2>

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <td>{{ $exam->title }}</td>
    </tr>
    <tr>
        <th>Duration</th>
        <td>{{ $exam->duration }} minutes</td>
    </tr>
    <tr>
        <th>Passing Percentage</th>
        <td>{{ $exam->passing_percentage }}%</td>
    </tr>
    <tr>
        <th>Start Time</th>
        <td>{{ $exam->start_time }}</td>
    </tr>
    <tr>
        <th>End Time</th>
        <td>{{ $exam->end_time }}</td>
    </tr>
</table>

<a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-primary">Edit Exam</a>
<a href="{{ route('admin.exams.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

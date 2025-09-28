@extends('layouts.app')

@section('content')
<h2>Exams List</h2>
<a href="{{ route('admin.exams.create') }}" class="btn btn-success mb-3">Add New Exam</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Duration (min)</th>
            <th>Passing %</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exams as $exam)
        <tr>
            <td>{{ $exam->id }}</td>
            <td>{{ $exam->title }}</td>
            <td>{{ $exam->duration }}</td>
            <td>{{ $exam->passing_percentage }}%</td>
            <td>
                <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

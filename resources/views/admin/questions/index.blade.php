@extends('layouts.app')

@section('content')
<h2>Questions List</h2>
<a href="{{ route('admin.questions.create') }}" class="btn btn-success mb-3">Add New Question</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Exam</th>
            <th>Question</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $index =>$question)
        <tr>
            <td>{{ $questions->firstItem() + $index }}</td>
            <td>{{ $question->exam->title }}</td>
            <td>{{ Str::limit($question->question_text, 50) }}</td>
            <td>
                <a href="{{ route('admin.questions.show', $question->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-3">
    {{ $questions->links() }}
</div>
@endsection

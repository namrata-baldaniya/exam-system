@extends('layouts.app')

@section('content')
<h2>Question Details</h2>

<table class="table table-bordered">
    <tr>
        <th>Exam</th>
        <td>{{ $question->exam->title }}</td>
    </tr>
    <tr>
        <th>Question</th>
        <td>{{ $question->question_text }}</td>
    </tr>
    <tr>
        <th>Options</th>
        <td>
            1. {{ $question->option1 }} <br>
            2. {{ $question->option2 }} <br>
            3. {{ $question->option3 }} <br>
            4. {{ $question->option4 }}
        </td>
    </tr>
    <tr>
        <th>Correct Answer</th>
        <td>{{ $question->correct_option }}</td>
    </tr>
</table>

<a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-primary">Edit</a>
<a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

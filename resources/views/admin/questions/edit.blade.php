@extends('layouts.app')

@section('content')
<h2>Edit Question</h2>

<form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
    @csrf
    @method('PUT')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


    <div class="mb-3">
        <label for="exam_id" class="form-label">Exam</label>
        <select class="form-select" name="exam_id" id="exam_id" required>
            @foreach($exams as $exam)
                <option value="{{ $exam->id }}" @if($exam->id == $question->exam_id) selected @endif>{{ $exam->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea class="form-control" name="question_text" id="question_text" rows="3" required>{{ old('question_text', $question->question_text) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Options</label>
        <input type="text" class="form-control mb-1" name="option1" value="{{ old('option1', $question->option1) }}" required>
        <input type="text" class="form-control mb-1" name="option2" value="{{ old('option2', $question->option2) }}" required>
        <input type="text" class="form-control mb-1" name="option3" value="{{ old('option3', $question->option3) }}" required>
        <input type="text" class="form-control mb-1" name="option4" value="{{ old('option4', $question->option4) }}" required>
    </div>

    <div class="mb-3">
    <label for="correct_option" class="form-label">Correct Answer (1-4)</label>
    <input type="number" class="form-control" name="correct_option" min="1" max="4"
        value="{{ old('correct_option', substr($question->correct_option, 6, 1)) }}" required>
</div>


    <button type="submit" class="btn btn-primary">Update Question</button>
    <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

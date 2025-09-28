@extends('layouts.app')

@section('content')
<h2>Add New Question</h2>

<form action="{{ route('admin.questions.store') }}" method="POST">
    @csrf

    
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
            <option value="">Select Exam</option>
            @foreach($exams as $exam)
                <option value="{{ $exam->id }}">{{ $exam->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea class="form-control" name="question_text" id="question_text" rows="3" required>{{ old('question_text') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Options</label>
        <input type="text" class="form-control mb-1" name="option1" placeholder="Option 1" required>
        <input type="text" class="form-control mb-1" name="option2" placeholder="Option 2" required>
        <input type="text" class="form-control mb-1" name="option3" placeholder="Option 3" required>
        <input type="text" class="form-control mb-1" name="option4" placeholder="Option 4" required>
    </div>

    <div class="mb-3">
        <label for="correct_answer" class="form-label">Correct Answer (1-4)</label>
        <input type="number" class="form-control" name="correct_option" min="1" max="4" required>
    </div>

    <button type="submit" class="btn btn-success">Add Question</button>
    <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

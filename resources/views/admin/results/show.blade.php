@extends('layouts.app')

@section('content')
<h2>Result Details</h2>
<p>User: {{ $result->user->name }}</p>
<p>Exam: {{ $result->exam->title }}</p>
<p>Score: {{ $result->score }} / {{ $result->total_marks }}</p>
<p>Passed: {{ $result->passed ? 'Yes' : 'No' }}</p>
@endsection

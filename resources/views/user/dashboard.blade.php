@extends('layouts.app')

@section('content')
<h2>Welcome, {{ auth()->user()->name }}</h2>
<p>You are logged in as <strong>User</strong></p>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5>Take Exam</h5>
                <a href="{{ route('user.exams.index') }}" class="btn btn-success">Go</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5>My Results</h5>
                <a href="{{ route('user.results') }}" class="btn btn-success">View</a>
            </div>
        </div>
    </div>
</div>
@endsection

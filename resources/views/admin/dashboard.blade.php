@extends('layouts.app')

@section('content')
<h2>Welcome, {{ auth()->user()->name }}</h2>
<p>You are logged in as <strong>Admin</strong></p>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Exams</h5>
                <a href="{{ route('admin.exams.index') }}" class="btn btn-primary">Manage</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Questions</h5>
                <a href="{{ route('admin.questions.index') }}" class="btn btn-primary">Manage</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Categories</h5>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Manage</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5>Reports</h5>
                <a href="{{ route('admin.results.index') }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
</div>
@endsection

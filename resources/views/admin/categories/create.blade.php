@extends('layouts.app')

@section('content')
<h2>Add New Category</h2>

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Add Category</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

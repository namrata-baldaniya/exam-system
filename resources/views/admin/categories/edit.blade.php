@extends('layouts.app')

@section('content')
<h2>Edit Category</h2>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection

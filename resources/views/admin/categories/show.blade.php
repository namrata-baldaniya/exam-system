@extends('layouts.app')

@section('content')
<h2>Category Details</h2>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $category->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $category->name }}</td>
    </tr>
</table>

<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

@extends('layout')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Create Category</a>
    @foreach($categories as $category)
        <div>
            <h3>{{ $category->category_name }} ({{ $category->category_code }})</h3>
            <a href="{{ route('categories.show', $category->id) }}">View</a>
            <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
@endsection

@extends('layout')

@section('content')
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <input type="text" name="category_code" placeholder="Code">
        <input type="text" name="category_name" placeholder="Name">
        <button type="submit">Save</button>
    </form>
@endsection

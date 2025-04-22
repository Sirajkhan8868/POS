@extends('layout')

@section('content')
    <h1>{{ $category->category_name }}</h1>
    <p>Code: {{ $category->category_code }}</p>
    <p>Product Count: {{ $category->product_count }}</p>
    <a href="{{ route('categories.index') }}">Back</a>
@endsection

@extends('layouts.app')

@section('content')
    <h2>Create Product</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('products.form', ['product' => null])
@endsection

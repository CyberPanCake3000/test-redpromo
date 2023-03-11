@extends('layouts.app')

@section('content')
    <div class="container">
        {{ $category->name }}
        {{ $category->description }}
    </div>
@endsection

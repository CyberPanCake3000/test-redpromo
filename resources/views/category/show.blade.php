@extends('layouts.app')

@section('content')
    <div class="container mb-3">
        <a href="{{ route('home') }}" class="btn btn-outline-primary p-1 px-3">
            <i class="bi bi-arrow-left"></i>
            <span>Вернуться в каталог</span>
        </a>
    </div>
    <div class="container">
        <h2 class="text-primary fw-bold">{{ $category->name }}</h2>
        <div>{{ $category->description }}</div>
        <div class="mt-3">
            <h3 class="mb-3">Товары этой категории</h3>
            <div class="row g-3">
                @foreach($category->getProducts as $product)
                    <div class="col-6 col-md-3">
                        <a class="nav-link card h-100" href="{{ route('product.show', $product->id) }}">
                            <img class="card-img-top" src="{{URL::asset($product->getImage()->path)}}" alt="">
                            <div class="card-body">
                                <div class="card-title fw-bold fs-4 text-primary fw-bold">
                                    {{ $product->price }}
                                </div>
                                <div class="card-text">
                                    <div class="fw-bold">
                                        {{ $product->name }}
                                    </div>
                                    <div>
                                        {{ $product->description }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

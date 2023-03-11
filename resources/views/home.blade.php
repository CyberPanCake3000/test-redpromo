@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-2">
            <h2 class="mb-3">Популярные категории</h2>
            <div class="container">
                <div class="row">
                    <a class="col-4 link-primary" href="#">Категория1</a>
                    <a class="col-4 link-primary" href="#">Категория2</a>
                    <a class="col-4 link-primary" href="#">Категория3</a>
                    <a class="col-4 link-primary" href="#">Категория4</a>
                    <a class="col-4 link-primary" href="#">Категория5</a>
                    <a class="col-4 link-primary" href="#">Категория6</a>
                    <a class="col-4 link-primary" href="#">Категория7</a>
                    <a class="col-4 link-primary" href="#">Категория8</a>
                </div>
            </div>
        </div>
        <div>
            <h2 class="mb-3">Все товары</h2>

            <div class="row g-3">
                @foreach($products as $product)
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

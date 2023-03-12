@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3">
            <i class="bi bi-suit-heart-fill text-love"></i>
            Избранные товары
        </h2>

        <div class="row g-3">
            @foreach($favorites as $favorite)
                <div class="col-12 col-sm-6 col-md-3">
                    <a class="nav-link card h-100" href="{{ route('product.show', $favorite->product_id) }}">
                        <img class="card-img-top" src="{{URL::asset($favorite->getProduct->getImage()->path)}}" alt="">
                        <div class="card-body">
                            <div class="card-title fw-bold fs-4 text-primary fw-bold">
                                {{ $favorite->getProduct->price }}
                            </div>
                            <div class="card-text">
                                <div class="fw-bold">
                                    {{ $favorite->getProduct->name }}
                                </div>
                                <div>
                                    {{ $favorite->getProduct->description }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{URL::asset($product->getImage()->path)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body h-100 d-flex flex-column">
                            <div class="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <div>
                                        <button type="button" class="btn btn-outline-love me-2">
                                            <i class="bi bi-suit-heart"></i>
                                        </button>
                                        <button type="button" class="btn btn-secondary">
                                            <i class="bi bi-arrow-bar-up"></i>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="text-primary fw-bold">{{ $product->price }}</h2>
                                </div>
                                <p class="card-text">{{ $product->description }}</p>
                            </div>

                            <div class="card-text mt-auto"><small class="text-muted">{{ $product->created_at }}</small></div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <h2 class="text-primary fw-bold">Отзывы о товаре</h2>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mb-3">
        <a href="{{ route('home') }}" class="btn btn-outline-primary p-1 px-3">
            <i class="bi bi-arrow-left"></i>
            <span>Вернуться в каталог</span>
        </a>
    </div>

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
                                    @auth
                                        <button type="button" class="btn btn-outline-love me-2">
                                            <i class="bi bi-suit-heart"></i>
                                        </button>
                                    @endauth
                                    
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

                        <div class="card-text mt-auto">
                            <div class="d-flex flex-row my-2">
                                @foreach($product->getCategories as $category)
                                    <span class="bg-primary rounded-2 p-2 text-white me-2">{{ $category->name }}</span>
                                @endforeach
                            </div>
                            <small class="text-muted">{{ $product->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex flex-row justify-content-between align-items-center my-2">
                <h2 class="text-primary fw-bold">Отзывы</h2>
                @auth
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#reviewModal">
                        <i class="bi bi-plus-lg"></i>
                        Добавить
                    </button>
                @endauth
            </div>

            <div>
                @if(count($product->getReviews) == 0)
                    <div class="p-5 text-center bg-secondary bg-opacity-50 rounded-3">
                        <span class="text-white">У этого товара пока нет отзывов</span>
                    </div>
                @else
                    @foreach($product->getReviews as $review)
                        <div class="">
                            {{ $review->id }}
                            {{ $review->review }}
                            {{ $review->getUser->name }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reviewModalLabel">Оставить отзыв о товаре</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

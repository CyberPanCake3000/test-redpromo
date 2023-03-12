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
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <div class="d-flex">
                                    @auth
                                        <form method="POST" class="">
                                            @csrf
                                            <div>
                                                <input type="text" value="{{ $product->id }}" name="product_id" id="product_id" hidden>
                                                <button type="submit" class="btn fs-4" id="favoriteButton">
                                                    @if($product->getFavorite())
                                                        <i id="heart" class="bi bi-suit-heart-fill text-love"></i>
                                                    @else
                                                        <i id="heart" class="bi bi-suit-heart text-love"></i>
                                                    @endif

                                                </button>
                                            </div>

                                        </form>
                                    @endauth
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
                        <span class="fs-3 text-white"><i class="bi bi-emoji-frown-fill"></i></span> <br>
                        <span class="text-white">У этого товара пока нет отзывов</span>
                    </div>

                @else
                    <div class="row g-2">
                        @foreach($product->getReviews as $review)
                            <div class=" col-md-4 col-12 col-sm-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <h5 class="card-title">{{ $review->getUser->name }}</h5>
                                            @if($review->getUser->id == Auth::user()->id)
                                                <span class="badge text-bg-primary">Ваш отзыв</span>
                                            @endif
                                        </div>
                                        <h6 class="card-text">
                                            @for($i=1; $i <= $review->rating; $i++)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @endfor
                                            @for($i=1; $i<= 5-$review->rating; $i++)
                                                <i class="bi bi-star text-warning"></i>
                                            @endfor
                                        </h6>
                                        <p class="card-text">{{ $review->review }}</p>
                                        <div class="row">
                                            @foreach($review->getPhotos as $photo)
                                                <div class="col-4">
                                                    <img class="img-fluid img-thumbnail"
                                                         src="{{URL::asset($photo->path)}}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    @auth
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" id="reviewForm" action="{{ route('review.store') }}" method="POST"
                      enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="reviewModalLabel">Оставить отзыв о товаре</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            @csrf
                            <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>
                            <input type="text" value="{{ $product->id }}" name="product_id" hidden>

                            <div class="mb-3">
                                <h3 class="text-center">Как вам этот товар?</h3>
                                <div class="d-flex flex-row justify-content-center">
                                    <input id="radio-1" class="rating-custom" name="rating" type="radio" value="1"
                                           checked>
                                    <label for="radio-1" class="rating-custom-label"></label>

                                    <input id="radio-2" class="rating-custom" name="rating" type="radio" value="2">
                                    <label for="radio-2" class="rating-custom-label"></label>

                                    <input id="radio-3" class="rating-custom" name="rating" type="radio" value="3">
                                    <label for="radio-3" class="rating-custom-label"></label>

                                    <input id="radio-4" class="rating-custom" name="rating" type="radio" value="4">
                                    <label for="radio-4" class="rating-custom-label"></label>

                                    <input id="radio-5" class="rating-custom" name="rating" type="radio" value="5">
                                    <label for="radio-5" class="rating-custom-label"></label>

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Фотографии товара</label>
                                <input class="form-control" type="file" id="images" name="images[]" multiple>
                                @error('images')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label">Текст отзыва</label>
                                <textarea class="form-control" id="review" rows="3" name="review"></textarea>
                                @error('review')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
@endsection

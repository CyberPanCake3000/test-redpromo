@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Результаты поиска</h3>

        <div class="row g-3">
            @foreach($searchResults as $result)
                <div class="col-12 col-sm-6 col-md-3">
                    @if(array_key_exists('price', $result))
                        <a class="nav-link card h-100" href="{{ route('product.show', $result['id']) }}">
                            <div class="card-body">
                                <div class="card-title fw-bold fs-4 text-primary fw-bold">
                                    {{ $result['price'] }}
                                </div>
                    @else
                         <a class="nav-link card h-100" href="{{ route('category.show', $result['id']) }}">
                             <div class="card-body">
                                 <span class="badge text-bg-primary">Категория</span>
                    @endif
                                            <div class="card-text">
                                                <div class="fw-bold">
                                                    {{ $result['name'] }}
                                                </div>
                                                <div>
                                                    {{ $result['description'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                            </div>
                        @endforeach
                </div>

        </div>
@endsection

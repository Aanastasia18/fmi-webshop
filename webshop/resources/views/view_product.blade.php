@extends('base')
@section('content')
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $product->img }}" alt="..."></div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('add_to_cart') }}">
                            @csrf
                            <div class="small mb-1">ID: {{ $product->id }}</div>
                            <input hidden name="product_id" value='{{ $product->id }}'">
                            <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                            <div class="fs-5 mb-5">
                                <span>{{ $product->price }}$</span>
                            </div>
                            <p class="lead">{{ $product->description }}</p>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" name="count" id="inputQuantity" type="number" value="1" style="max-width: 3rem">
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
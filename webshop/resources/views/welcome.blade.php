@extends('base')
@section('content')
        <!-- Header-->
        <header class="bg-success py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">The Best FMI WebShop</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Made by Safronov Alexei & Agabalaev Anastasia</p>
                </div>
            </div>
        </header>
<!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $product->img }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4 creme">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->name}}</h5>
                                    <!-- Product price-->
                                    {{$product->price}}$
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/view/{{ $product->id }}">View Product</a></div><br>
                                <div class="text-center">
                                    <form method="POST" action="{{ route('add_to_cart') }}">
                                    @csrf
                                        <input name="product_id" type="number" hidden value="{{ $product->id }}">
                                        <input name="count" type="number" hidden value="1">
                                        <input type="submit" value="Add to cart" class="btn btn-outline-dark mt-auto">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection

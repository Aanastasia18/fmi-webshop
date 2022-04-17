@extends('base')
@section('content')
<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    {{$product[0]->name}}
                                </td>
                                <td>
                                    {{$product[0]->price}}$
                                </td>
                                <td>
                                    <form method="POST" action="{{route('delete_item')}}">
                                        @csrf
                                    <input hidden name='record_id' value='{{ $product[1] }}'>
                                    <input class="btn btn-danger" type="submit" value="Delete item">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td><td>Summary: {{ $sum }}$</td><td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <form action="/checkout">
                            <input type="submit" class="btn btn-success" value="Checkout">
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
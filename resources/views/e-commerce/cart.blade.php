@extends('e-commerce.layouts.master')

<div class="page-wrapper">

    @section('content')
        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="{{ route('details', $order->id) }}">
                                                                <img src="{{ asset('uploads/' . $order->name . '/' . $order->image_name) }}"
                                                                    alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a
                                                                href="{{ route('details', $order->id) }}">{{ $order->name }}</a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col">${{ $order->price }}</td>
                                                <td class="quantity-col">
                                                    <div class="cart-product-quantity">
                                                        <form action="{{ route('modifyQuantity', $order->order_id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <input type="number" class="form-control"
                                                                value="{{ $order->quantity }}" min="1" max="20"
                                                                step="1" data-decimals="0" required name="quantity">
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <input type="submit" value="save" class="btn btn-primary">
                                                        </form>

                                                    </div><!-- End .cart-product-quantity -->
                                                </td>
                                                <td class="total-col">

                                                    ${{ $order->price * $order->quantity}}

                                                </td>
                                                <td class="remove-col">
                                                    <form action="{{ route('cart.destroy', $order->order_id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit"class="btn-remove" value="x">
                                                        </input>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table><!-- End .table table-wishlist -->

                                <div class="cart-bottom">



                                </div><!-- End .cart-bottom -->
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>







                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>${{ $totalPrice }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <a href="{{route('orders.create')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                                        CHECKOUT</a>
                                </div><!-- End .summary -->

                                <a href="{{ route('shop') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                        SHOPPING</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    @endsection

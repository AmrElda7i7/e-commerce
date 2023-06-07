
@extends('e-commerce.layouts.master')

@section('content')
        <main class="main">
            <div class="intro-section pt-lg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="banner banner-big banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-1.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white"><a href="#">Your Guide To The World</a></h4><!-- End .banner-subtitle -->
                                    <h2 class="banner-title text-white"><a href="#">Must-Read <br>Travel Books</a></h2><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Find out more<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-6 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-2.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-stretch">
                                    <h4 class="banner-subtitle text-white"><a href="#">New This Week</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Discover Our <br>Best Romance <br>Books</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="banner banner-small banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-3.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white d-lg-none d-xl-block"><a href="#">Deal Of The Day</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">20% Off Use <br>Code: <span>mybook</span></a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->

                            <div class="banner banner-small banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-4.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white d-lg-none d-xl-block"><a href="#">New Arrivals</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Business <br>& Economics</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->

                <div class="icon-boxes-container bg-transparent">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon">
                                        <i class="icon-truck"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                                        <p>Free shipping for orders over $50</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon">
                                        <i class="icon-rotate-left"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                                        <p>Free 100% money back guarantee</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon">
                                        <i class="icon-life-ring"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                                        <p>Alway online feedback 24/7</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon">
                                        <i class="icon-envelope"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Join Our Newsletter</h3><!-- End .icon-box-title -->
                                        <p>10% off by subscribing to our newsletter</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .icon-boxes-container -->
            </div><!-- End .intro-section -->

            <div class="bestseller-products bg-light pt-5 pb-5 mb-5">
                <div class="block">
                    <div class="block-wrapper ">
                        <div class="container">
                            <div class="heading heading-flex">
                                <div class="heading-left">
                                    <h2 class="title">Bestsellers</h2><!-- End .title -->
                                </div><!-- End .heading-left -->

                               
                            </div><!-- End .header-flex -->

                            <div class="owl-carousel carousel-equal-height owl-simple" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1440": {
                                            "items":5
                                        }
                                    }
                                }'>
                      

                              
@foreach ($products as $product)
    
<div class="product">
    <figure class="product-media">
        <a href="{{route('details',$product->id)}}">
            <img src="{{asset('uploads/'.$product->name.'/'.$product->image_name)}}" alt="Product image" class="product-image">
        </a>
    </figure><!-- End .product-media -->
    
    <div class="product-body">
                                 
        <h3 class="product-title"><a href="{{route('details',$product->id)}}">{{$product->name}}</a></h3><!-- End .product-title -->
        <div class="product-price">
            ${{$product->price}}
        </div><!-- End .product-price -->
        
        <div class="product-footer">
            <div class="ratings-container">
                <div class="ratings">
                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                </div><!-- End .ratings -->
                <span class="ratings-text">( 7 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                            <div class="product-action">
                                                <form action="{{route('cart.store')}}" method="post">
                                                    @csrf
                                                <input type="submit" value="add to cart" class="btn-product btn-cart">
                                                <input type="text" name="product_id" value="{{$product->id}}" hidden>
                                                </form>
                                            </div><!-- End .product-action -->
                                        </div><!-- End .product-footer -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @endforeach
                            </div><!-- End .owl-carousel -->
                        </div><!-- End .container -->
                    </div><!-- End .block-wrapper -->
                </div><!-- End .block -->
            </div><!-- End .bg-light pt-4 pb-4 -->

            <div class="container">
               
                <div class="row">
                    <div class="col-xl-4">
                        <div class="owl-carousel carousel-equal-height owl-simple" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 10
                            }'>
                        

                   
                        </div><!-- End .owl-carousel -->

                        <div class="mb-3 d-xl-none"></div><!-- End .mb-3 d-none -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-xl-8">
                        <div class="block-wrapper ">
                            <div class="owl-carousel carousel-equal-height owl-simple" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":3
                                        },
                                        "1440": {
                                            "items":4
                                        }
                                    }
                                }'>
                             
                            </div><!-- End .owl-carousel -->
                        </div><!-- End .block-wrapper -->
                    </div><!-- End .col-lg-8 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-3 -->

            <div class="banner-group mb-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-6.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white"><a href="#">A Perfect Choice For Your Children</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Children's <br>Bestselling Books</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-7.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white"><a href="#">Mental Health Awareness Week</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Self-Help For <br>Your Future.</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{asset('e-commerce/assets/images/demos/demo-20/banners/banner-8.jpg')}}" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white"><a href="#">New York Times Bestsellers</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Bestselling Food <br>and Drink Books.</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white-3 banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .banner-group -->

            <div class="block">
                <div class="block-wrapper ">
                    <div class="container">
                        <div class="heading heading-flex">
                            <div class="heading-left">
                                <h2 class="title">Picks From Our Experts</h2><!-- End .title -->
                            </div><!-- End .heading-left -->

                            <div class="heading-right">
                                <a href="category.html" class="title-link">View more Products <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .heading-right -->
                        </div><!-- End .header-flex -->

                        <div class="owl-carousel carousel-equal-height owl-simple" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1440": {
                                        "items":6
                                    }
                                }
                            }'>
                            @foreach ($products as $product)
    
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{route('details',$product->id)}}">
                                        <img src="{{asset('uploads/'.$product->name.'/'.$product->image_name)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
                                
                                <div class="product-body">
                                                             
                                    <h3 class="product-title"><a href="{{route('details',$product->id)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        ${{$product->price}}
                                    </div><!-- End .product-price -->
                                    
                                    <div class="product-footer">
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 7 Reviews )</span>
                                                                        </div><!-- End .rating-container -->
                                                                        <div class="product-action">
                                                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                                            <a href="#" class="btn-product btn-wishlist"><span>Add to Wishlist</span></a>
                                                                        </div><!-- End .product-action -->
                                                                    </div><!-- End .product-footer -->
                                                                </div><!-- End .product-body -->
                                                            </div><!-- End .product -->
                                                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .container -->
                </div><!-- End .block-wrapper -->
            </div><!-- End .block -->

            <div class="mb-5">
                </div><!-- End .mb-5 -->

           
            
            
        </main><!-- End .main -->

      @endsection
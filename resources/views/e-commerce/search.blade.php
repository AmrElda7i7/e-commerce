@extends('e-commerce.layouts.master')
@section('content')
    <div class="page-wrapper">


        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container-fluid">
                    
                </div><!-- End .container-fluid -->
            </div><!-- End .page-header -->


            <div class="page-content">
                <div class="container-fluid">


                    <div class="products">
                        <div class="row">


                            @if ($details)
                                
                        
                                
                        
                            @foreach ($details as $detail)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">

                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="{{route('details',$detail->id)}}">
                                                <img src="{{asset('uploads/'.$detail->name.'/'.$detail->image_name)}}" alt="Product image" class="product-image">
                                            </a>
                                        </figure><!-- End .product-media -->
                                        
                                        <div class="product-body">
                                                                     
                                            <h3 class="product-title"><a href="{{route('details',$detail->id)}}">{{$detail->name}}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                ${{$detail->price}}
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
                                                                                    <input type="text" name="product_id" value="{{$detail->id}}" hidden>
                                                                                    </form>
                                                                                </div><!-- End .product-action -->
                                                                            </div><!-- End .product-footer -->
                                                                        </div><!-- End .product-body -->
                                                                    </div><!-- End .product -->
                                                                    

                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                            @endif



                        </div><!-- End .row -->


                    </div><!-- End .products -->


                </div><!-- End .container-fluid -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    @endsection

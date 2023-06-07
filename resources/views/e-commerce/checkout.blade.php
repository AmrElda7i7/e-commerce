@extends('e-commerce.layouts.master')
@section('content')
    <div class="page-wrapper">

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<div class="checkout-discount">
            				<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input">
            					<label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
            				</form>
            			</div><!-- End .checkout-discount -->
            			<form action="{{route('orders.store')}}" method="POST">
							@csrf
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>First Name *</label>
		                						<input type="text" class="form-control" name='first_name' required>
		                					</div><!-- End .col-sm-6 -->
											@error('first_name')
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												{{ $message }}
												<button type="button" class="btn-close" data-bs-dismiss="alert"
													aria-label="Close"></button>
											</div>
										@enderror
		                					<div class="col-sm-6">
		                						<label>Last Name *</label>
		                						<input type="text" class="form-control" name='last_name' required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->
										@error('last_name')
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											{{ $message }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
												aria-label="Close"></button>
										</div>
									@enderror
	            					
	            						<label>Country *</label>
	            						<input type="text" class="form-control"  name='country'required>
										@error('country')
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											{{ $message }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
												aria-label="Close"></button>
										</div>
									@enderror
	            						<label> address *</label>
	            						<input type="text" class="form-control" placeholder="House number and Street name" name="address" required>
	            					
										@error('address')
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											{{ $message }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
												aria-label="Close"></button>
										</div>
									@enderror
	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" class="form-control" name="city" required>
		                					</div><!-- End .col-sm-6 -->

		                					
		                				</div><!-- End .row -->
										@error('city')
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											{{ $message }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
												aria-label="Close"></button>
										</div>
									@enderror
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Postcode / ZIP *</label>
		                						<input type="number" class="form-control" name="postcode" required>
		                					</div><!-- End .col-sm-6 -->
											@error('postcode')
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												{{ $message }}
												<button type="button" class="btn-close" data-bs-dismiss="alert"
													aria-label="Close"></button>
											</div>
										@enderror
		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" name="phone" required>
												@error('phone')
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													{{ $message }}
													<button type="button" class="btn-close" data-bs-dismiss="alert"
														aria-label="Close"></button>
												</div>
											@enderror
		                					</div><!-- End .col-sm-6 -->
		                						<input type="tel" class="form-control" name="total" value="{{$totalPrice}}" hidden >
		                			
		                				</div><!-- End .row -->

	                					<label>Email address *</label>
	        							<input type="email" class="form-control" name="email" required>
											@error('email')
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												{{ $message }}
												<button type="button" class="btn-close" data-bs-dismiss="alert"
													aria-label="Close"></button>
											</div>
										@enderror
	                					<label>payment method *</label>
										<div class="col-sm-15">
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="payment_method" id="gridRadios1" value="on_delivery" checked>
											  <label class="form-check-label" for="gridRadios1">
												on delivery
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="payment_method" id="gridRadios2" value="visa">
											  <label class="form-check-label" for="gridRadios2">
												visa
											  </label>
											</div>
											
										  </div>
										<input type="submit" class="btn btn-outline-primary-2 btn-order btn-block" value="Proceed to Checkout"> 
		                				</input>

	                					
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
												@foreach ($orders as $order)
													
		                						<tr>
													<td><a href="{{route('details',$order->id)}}">{{$order->name}}</a></td>
		                							<td>$ {{$order->price * $order->quantity}}</td>
		                						</tr>
												@endforeach

		                					
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>${{$totalPrice}}</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td>Free shipping</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>${{$totalPrice}}</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				

		                				
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

       @endsection()
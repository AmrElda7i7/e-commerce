@extends('e-commerce.layouts.master')
@section('content')
    <div class="page-wrapper">


        <main class="main">


            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
                style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
                <div class="container">
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                        aria-controls="signin-2" aria-selected="false">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2"
                                        role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                    <form action="{{route('login')}}" method="post">
										@csrf
                                        <div class="form-group">
                                            <label for="singin-email-2"> email address *</label>
                                            <input type="text" class="form-control" id="email"
                                                name="email" >
                                        </div><!-- End .form-group -->
										@error('email')
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											{{ $message }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
												aria-label="Close"></button>
										</div>
									@enderror

                                        <div class="form-group">
                                            <label for="singin-password-2">Password *</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" >
                                        </div><!-- End .form-group -->
										@error('password')
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											{{ $message }}
											<button type="button" class="btn-close" data-bs-dismiss="alert"
												aria-label="Close"></button>
										</div>
									@enderror
                                        <div class="form-footer">
											<input type="submit" class='btn btn-outline-primary-2' value="Login">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember-2" name="remember">
                                                <label class="custom-control-label" for="signin-remember-2">Remember
                                                    Me</label>
                                            </div><!-- End .custom-checkbox -->

                                           
                                        </div><!-- End .form-footer -->
                                    </form>
                                    
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                                    aria-labelledby="register-tab-2">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-email-2">Your name *</label>
                                            <input type="name" class="form-control" id="register-email-2" name="name">

                                        </div><!-- End .form-group -->
                                        @error('name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="register-email-2">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email-2" name="email">
                                        </div><!-- End .form-group -->
                                        @error('email')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="register-password-2">Password *</label>
                                            <input type="password" class="form-control" id="register-password-2"
                                                name="password">
                                        </div><!-- End .form-group -->
                                        @error('password')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror


                                        <div class="form-footer">
                                            <input type="submit" class='btn btn-outline-primary-2' value="register">


                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->
    @endsection()

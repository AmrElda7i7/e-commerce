<body>
    <div class="page-wrapper">
        <header class="header header-12">
            <div class="header-top">
                <div class="container">
                 

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="/" class="logo">
                            <img src="{{ asset('e-commerce/assets/images/demos/demo-20/logo.png') }}" alt="Molla Logo"
                                width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{route('search')}}" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="search" id="search"
                                        placeholder="Search product ..." >

                                    
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="header-dropdown-link">
                            <div class="account">
                                <a href="account" title="My account">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>Account</p>
                                </a>
                            </div><!-- End .compare-dropdown -->

                         

                            <div class="dropdown cart-dropdown">
                                <a href="{{route('cart.index')}}" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <div class="icon">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="cart-count ">{{App\Models\ShoppingCart::all()->count()}}</span>
                                    </div>
                                    <p>Cart</p>
                                </a>

                            </div><!-- End .cart-dropdown -->
                        </div>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div style="background-color: #333; display: flex; width: 100%;">
                        <div class="header-left">
                            
                        </div><!-- End .header-left -->

                        <div class="header-center">

                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="megamenu-container active">
                                        <a href="/" class="sf-with-ul">Home</a>


                                    </li>
                                    <li>
                                        <a href="{{route('shop')}}" class="sf-with-ul">Shop</a>

                               
                                    </li>
                                    <li>
                                        <a href="" class="sf-with-ul">categories</a>

                                        <div class="megamenu megamenu-sm">
                                            <div class="row no-gutters">
                                                <div class="col-md-6">
                                                    <div class="menu-col">
                                                        <div class="menu-title">categories</div>
                                                        <!-- End .menu-title -->
                                                        <ul>
                                                          @php
                                                                $categories= \App\Models\Category::all();
                                                          @endphp
                                                          @foreach ($categories as $category )
                                                              
                                                          
                                                          <li><a href="{{route('E-categories',$category->id)}}">{{$category->name}}</a></li>
                                                          @endforeach
                                                       
                                                           
                                                        </ul>
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="banner banner-overlay">
                                                        <a href="category.html">
                                                            <img src="{{ asset('e-commerce/assets/images/menu/banner-2.jpg') }}"
                                                                alt="Banner">

                                                            <div class="banner-content banner-content-bottom">
                                                                <div class="banner-title text-white">New
                                                                    Trends<br><span><strong>spring 2019</strong></span>
                                                                </div><!-- End .banner-title -->
                                                            </div><!-- End .banner-content -->
                                                        </a>
                                                    </div><!-- End .banner -->
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu megamenu-sm -->
                                    </li>
                          
                                  
                                    
                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div>

                        <div class="header-right">
                            <i class="la la-lightbulb-o"></i>
                            <p>Clearance Up to 30% Off</p>
                        </div><!-- End .header-right -->
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

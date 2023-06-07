@extends('admin.layouts.master')

@section('content')

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>add product</h1>
  
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">product name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name">
                  </div>
                </div>
                @error('name')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">product description </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description">
                  </div>
                </div>
                @error('description')
                                        
                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price">
                  </div>
                </div>
                @error('price')
                                        
                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">product image</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="formFile" name="product_image">
                    </div>
                  </div>
                </div>
                @error('product_image')
                                        
                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$message}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">category</label>
                  <div class="col-sm-10">
                   
                      
                    <select name="category" id="category">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                  
                  </div>
                  @error('category')
                                    
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @enderror
                </div>

                <div class="row mb-3">
               
                  <div class="col-sm-10">
                    <input type="submit" value="save" class="btn btn-primary">
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
  
  
  @endsection
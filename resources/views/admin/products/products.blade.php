@extends('admin.layouts.master')

@section('content')

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>products Page</h1>
    
    </div><!-- End Page Title -->
    
@if (session()->has('add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="bi bi-check-circle me-1"></i>
{{session()->get('add')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif
@if (session()->has('update'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="bi bi-check-circle me-1"></i>
{{session()->get('update')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="bi bi-check-circle me-1"></i>
{{session()->get('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="bi bi-check-circle me-1"></i>
{{session()->get('delete')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif

      
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                 <div class="d-grid gap-2 mt-3">
                    <a class="btn btn-primary" href="{{route('products.create')}}" >add product</a>
                  </div>
            
    
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">description</th>
                        <th scope="col">category</th>
                        <th scope="col">price</th>
                        <th scope="col">actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          $i=0
                        @endphp
                      @foreach ($products as $product )
                      @php
                        $i++;
                      @endphp
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                          <a class="btn btn-outline-primary" href="{{route('products.edit',$product->id)}}">update</a>
                    
                          
                          <button  type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete{{$product->id}}">delete</button>
                          <div class="modal fade" id="delete{{$product->id}}" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">delete</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('products.destroy',$product->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <div class="modal-body">
                             are you sure you want to delete this product ?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input  type="submit" class="btn btn-danger" value="Save changes"></input>
                                  </div>
                                </form>
                               
                            
                              </div>
                            </div>
                          </div><!-- End Basic Modal-->
                          
                        </td>
                        
                      </tr>
                
                      @endforeach
                      
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
    
                </div>
              </div>
    
            </div>
          </div>
        </section>
    
      </main><!-- End #main -->


  
  
  @endsection
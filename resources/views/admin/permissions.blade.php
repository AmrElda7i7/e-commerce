@extends('admin.layouts.master')

@section('content')

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>permissions Page</h1>
    
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
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#basicModal">add permission</button>
                  </div>
                  <div class="modal fade" id="basicModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">form</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('permissions.store')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">Text</label>
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
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input  type="submit" class="btn btn-primary" value="Save changes"></input>
                          </div>
                        </form>
                       
                    
                      </div>
                    </div>
                  </div><!-- End Basic Modal-->
    
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          $i=0
                        @endphp
                      @foreach ($permissions as $permission )
                      @php
                        $i++;
                      @endphp
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$permission->name}}</td>
                        <td>
                          <button  type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#update{{$permission->id}}">update</button>
                          <div class="modal fade" id="update{{$permission->id}}" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">update</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('permissions.update',$permission->id)}}" method="post">
                                  @csrf
                                  @method('put')
                                  <div class="modal-body">
                                    <div class="row mb-3">
                                      <label for="inputText" class="col-sm-2 col-form-label">Text</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{$permission->name}}">
                                      </div>
                                    </div>
                                    @error('name')
                                        
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$message}}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @enderror
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input  type="submit" class="btn btn-primary" value="Save changes"></input>
                                  </div>
                                </form>
                               
                            
                              </div>
                            </div>
                          </div><!-- End Basic Modal-->
                          
                          <button  type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete{{$permission->id}}">delete</button>
                          <div class="modal fade" id="delete{{$permission->id}}" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">delete</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('permissions.destroy',$permission->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <div class="modal-body">
                             are you sure you want to delete this permission ?
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
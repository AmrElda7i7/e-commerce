@extends('admin.layouts.master')

@section('content')

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>users Page</h1>
    
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
                  @can('create_user')
                    
                  <div class="d-grid gap-2 mt-3">
                    <a class="btn btn-primary" href="{{route('users.create')}}" >add user</a>
                  </div>
                  @endcan
            
    
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">role</th>
                        @can('update_user')
                          
                        <th scope="col">Actions</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                        @php
                          $i=0
                        @endphp
                      @foreach ($users as $user )
                      @php
                        $i++;
                      @endphp
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$user->name}}</td>

                        <th scope="row">
                          @if ($user->role_name=='user')
                          
                          <span class="badge rounded-pill bg-primary">{{$user->role_name}}</span>
                          @elseif($user->role_name=='admin')
                          <span class="badge rounded-pill bg-warning">{{$user->role_name}}</span>
                          @else
                          <span class="badge rounded-pill bg-success">{{$user->role_name}}</span>
                          
                          @endif 
                        </a></th>
                        @can('update_user')
                        <td>
                          <a class="btn btn-outline-primary" href="{{route('users.edit',$user->id)}}">update</a>
                    
                          
                          <button  type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">delete</button>
                          <div class="modal fade" id="delete{{$user->id}}" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">delete</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('users.destroy',$user->id)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  <div class="modal-body">
                             are you sure you want to delete this user ?
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
                        @endcan
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
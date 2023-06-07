@extends('admin.layouts.master')

@section('content')

<main id="main" class="main">
  
  <div class="pagetitle">
    <h1>Blank Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        
        
        <div class="col-lg-6">
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$role->name}}</h5>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">permissions</h5>
                  
                  <!-- List group Numbered -->
                  <ol class="list-group list-group-numbered">
        @foreach ($permissions as $permission)
        <li class="list-group-item">{{$permission->name}}</li>
        @endforeach
                    
                    
                  </ol><!-- End List group Numbered -->
    
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  
  
  @endsection









@extends('admin.layouts.master')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>add user</h1>

        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>


                            @error('name')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>


                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" >
                                </div>
                            </div>


                            @error('password')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">roles</label>
                        <div class="col-sm-10">


                            <select type="checkbox" id="role" name="role">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    
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

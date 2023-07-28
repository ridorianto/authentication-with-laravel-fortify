@extends('layouts.auth', ['title' => 'Login'])

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Masukkan Alamat Email">
                                            @error('email')
                                                <span class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </span> 
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                                            @error('password')
                                                <span class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </span> 
                                            @enderror
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">LOGIN</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/forgot-password">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

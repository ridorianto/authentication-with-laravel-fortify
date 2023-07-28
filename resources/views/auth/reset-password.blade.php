@extends('layouts.auth', ['title' => 'Update Password'])

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Password !</h1>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="user" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Alamat Elamil">
                                    @error('email')
                                        <span class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password Baru">
                                    @error('password')
                                        <span class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password Baru">
                                </div>
                
                                <button type="submit" class="btn btn-primary btn-user btn-block">UPDATE PASSWORD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

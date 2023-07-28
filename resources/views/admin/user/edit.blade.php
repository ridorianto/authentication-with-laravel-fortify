@extends('layouts.app', ['title' => 'Edit User'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Edit User</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Fullname" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passowrd</label>
                                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->
                    
                    <div class="card-footer">
                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Update</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>
                    </div>
                    <!-- end card-footer -->
                </div>
                <!--- end card -->
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
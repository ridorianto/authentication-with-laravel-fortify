@extends('layouts.app', ['title' => 'Tambah User'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Add New User</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        placeholder="Fullname"
                                        class="form-control @error('name') is-invalid @enderror">

                                    @error('name')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        placeholder="Email Address"
                                        class="form-control @error('email') is-invalid @enderror">

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
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror">

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
                                    <input type="password" name="password_confirmation"
                                        placeholder="Confirm Password" class="form-control">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-body -->

                    <div class="card-footer">
                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Save</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> Reset</button>
                    </div>
                    <!-- end card-footer -->
                </div>
                <!-- end card -->
            </form>
            <!-- end form -->
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
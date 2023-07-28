@extends('layouts.app', ['title' => 'Users'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Management Users</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.user.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm"
                                        style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> Add New Data</a>
                                </div>
                                <input type="text" class="form-control" name="q"
                                    placeholder="Search by username....">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" style="width: 25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $no => $user)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($users->currentPage()-1) * $users->perPage() }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                            class="btn btn-sm btn-outline-warning">
                                            <i class="fa fa-pencil-alt"></i> Edit
                                        </a>

                                        <button onClick="Delete(this.id)" class="btn btn-sm btn-outline-danger"
                                            id="{{ $user->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>

                                @empty

                                    <div class="alert alert-danger">
                                        Data Belum Tersedia!
                                    </div>
                                
                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{ $users->links("vendor.pagination.bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    //ajax delete
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: "warning",
            buttons: [
                'TIDAK',
                'YA'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {

                //ajax delete
                jQuery.ajax({
                    url: "/admin/user/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            swal({
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                return true;
            }
        })
    }
</script>
@endsection
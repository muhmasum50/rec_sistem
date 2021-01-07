@extends('template.v_template')

@section('breadcrumb')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Pengguna</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Bordered table</h6>
                <p class="card-description">Add class <code>.table-bordered</code></p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="serverside">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#serverside').DataTable({
            pageLength: 5,
            serverSide: true,
            ajax: "{{route('load_user')}}",
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'fotoprofil'},
                {data: 'name'},
                {data: 'username'},
                {data: 'email'},
                {data: 'role'},
                {data: 'aksi'}
            ]
        });
    });
</script>
@endpush
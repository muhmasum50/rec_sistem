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

@if (session('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissable">
    <i class="fa fa-close"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session('error') }}
</div>
@endif
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">        
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

{{-- modal --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form action="{{url('/user')}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                <h5 class="modal-title">Update Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <select id="role" name="role" class="form-control">
                    
                    </select>
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('/user')}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" id="iduser">
                <div class="modal-header">
                <h5 class="modal-title">Apakah anda yakin akan menghapus data ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
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

    $(document).on('click', '#tombol_edit', function(){

        var id = $(this).data('id')
        var role = $(this).data('role')

        $('#id').val(id);
        var html = '';
        html += '<option value="user"> User </option>'
        html += '<option value="admin"> Admin </option>'
        $('[name="role"]').html(html);
        $('[name="role"]').val(role);

    })

    $(document).on('click', '#tombol_hapus', function(){
        var id = $(this).data('id')
        $('#iduser').val(id);
    })
</script>
@endpush
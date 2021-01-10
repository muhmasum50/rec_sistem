@extends('template.v_template')

@section('breadcrumb')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Produk</li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
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
                <div class="row">
                    <div class="col-md-12 float-right" align="right">
                    <a class="btn btn-sm btn-success" href="/produk/add"><i class="fa fa-plus"></i> Tambah</a>
                    </div>

                    </div>     
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="serverside">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Dibuat</th>
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

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{url('/produk')}}" method="post">
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
            processing: true,
            serverSide: true,
            ajax: url + '/load_produk',
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'fotoproduct'},
                {data: 'product_name'},
                {data: 'harga'},
                {data: 'product_desc'},
                {data: 't_userupdate'},
                {data: 'aksi', orderable: false, searchable: false}
            ],
            language: {
                processing: '<img style="background-color:transparent" src="https://gibei.stiesia.ac.id/uploads/images/spinner.gif" width="60px;">',
            }
        });
    });
    $(document).on('click', '#tombol_hapus', function(){
        var id = $(this).data('id')
        $('#iduser').val(id);
    })
</script>
@endpush
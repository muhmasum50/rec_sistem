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
                    <table class="table table-bordered table-hover" id="serverside">
                        <thead>
                            <tr>
                                <th width="15px;">#</th>
                                <th width="35px;">Gambar</th>
                                <th>Nama Produk</th>
                                <th width="80px;">Harga</th>
                                <th width="80px;">Dibuat</th>
                                <th width="80px;">Created at</th>
                                <th width="40px;">Aksi</th>
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
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{url('/produk/edit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                    <h5 class="modal-title">Update Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="namaproduk" class="form-control @error('namaproduk') is-invalid @enderror" >
                                    @error('namaproduk')
                                        <span class="help-block" style="color:#dc3545">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                                    @error('harga')
                                        <span class="help-block" style="color:#dc3545">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <input type="file" name="fotoproduk" class="form-control @error('fotoproduk') is-invalid @enderror">
                                    @error('fotoproduk')
                                        <span class="help-block" style="color:#dc3545">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deskripsi Produk</label>
                                    <textarea name="deskripsi" id="mytinymce" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                                    @error('deskripsi')
                                        <span class="help-block" style="color:#dc3545">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                {data: 'fotoproduct', orderable: false, searchable: false},
                {data: 'product_name'},
                {data: 'harga'},
                {data: 't_userupdate'},
                {data: 'tanggal'},
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

    $(document).on('click', '#tombol_edit', function(){
        var idproduct = $(this).data('id')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: url + '/produk/edit',
            data: {
                idproduct : idproduct,
            },
            success : function(response) {
                $('[name="namaproduk"]').val(response.produk.product_name)
                $('[name="harga"]').val(response.produk.price)
                tinymce.get("mytinymce").setContent(response.produk.product_desc);
                $('#id').val(response.produk.id)
            }
        });
    })

    @php
        if(Session::has('failedvalidation')) {
    @endphp
        $(function() {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
            });
            
            Toast.fire({
                icon: 'error',
                title: '{{Session::get("failedvalidation")}}'
            })
        })
    @php } @endphp
</script>
@endpush

@extends('template.v_template')

@section('breadcrumb')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Produk</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <form action="{{url('produk/add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 float-right" align="right">
                            <a href="{{url('produk')}}" id="kembalikedaftar" class="btn btn-sm btn-primary">
                                <i class="fa fa-chevron-left"></i> Kembali ke Daftar
                            </a>
                            <button type="submit" name="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div> 
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
                                <textarea name="deskripsi" id="tinymceExample" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                                @error('deskripsi')
                                    <span class="help-block" style="color:#dc3545">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
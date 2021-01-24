@extends('template.v_template')

@section('breadcrumb')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Perhitungan</li>
        <li class="breadcrumb-item active" aria-current="page">Tabel Perhitungan</li>
    </ol>
</nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Perhitungan Skor Rekomendasi Produk</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">User</label>
                            <div class="form-group">
                                <select name="pengguna" id="pengguna" class="form-control">
                                    @foreach ($user as $k => $v)
                                    <option value="{{$v->id}}" {{Auth::user()->id == $v->id ? 'selected' : null}}>{{$v->name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" id="hitungskor_rekomendasi">Hitung</button>
                    <hr>
                    <table class="table table-bordered table-responsive" id="table_ku">
                           
                           
                    </table>
                </div>
            </div>
		</div>
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Perhitungan Similarity</h6>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">User 1</label>
                            <div class="form-group">
                                <select name="user1" id="user1" class="form-control">
                                    <option value="">Pilih</option> 
                                    @foreach ($user as $k => $v)
                                    <option value="{{$v->id}}" {{Auth::user()->id == $v->id ? 'selected' : null}}>{{$v->name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">User 2</label>
                            <div class="form-group">
                                <select name="user2" id="user2" class="form-control">
                                    <option value="">Pilih</option> 
                                    @foreach ($user as $k => $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" id="hitung">Hitung</button>
                    <hr>
                    <div id="result"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>

        $(document).ready(function(){
            $('#hitung').on('click', function(){
                const user1 = $('#user1').val();
                const user2 = $('#user2').val();

                if(user1 != '' && user2 != '') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: url + '/hitungsimilarity',
                        data: {
                            user1: user1, user2 : user2
                        },
                        success : function(res) {
                            if(res.response == true) {
                                
                                var html = `<div class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Hasil Similarity antara <b>` +res.user1.name+ `</b> 
                                                dan <b>`+res.user2.name+` </b> adalah `+ res.data +`
                                        </div>`
                                $('#result').html(html)
                            }
                        }
                    });
                }
                else {
                     Swal.fire(
                        'Form Kosong',
                        'Kedua form harus diisi',
                        'question'
                    )
                }
            })

            $('#hitungskor_rekomendasi').on('click', function(){
                const pengguna = $('#pengguna').val();

                if(pengguna != '') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: url + '/skorrekomendasi',
                        data: {
                            pengguna: pengguna
                        },
                        success : function(res) {
                            if(res.response == true) {
                                
                                var html = `<tr>
                                                <th>Nama Produk</th>
                                                <th>Skor Rating</th>
                                            </tr>`
                                $.each(res.data,function(i, e) {
                                    html += `<tr>
                                                    <td>`+i+`</td>
                                                    <td>`+e+`</td>
                                                </tr>`
                                });

                                $('#table_ku').html(html)
                            }
                        }
                    });
                }
                else {
                    Swal.fire(
                        'Form Kosong',
                        'form harus diisi',
                        'question'
                    )
                }
            })
        })

    </script>
@endpush
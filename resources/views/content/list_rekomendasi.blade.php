@extends('template.v_template')

@section('breadcrumb')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Rekomendasi</li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h4 class="text-center mb-3 mt-4">Rekomendasi Produk</h4>
        @if($recommend)
        <p class="text-muted text-center mb-4 pb-2" >berikut merupakan rekomendasi produk buat kamu</p>
        @endif
        <div class="container">  
            <div class="row">
                @if($recommend) 
                @foreach ($recommend as $k => $rec)
                    <div class="col-md-3 grid-margin-md-0" style="border-radius:5px;" data-aos="fade-down" data-aos-duration="1500">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" height="250px;" width="150px;" src="{{asset("uploads/products").'/'.$produk[$k]->product_pic}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size:15px;">{{$produk[$k]->product_name}}</h4>
                                <p>{{number_format($produk[$k]->price)}}</p>
                                <hr>
                                <strong style="font-size:12px;">{{count($usersama[$k]). ' User yang sama merating Produk ini' }}</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else 
                    <div class="col-md-12">
                        <h4 class="text-center">Belum ada rekomendasi produk buat kamu</h4>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
      AOS.init();
    </script> 
@endpush
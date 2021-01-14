@extends('template.v_template')

@section('breadcrumb')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Daftar Produk</a></li>
    </ol>
</nav>
@endsection

@section('content')
<style>
  .rating {
    --star-size: 3;  /* use CSS variables to calculate dependent dimensions later */
    padding: 0;  /* to prevent flicker when mousing over padding */
    border: none;  /* to prevent flicker when mousing over border */
    unicode-bidi: bidi-override; direction: rtl;  /* for CSS-only style change on hover */
    text-align: left;  /* revert the RTL direction */
    user-select: none;  /* disable mouse/touch selection */
    font-size: 3em;  /* fallback - IE doesn't support CSS variables */
    font-size: calc(var(--star-size) * 1em);  /* because `var(--star-size)em` would be too good to be true */
    cursor: pointer;
    /* disable touch feedback on cursor: pointer - http://stackoverflow.com/q/25704650/1269037 */
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-tap-highlight-color: transparent;
    margin-bottom: 1em;
  }
  /* the stars */
  .rating > label {
    display: inline-block;
    position: relative;
    width: 1.1em;  /* magic number to overlap the radio buttons on top of the stars */
    width: calc(var(--star-size) / 3 * 1.1em);
  }
  .rating > *:hover,
  .rating > *:hover ~ label,
  .rating:not(:hover) > input:checked ~ label {
    color: transparent;  /* reveal the contour/white star from the HTML markup */
    cursor: inherit;  /* avoid a cursor transition from arrow/pointer to text selection */
  }
  .rating > *:hover:before,
  .rating > *:hover ~ label:before,
  .rating:not(:hover) > input:checked ~ label:before {
    content: "★";
    position: absolute;
    left: 0;
    color: gold;
  }
  .rating > input {
    position: relative;
    transform: scale(3);  /* make the radio buttons big; they don't inherit font-size */
    transform: scale(var(--star-size));
    /* the magic numbers below correlate with the font-size */
    top: -0.5em;  /* margin-top doesn't work */
    top: calc(var(--star-size) / 6 * -1em);
    margin-left: -2.5em;  /* overlap the radio buttons exactly under the stars */
    margin-left: calc(var(--star-size) / 6 * -5em);
    z-index: 2;  /* bring the button above the stars so it captures touches/clicks */
    opacity: 0;  /* comment to see where the radio buttons are */
    font-size: initial; /* reset to default */
  }
  form.amp-form-submit-error [submit-error] {
    color: red;
  }
</style>
<div class="row">
    <div class="col-md-12">
        <h4 class="text-center mb-3 mt-4" data-aos="fade-right" data-aos-duration="1500">Pilih Produk</h4>
        <p class="text-muted text-center mb-4 pb-2" data-aos="fade-left" data-aos-duration="1500">silahkan pilih produk yang ingin kamu rating.</p>
        <div class="container">  
            <div class="row">
                @foreach ($produk as $p)
                    <div class="col-md-3 grid-margin-md-0" style="border-radius:5px;" data-aos="fade-down" data-aos-duration="1500">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" height="250px;" width="150px;" src="{{asset("uploads/products").'/'.$p['product_pic']}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size:15px;">{{$p['product_name']}}</h4>
                                <p>{{'Rp. '.number_format($p['price'], 2)}}</p>
                                @php
                                  if(isset($p['rating'][Auth::user()->id]['rating'])) {
                                    $rating = $p['rating'][Auth::user()->id]['rating'];
                                  }
                                  else {
                                    $rating = 0;
                                  }
                                @endphp
                                <fieldset class="rating">
                                  <input name="rating{{$p['id']}}"
                                    type="radio"
                                    id="rating5{{$p['id']}}"
                                    value="5" onclick="gorating(5,{{$p['id']}},{{Auth::user()->id}})"
                                    {{$rating == 5 ? 'checked' : null}}
                                    >
                                  <label for="rating5"
                                    title="5 stars">☆</label>
                              
                                  <input name="rating{{$p['id']}}"
                                    type="radio"
                                    id="rating4{{$p['id']}}"
                                    value="4" onclick="gorating(4,{{$p['id']}},{{Auth::user()->id}})"
                                    {{$rating == 4 ? 'checked' : null}}
                                    >
                                  <label for="rating4"
                                    title="4 stars">☆</label>
                              
                                  <input name="rating{{$p['id']}}"
                                    type="radio"
                                    id="rating3{{$p['id']}}"
                                    value="3" onclick="gorating(3,{{$p['id']}},{{Auth::user()->id}})"
                                    {{$rating == 3 ? 'checked' : null}}
                                    >
                                  <label for="rating3{{$p['id']}}"
                                    title="3 stars">☆</label>
                              
                                  <input name="rating{{$p['id']}}"
                                    type="radio"
                                    id="rating2{{$p['id']}}"
                                    value="2" onclick="gorating(2,{{$p['id']}},{{Auth::user()->id}})"
                                    {{$rating == 2 ? 'checked' : null}}
                                    >
                                  <label for="rating2{{$p['id']}}"
                                    title="2 stars">☆</label>
                              
                                  <input name="rating{{$p['id']}}"
                                    type="radio"
                                    id="rating1{{$p['id']}}"
                                    value="1" onclick="gorating(1,{{$p['id']}},{{Auth::user()->id}})"

                                    {{$rating == 1 ? 'checked' : null}}
                                    >
                                  <label for="rating1"
                                    title="1 stars">☆</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
      AOS.init();
          function gorating(val,idproduk, iduser) { 
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: url + '/gorating',
                data: {
                    stars: val, idproduct : idproduk, iduser : iduser
                },
                success : function(data) {
                  if(data.response == true) {
                    $(function() {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                        });
                        
                        Toast.fire({
                          icon: 'success',
                          title: 'Kamu Berhasil Merating Bintang '+val
                        })
                      })
                  }
                }
            });
          }
    </script> 
@endpush
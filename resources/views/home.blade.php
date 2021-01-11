@extends('template.v_template')

@section('breadcrumb')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
	<div>
	  <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
	</div>
	<div class="d-flex align-items-center flex-wrap text-nowrap">
	  <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
		<span class="input-group-addon bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar  text-primary"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
		<input type="text" class="form-control">
	  </div>
	</div>
  </div>
@endsection

@section('content')
<div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	
	<div class="small-box bg-aqua">
	<div class="inner">
	<h3>{{Yin::JumlahUsers()}}</h3>
	<p>Jumlah<br>Pengguna</p>
	</div>
	<div class="icon"><i class="ion ion-person"></i></div>
	</div>
	</div>
	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	
	<div class="small-box bg-green">
	<div class="inner">
	<h3>{{Yin::JumlahProducts()}} </h3>
	<p>Jumlah Produk<br> Pada saat ini</p>
	</div>
	<div class="icon"><i class="ion ion-document-text"></i></div>
	</div>
	</div>
	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	
	<div class="small-box bg-yellow">
	<div class="inner">
	<h3>0</h3>
	<p>Produk <br>Yang sudah dirating</p>
	</div>
	<div class="icon"><i class="ion ion-ribbon-b"></i></div>
	</div>
	</div>
	
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	
	<div class="small-box bg-red">
	<div class="inner">
	<h3>10 </h3>
	<p>Pengguna<br>Yang sudah merating produk</p>
	</div>
	<div class="icon"><i class="ion ion-ribbon-a"></i></div>
	</div>
	</div>
	</div>
@endsection

@push('script')
	<script>
		@php
			if(Session::has('login')) {
		@endphp
			$(function() {
				const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 2000
				});
				
				Toast.fire({
					icon: 'success',
					title: '{{Session::get("login")}}'
				})
			})
		@php } @endphp
	</script>
@endpush
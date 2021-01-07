
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login - Recommender System</title>
	<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
	<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a class="noble-ui-logo d-block mb-2">Recommender<span> System</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Silahkan Login.</h5>
                    <form class="form" action="{{url('login')}}" method="post">
                        @csrf
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                        @error('username')
                            <span class="help-block" style="color:#dc3545">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password Kamu">
                        @error('password')
                            <span class="help-block" style="color:#dc3545">{{$message}}</span>
                        @enderror
                      </div>
                      
                      <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>

                        <a href="{{url('google')}}" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="mdi mdi-google"></i>
                          Login with Google
                        </a>
                      </div>
                      <a href="{{url('daftar')}}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="{{asset('assets/vendors/core/core.js')}}"></script>
	<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('assets/js/template.js')}}"></script>
  <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
  
  <script>
      @php 
        if(Session::has('error')) {
      @endphp;

      $(function() {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
      Toast.fire({
        icon: 'error',
        title: '{{Session::get("error")}}'
      })

      })

      @php } else { @endphp

      $(function()) {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
      Toast.fire({
        icon: 'success',
        title: '{{Session::get("success")}}'
      })
    })
      @php } @endphp 
  </script>
</body>
</html>
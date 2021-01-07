
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register - Recommender System</title>

	<link rel="stylesheet" href="{{asset('assets/vendors/core/core.css')}}">
	<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/app/style.css')}}">
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
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
                    <h5 class="text-muted font-weight-normal mb-4">Buat akun barumu.</h5>
                    <form class="form" method="post" action="{{url('daftar')}}">
                        @csrf
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username Kamu" name="username">
                        @error('username')
                            <span class="help-block" style="color:#dc3545">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Kamu" name="name">
                        @error('name')
                            <span class="help-block" style="color:#dc3545">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Kamu" name="email">
                        @error('email')
                            <span class="help-block" style="color:#dc3545">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Kamu" name="password">
                        @error('password')
                            <span class="help-block" style="color:#dc3545">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary text-white mr-2 mb-2 mb-md-0">Daftar Akun</button>
                        <a href="{{url('login')}}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
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
</body>
</html>
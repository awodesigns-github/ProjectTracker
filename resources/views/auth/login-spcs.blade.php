<!doctype html>
<html lang="en">

<head>
<title>POLS |Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/jquery.toast.css')}}">
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>

</head>
<style>
    body {
        background-image: url("{{asset('assets/images/B - Purple.png')}}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-greenXX">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        {{-- none --}}
                    </div>
					<div class="card" style="width: 38rem;">
                        <div class="header">
                            {{-- <img class="img-responsive"   src="{{asset('assets/logo/logo.png')}}" alt="SPCS" height="120px" width="150px" style="margin:0 auto;display:block;" > --}}

                            <p class="lead text-center ">Login to your account</p>

                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-user"></i></span>
                                    </div>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email"  placeholder="Username" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password"  placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                {{-- <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div> --}}
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="background: #6f42c1">LOGIN</button>
                                <div class="bottom">
                                    {{-- <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="page-register.html">Register</a></span> --}}
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

    <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.toast.js')}}"></script>
     <script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
    @if (Session::has('logout'))

<script>
$(document).ready(function(){
   //swal("Success", "{{ Session::get('success') }}" , "success");
   $.toast({
    heading: 'Logged Out Success',
    text: '{{ Session::get('logout') }}',
    showHideTransition: 'slide',
    position: 'top-center',
    stack: false,
    icon: 'info',
    hideAfter: 10000,
    loader: true,
    loaderBg: 'white'

})


});
</script>
@endif
</body>
</html>
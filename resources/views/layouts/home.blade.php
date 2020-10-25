<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
<!-- Site Title  -->
<title>Review Capital</title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('css/vendor.bundle.css') }}">
<link rel="stylesheet" href="{{ asset('css/style-azure.css') }}" id="changeTheme">
<!-- Extra CSS -->
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">

<style>
.file-upload-wrapper {
  position: relative;
  width: 100%;
  height: 50px;
  border: 1px solid #F2F6FE;
  border-radius: 5px;
  color: #AEAED5; }
  .file-upload-wrapper:after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    background: #F2F6FE;
    padding: 10px 15px;
    display: block;
    width: calc(100% - 40px);
    pointer-events: none;
    z-index: 20;
    height: 48px;
    line-height: 30px;
    border-radius: 5px 10px 10px 5px;
    font-weight: 500;
    overflow: hidden; }
  .file-upload-wrapper:before {
    content: 'Upload';
    position: absolute;
    top: 0;
    right: 0;
    display: inline-block;
    height: 50px;
    background: #003893;
    color: #fff;
    font-weight: 500;
    z-index: 25;
    font-size: 16px;
    line-height: 50px;
    padding: 0 15px;
    text-transform: capitalize;
    pointer-events: none;
    border-radius: 0 5px 5px 0; }
  .file-upload-wrapper:hover:before {
    background: #033079; }
  .file-upload-wrapper input {
    opacity: 0;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99;
    height: 50px;
    margin: 0;
    padding: 0;
    display: block;
    cursor: pointer;
    width: 100%; }

</style>


</head>


    <body class="nk-body body-wider mode-onepage">
    
	<div class="nk-wrap">
		<header class="nk-header page-header is-transparent is-sticky is-shrink is-dark" id="header">
		    <!-- Header @s -->
            <div class="header-main">
                <div class="header-container container">
                    <div class="header-wrap">
                        <!-- Logo @s -->
                        <div class="header-logo header-logo-ls logo" >
                            <a href="/" class="logo-link">
                                <img src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo.png') }} 2x" alt="logo">
                                <span style="color:#FFF;font-size: 24px;font-weight: bold;margin-top: 5px;">Review Capital</span>
                            </a>
                        </div>
                        <!-- Menu Toogle @s -->
                        <div class="header-nav-toggle">
                            <a href="#" class="navbar-toggle" data-menu-toggle="example-menu-04">
                                <div class="toggle-line">
                                    <span></span>
                                </div>
                            </a>
                        </div>
                        <!-- Menu @s -->
                        <div class="header-navbar header-navbar-s3">
                            <nav class="header-menu justify-content-between" id="example-menu-04">
                                <ul class="menu menu-s2" >
                                    <li class="menu-item has-sub">
                                    	<a class="menu-link nav-link menu-toggle" href="#">Applications</a>
                                    	<ul class="menu-sub menu-drop">
                                    		<li class="menu-item">
								                <a class="menu-link nav-link" target="_blank" href="{{ route('proposal') }}">Governance</a>
								            </li>
								            <li class="menu-item">
								                <a class="menu-link nav-link" target="_blank" href="https://coindesknepal.com/">CoinDesk Nepal</a>
											</li>
								            <li class="menu-item">
								                <a class="menu-link nav-link" target="_blank" href="https://buzzernepal.com/">Buzzer Nepal</a>
								            </li>
        								</ul>
                                    </li>
                                    <li class="menu-item"><a class="menu-link nav-link" target="_blank" href="https://explorer.reviewcapital.org/">Explorer</a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" target="_blank" href="https://pool.reviewcapital.org/">Mining Pool</a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" target="_blank" href="https://github.com/Review-Capital-Blockchain-Ecosystem/RIP/blob/master/Masternodes.md">Maternodes</a></li>
                                    <li class="menu-item"><a class="menu-link nav-link" target="_blank" href="https://github.com/Review-Capital-Blockchain-Ecosystem/RECAP-Core">Downloads</a></li>
                                </ul>
                                <ul class="menu-btns" >
                                    <li><a href="{{ route('login') }}" class="btn btn-rg btn-auto btn-outline btn-grad on-bg-theme-dark-alt"><span>Web Wallet</span></a></li>
                                </ul>
                            </nav>
                        </div><!-- .header-navbar @e -->
                    </div>                                                
                </div>
            </div><!-- .header-main @e -->
			
			<!-- .header-banner @e -->
		</header>
        
        @yield('content')
        
        <footer class="nk-footer bg-theme-dark">
            <hr class="hr hr-white-5 my-0">
            <section class="section section-m bg-transparent tc-light ov-v">
                <div class="container-fluid">
                    <!-- Block @s -->
                    <div class="nk-block block-footer">
                    	<div class="row justify-content-between gutter-vr-30px">
                    		<div class="col-lg-2 col-sm-6">
                                <div class="wgs wgs-menu" >
                                    <a href="#" class="wgs-logo">
                                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                                    </a>
                                 </div>
                             </div>
                             <div class="col-lg-10 col-sm-6">
                             	<div class="row justify-content-between">
                             		<div class="col-lg-3 col-sm-6">
                             			<div class="wgs wgs-menu">
		                                    <div class="wgs-body ml-lg-n3">
		                                    	<h5>Technology</h5>
		                                        <ul class="wgs-links" >
		                                            <li><a target="_blank" href="https://github.com/Review-Capital-Blockchain-Ecosystem/RECAP-Core">RECAP-QT</a></li>
		                                            <li><a href="{{ route('login') }}">Web Wallet</a></li>
		                                            <li><a target="_blank" href="https://github.com/Review-Capital-Blockchain-Ecosystem/RIP/blob/master/Masternodes.md">Masternodes</a></li>
		                                            <li><a target="_blank" href="https://teams.microsoft.com/l/team/19%3ac3d7d08df55d499aae9fd832a662e744%40thread.tacv2/conversations?groupId=43f852ba-bb71-401f-8090-12dceae50d46&tenantId=e0cb6ced-0c0d-49b4-908e-0add95338c4d">Join RECAP</a></li>
		                                        </ul>
		                                    </div>
		                                </div>
                             		</div>
                             		<div class="col-lg-3 col-sm-6">
                             			<div class="wgs wgs-menu">
		                                    <div class="wgs-body ml-lg-n3">
		                                    	<h5>Applications</h5>
		                                        <ul class="wgs-links" >
		                                            <li><a target="_blank" href="https://coindesknepal.com/">CoinDesk Nepal</a></li>
		                                            <li><a target="_blank" href="https://buzzernepal.com/">Buzzer Nepal</a></li>
		                                        </ul>
		                                    </div>
		                                </div>
                             		</div>
                             		<div class="col-lg-3 col-sm-6">
                             			<div class="wgs wgs-menu">
		                                    <div class="wgs-body ml-lg-n3">
		                                    	<h5>Resources</h5>
		                                        <ul class="wgs-links" >
		                                            <li><a target="_blank" href="{{ url('/media') }}">Media Kit</a></li>
		                                        </ul>
		                                    </div>
		                                </div>
                             		</div>
                             		<div class="col-lg-3 col-sm-6">
                             			<div class="wgs wgs-menu">
		                                    <div class="wgs-body ml-lg-n3">
		                                    	<h5>Contact</h5>
		                                        <ul class="wgs-links" >
		                                            <li><a href="mailto:support@reviewcapital.org">support@reviewcapital.org</a></li>
		                                        </ul>
		                                    </div>
		                                </div>
                             		</div>
                             	</div>
                             </div>
                    	</div>
                        <div class="footer-bottom pdt-l">
                            <div class="row justify-content-center">
                                <div class="col-lg-4">
                                    <div class="copyright-text copyright-text-s3">
                                        <p><span class="d-block">&copy; 2020, RECAP Blockchain. All rights reserved</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-lg-center">
                                    <ul class="social">
                                        <li class="animated" data-animate="fadeInUp" ><a target="_blank" href="https://twitter.com/RecapBlockchain"><em class="social-icon fab fa-twitter"></em></a></li>
                                        <li class="animated" data-animate="fadeInUp" ><a target="_blank" href="https://github.com/Review-Capital-Blockchain-Ecosystem"><em class="social-icon fab fa-github"></em></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 text-lg-right">
                                    <ul class="footer-links">
                                        <li><a target="_blank" href="{{ url('/privacy') }}">Privacy Policy</a></li>
                                        <li><a target="_blank" href="{{ url('/terms') }}">Terms</a></li>
                                        <li><a target="_blank" href="{{ url('/disclaimer') }}">Disclaimer</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .block @e -->
                </div>
            </section>
            <div class="nk-ovm shape-t h-75"></div>
        </footer>
    </div>
    
    <!-- Modal @s --><!-- // -->
    <div class="modal fade" id="login-popup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="ath-container m-0">
                    <div class="ath-body">
                        <h5 class="ath-heading title">Sign in <small class="tc-default">with your Account</small></h5>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input id="email" type="email" class="input-bordered @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input id="password" type="password" class="input-bordered @error('password') is-invalid @enderror"  placeholder="Password" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field-item d-flex justify-content-between align-items-center">
                                <div class="field-item pb-0">
                                    <input class="input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember-me-100">Remember Me</label>
                                </div>
                                <div class="forget-link fz-6">
                                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#reset-popup">Forgot password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-md">Sign In</button>
                        </form>

                        <div class="ath-note text-center">
                            Don’t have an account? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#register-popup"> <strong>Sign up here</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .modal @e -->
    
    <!-- Modal @s -->
    <div class="modal fade" id="register-popup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="ath-container m-0">
                    <div class="ath-body">
                        <h5 class="ath-heading title">Sign Up <small class="tc-default">Create New Account</small></h5>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field-item">
                                <div class="field-wrap">
                                     <input id="name" type="text" class="input-bordered @error('name') is-invalid @enderror" placeholder="Your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input id="email" type="email" class="input-bordered @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input id="password" type="password" class="input-bordered @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input id="password-confirm" type="password" class="input-bordered" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-md">Sign Up</button>
                        </form>

                        <div class="ath-note text-center">
                            Already have an account? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#login-popup"> <strong>Sign in here</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .modal @e -->
    <!-- Modal @s -->
    <div class="modal fade" id="reset-popup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="ath-container m-0">
                    <div class="ath-body">
                        <h5 class="ath-heading title">Reset <small class="tc-default">with 12 digit backup phrase</small></h5>
                        <form method="POST" action="{{ route('reset') }}">
                            @csrf
                            <div class="field-item">
                                <div class="field-wrap">
                                    <input id="wordlist" type="text" placeholder="Your 12 digit backup phrase" class="input-bordered @error('wordlist') is-invalid @enderror" name="wordlist" value="{{ old('wordlist') }}" required autocomplete="wordlist" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-md">Reset Password</button>
                            <div class="ath-note text-center">
                                Remembered? <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#login-popup"> <strong>Sign in here</strong></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .modal @e -->
    
    <div class="preloader"><span class="spinner spinner-round"></span></div>
    
    <!-- JavaScript -->
    <script src="{{ asset('js/jquery.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $(this).parents(".file-upload-wrapper").attr("data-text",fileName);
            });
        });
    </script>
</body>

</html>
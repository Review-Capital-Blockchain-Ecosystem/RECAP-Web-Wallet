<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review Capital </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
</head>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="header dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                            <a class="navbar-brand" href="/" style="font-size: 36px;"><img src="{{ asset('images/logo.png') }}" alt=""> Review Capital</a>

                            <div class="dashboard_log my-2">
                                <div class="d-flex align-items-center">
                                    <div class="account_money">
                                        <ul>
                                            <li class="crypto">
                                                <span>{{ number_format(Auth::User()->wallet->balance,8)}} RECAP</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="">@if(Auth::user()->imgurl==NULL)<i class="la la-user"></i>@else <img src="/images/user/{{Auth::user()->imgurl}}" width="45px" height="45px"> @endif</span>
                                            <span class="name">{{ Auth::user()->fullname }}</span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('wallet') }}" class="dropdown-item">
                                                <i class="las la-wallet"></i> Wallet
                                            </a>
                                            <a href="{{ route('history') }}" class="dropdown-item">
                                                <i class="la la-book"></i> History
                                            </a>
                                            <a href="{{ route('accounts') }}" class="dropdown-item">
                                                <i class="la la-user"></i> Account
                                            </a>
                                            <a href="{{ route('security') }}" class="dropdown-item">
                                                <i class="la la-cogs"></i> Settings
                                            </a>
                                            <a href="{{ route('logout') }}" class="dropdown-item logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="la la-sign-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" data-toggle="tooltip" data-placement="right" title="Home">
                            <span><i class="la la-igloo"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wallet') }}" data-toggle="tooltip" data-placement="right" title="Wallet">
                            <span><i class="las la-wallet"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('accounts') }}" data-toggle="tooltip" data-placement="right" title="Account">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('security') }}" data-toggle="tooltip" data-placement="right" title="Ssecurity">
                            <span><i class="la la-cogs"></i></span>
                        </a>
                    </li>
                    <li>
                    	<a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="right" title="LogOut" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    		<span><i class="la la-sign-out"></i></span>
                    	</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="page-title dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title-content">
                            <p>Welcome Back,<span> {{ Auth::user()->fullname }}</span>
                                <div class="row usd-rate-mobile">
                                    <div class="col-xl-12 col-sm-12">
                                        <div class="total-balance">
                                            @if(Session::has('error'))
												<p class="alert alert-danger">{{ Session::get('error') }}</p>
											@endif
											@if(Session::has('success'))
												<p class="alert alert-success">{{ Session::get('success') }}</p>
											@endif
											@if ($errors->any())
										    	<div class="alert alert-danger">
											        <ul>
											            @foreach ($errors->all() as $error)
											                <li>{{ $error }}</li>
											            @endforeach
											        </ul>
											    </div>
											@endif
	                                        </div>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="footer dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="copyright">
                            <p>© Copyright 2019 <a href="#">Review Capital</a> I All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/global.js') }}"></script>
    
    <script src="{{ asset('js/waves.min.js') }}"></script>


    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/circle-progress-init.js') }}"></script>


    <!--  flot-chart js -->
    <script src="{{ asset('js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/apexchart-init.js') }}"></script>


    <!-- <script src="./js/dashboard.js"></script> -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/scripts-admin.js') }}"></script>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{asset('Saasassets/css/core.min.css')}}" rel="stylesheet">
    <link href="{{asset('Saasassets/css/thesaas.min.css')}}" rel="stylesheet">
    <link href="{{asset('Saasassets/css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('SaaSassets/img/favicon2.png')}}">
    <link rel="icon" href="{{asset('SaaSassets/img/favicon2.png')}}">
    @yield('style')
</head>

@yield('head')

<body class="drawer-open1">


<!-- Topbar -->
<nav class="topbar topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <a class="topbar-brand" href="{{route('home')}}">
                <img class="logo-default" src="{{url('SaaSassets/img/CustomBlack.png')}}" alt="logo">
                <img class="logo-inverse" src="{{url('SaaSassets/img/CustomBlack.png')}}" alt="logo">
            </a>
        </div>


        <div class="topbar-right">

            <button class="drawer-toggler ml-12"><i class="fa fa-bars"></i></button>
        </div>

    </div>
</nav>
<!-- END Topbar -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container m-5">
                <div class="container m-5">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4 class="fw-200">Login</h4>
                        <p>Sign into your account using your credentials.</p>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>

                        <div class="row align-items-center pt-3 pb-5">
                            <div class="col-auto">

                            </div>

                            <div class="col text-right">
                                <p class="mb-0 fw-300"><a class="text-muted small-2" href="/password/reset">Forgot password?</a></p>
                            </div>
                        </div>

                        <button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>

                        <div class="divider">Or sign in with</div>
                        <div class="text-center">
                            <a class="btn btn-square btn-facebook" href="{{ url('/login/facebook') }}"><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-square btn-google" href="{{ url('/login/google') }}"><i class="fa fa-google"></i></a>
                            <a class="btn btn-square" style="background-color: #0072b1 ;" href="{{ url('/login/linkedin') }}"><i class="fa fa-linkedin"></i></a>
                        </div>

                        <p class="small-2 text-center mt-5 mb-0">Don't have an account? <a href="{{ url('/login') }}">Create one</a></p>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>






<!-- Main container -->
<main class="main-content">



@yield('content')
















</main>
<!-- END Main container -->






<!-- Footer -->
<!-- END Footer -->



<!-- Drawer -->
<div class="drawer">
    <div class="drawer-content">
        <ul class="nav nav-primary nav-hero flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Categories</a>
            </li>
            @auth
                @if(Auth::user()->hasRole('superadministrator'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard/index')}}">Tableau de bord</a>
                    </li>
                @elseif(Auth::user()->hasRole('administrator'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('prof/editcourse')}}">Tableau de bord</a>
                    </li>

                @endif
            @endif

            @auth
                @if(Auth::user()->hasRole('abonne|superadministrator'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">Profile</a>
                    </li>
                @endif
                @if(Auth::user()->hasRole('abonne|superadministrator'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Messenger')}}">Live Support</a>
                    </li>
                @endif
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{route('pricing')}}">Pricing</a>
            </li>

        </ul>
        <br><br>
        <br>

        <ul class="nav nav-primary flex-column">
            <li class="nav-item">
                <a class="nav-link" href="page-about.html">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="page-faq.html">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/privacy')}}">Privacy Policy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
        </ul>

        <hr>
        <p style="text-align: center">Our Social media</p>
        <div class="social social-boxed social-rounded text-center">
            <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
            <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
            <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
            <a class="social-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
        </div>

        <br>

        <div class="row justify-content-md-center">

            <div class="col-md-12">
                @auth
                    <a class="btn btn-sm btn-block btn-danger" href="{{route('logout')}}">Logout </a>
                @else
                    <a class="btn btn-sm btn-block btn-primary"  data-toggle="modal" data-target="#loginModal" href="#">Sign in / sign Up</a>
                @endif
            </div>

        </div>

    </div>

    <button class="drawer-close"></button>
    <div class="drawer-backdrop"></div>
</div>

<!-- END Drawer -->

@include('sweetalert::alert')

<!-- Scripts -->
<script src="{{asset('SaaSassets/js/core.min.js')}}"></script>
<script src="{{asset('SaaSassets/js/thesaas.min.js')}}"></script>
<script src="{{asset('SaaSassets/js/script.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166072696-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-166072696-1');
</script>
</body>
</html>

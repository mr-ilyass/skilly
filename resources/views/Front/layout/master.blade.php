
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Skilly</title>

    <!-- Styles -->
    <link href="{{asset('Saasassets/css/core.min.css')}}" rel="stylesheet">
    <link href="{{asset('Saasassets/css/thesaas.min.css')}}" rel="stylesheet">
    <link href="{{asset('Saasassets/css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('SaaSassets/img/favicon2.png')}}">
    <link rel="icon" href="{{asset('SaaSassets/img/favicon2.png')}}">
</head>

<body>


<!-- Topbar -->
<nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <a class="topbar-brand" href="{{url('/')}}">
                <img class="logo-default" src="{{url('SaaSassets/img/CustomBlack.png')}}" alt="logo">
                <img class="logo-inverse" src="{{url('SaaSassets/img/LogoCustom.png')}}" alt="logo">
            </a>
        </div>


        <div class="topbar-right">
            <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{trans('categories')}} <i class="fa fa-caret-down"></i></a>
                    <div class="nav-submenu">
                        @if(!empty($categories))
                            @foreach($categories as $categorie)
                        <a class="nav-link" href="{{url('categorie/'.$categorie->id)}}">{{$categorie->name}}</a>
                            @endforeach
                            @endif
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#" data-scrollto="section-intro">{{trans('services')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-scrollto="plans" href="#">{{trans('plans')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-scrollto="about" href="#">{{trans('About_us')}} </a>

                </li>





                <li class="nav-item">
                    @auth
                        <a class="nav-link"  href="{{route('home')}}"> {{ Auth::user()->name }}</a>
                        <div class="nav-submenu">
                            <a class="nav-link" href="{{url('categorie/'.$categorie->id)}}">Profile</a>
                            <a class="nav-link" href="{{url('/logout')}}">Logout</a>

                        </div>
                    @else
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal" href="#">{{trans('Login')}}</a>

                    @endif
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"></a>

                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- END Topbar -->

@yield('header')

<!-- Main container -->
<main class="main-content">


    @yield('content')

</main>




<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                    <a href="{{url('/')}}"><img src="{{asset('SaaSassets/img/CustomBlack.png')}}" alt="logo"></a>
                </p>
            </div>

            <div class="col-12 col-lg-6">
                <ul class="nav nav-primary nav-hero">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="block-feature.html">Features</a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link" href="page-pricing.html">Pricing</a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-lg-3">
                <div class="social text-center text-lg-right">
                    <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END Footer -->
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

@include('sweetalert::alert')


</body>

<!-- Scripts -->
<script src="{{asset('SaaSassets/js/core.min.js')}}"></script>
<script src="{{asset('SaaSassets/js/thesaas.min.js')}}"></script>
<script src="{{asset('SaaSassets/js/script.js')}}"></script>
<script type="text/javascript">
    @if (count($errors) > 0)
    $('#loginModal').modal('show');
    @endif
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166072696-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-166072696-1');
</script>
</html>

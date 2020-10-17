
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
            <a class="topbar-brand" href="{{route('home')}}">
                <img class="logo-default" src="{{url('SaaSassets/img/CustomBlack.png')}}" alt="logo">
                <img class="logo-inverse" src="{{url('SaaSassets/img/LogoCustom.png')}}" alt="logo">
            </a>
        </div>


        <div class="topbar-right">
            <ul class="topbar-nav nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">{{trans('categories')}} </a>
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
                        <a class="nav-link"  href="{{route('logout')}}">Logout</a>

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



<!-- Header -->
<header class="header header-inverse h-fullscreen pb-80" data-parallax="{{url('SaaSassets/img/bg.jpg')}}" data-overlay="8">
    <div class="container text-center">

        <div class="row h-full">
            <div class="col-12 col-lg-8 offset-lg-2 align-self-cnter">

                <h1 class="hidden-sm-down">Besoin d'aide en <span class="text-primary" data-type="Data Science,Finance, Design, IT, Networking,Marketing,Entrepreneurship"> WebApps</span><span class="typed-cursor">|</span></h1>
                <h1 class="hidden-md-up">You Need help in <br><span class="text-primary" data-type="Data Science,Finance, Design, IT, Networking,Marketing,Entrepreneurship"> WebApps</span><span class="typed-cursor">|</span></h1>
                <br>
                <p class="fs-20 hidden-sm-down">Skilly let you Take the control of your career, <br> Learn the technical skills you need for the job you want</p>
                <p class="fs-15 hidden-md-up">TheSaaS Is an elegant, modern and fully customizable template developed for software, SaaS product and Web Applications.</p>

                <br>
                <a class="btn btn-lg btn-round w-200 btn-primary mr-16 hidden-sm-down" href="{{route('home')}}">Get in</a>
                <a class="btn btn-lg btn-round w-200 btn-primary  hidden-md-up" href="{{route('home')}}">See Demos</a>
                <hr class="w-50 hidden-sm-down">
                <br>
                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
                </div>


            </div>

        </div>
    </div>
</header>
<!-- END Header -->



<!-- Main container -->
<main class="main-content">




    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | More Header
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <section class="section" >

        <div class="container-wide" id="section-intro">
            <div class="row">


                <div class="offset-1 col-10 col-lg-6 offset-lg-1 text-center text-lg-left">
                    <h2>Take the control of your career</h2>
                    <p class="lead">Have a clear picture of what your career goals are <br>And then Take action<br></p>

                    <br>

                    <div class="row gap-y">

                        <div class="col-12 col-md-6">
                            <i class="fa fa-tv text-gray-dark fs-25 mb-3"></i>
                            <h6 class="text-uppercase mb-3">audio-visual</h6>
                            <p class="fs-14">Des cours audio visuel crée par les meilleurs professeurs.</p>
                        </div>


                        <div class="col-12 col-md-6">
                            <i class="fa fa-wrench text-gray-dark fs-25 mb-3"></i>
                            <h6 class="text-uppercase mb-3">Support</h6>
                            <p class="fs-14">pas à pas jusqu'a votre succés.</p>
                        </div>


                        <div class="col-12 col-md-6">
                            <i class="fa fa-users text-gray-dark fs-25 mb-3"></i>
                            <h6 class="text-uppercase mb-3">Large Community</h6>
                            <p class="fs-14">Contacter toute la communauté :D</p>
                        </div>


                        <div class="col-12 col-md-6">
                            <i class="fa fa-file-text-o text-gray-dark fs-25 mb-3"></i>
                            <h6 class="text-uppercase mb-3">Livres</h6>
                            <p class="fs-14">Notre support va t'aidé a choisir les meilleurs lvire.</p>
                        </div>

                    </div>

                </div>


                <div class="col-lg-5 hidden-md-down align-self-center">
                    <img class="shadow-3 aos-init aos-animate" src="{{asset('SaaSassets/img/model1.png')}}" alt="..." data-aos="slide-left" data-aos-duration="1500">
                </div>


            </div>
        </div>

    </section>


    <section id="plans" class="section section-inverse"style="background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%)">
        <div class="container" >

            <div class="row gap-y text-center">

                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name" style="color: #6c757d">Monthly</p>
                        <br>
                        <h2 class="price text-success">200<span class="price-unit">M.A.D</span></h2>
                        <br>

                        <small>Accés a toutes les catégories</small><br>
                        <small>Support 5/7 Days</small><br>
                        <small></small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn btn-primary" href="{{route('pricing')}}">Get started</a></p>
                    </div>
                </div>


                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name" style="color: #6c757d" >6 Months</p>
                        <br>
                        <h2 class="price text-success">1099<span class="price-unit">M.A.D</span> </h2>
                        <br>

                        <small>Accés a toutes les catégories</small><br>
                        <small>Support 7/7 Days and 24h/24</small><br>
                        <small></small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn btn-success"  href="{{route('pricing')}}">Get started</a></p>
                    </div>
                </div>


                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name" style="color: #6c757d">Yearly</p>
                        <br>
                        <h2 class="price" style="color: #2c003e">2199<span class="price-unit" >M.A.D</span></h2>
                        <br>

                        <small>Accés a toutes les catégories</small><br>
                        <small>Support 7/7 Days and 24h/24</small><br>
                        <small>resolve technical problems</small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn btn-primary" href="{{route('pricing')}}">Get started</a></p>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <br><br>

    <section id="about" class="section overflow-hidden bg-gray ">
        <div class="container-wide" >
            <div class="row gap-y align-items-center">


                <div class="col-lg-6 hidden-md-down align-self-center">
                    <img class="shadow-3 aos-init aos-animate" src="{{asset('SaaSassets/img/abt.jpg')}}" alt="..." data-aos="slide-right" data-aos-duration="1500">
                </div>

                <div class="col-12 col-lg-6 pl-50 pr-80">
                    <h2>Our Mission</h2>
                    <p class="lead">Our integrity is unwavering—we can always be counted on. We are authentic and sincere. Asking for help, granting trust and assuming positive intent allow us to be responsible employees and to act in the best interest of Skilly.</p>

                    <br>

                    <p>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">We aim to inspire others with our infectious optimism.</span>
                    </p>

                    <p>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">We are proactive, adaptive and continuously maintain a learner’s mindset</span>
                    </p>

                    <p>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">We are accountable for our past, current and future work.</span>
                    </p>

                    <p>
                        <i class="ti-check text-success mr-8"></i>
                        <span class="fs-14">We strive to live life with the mindset of create or complain, and choose to create..</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-inverse py-120" style="background-image: url({{asset('SaaSassets/img/subs.png')}})" data-overlay="7">
        <div class="container text-center">

            <h2>Stay Tuned</h2>
            <br>
            <p class="lead">Subscribe to our newsletter and receive the latest news from skilly.</p>

            <br><br>

            <form class="form-inline form-glass form-round justify-content-center" action="{{ route('store') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" name="user_email" class="form-control" placeholder="Email Address">
                    <span class="input-group-btn">
                <button class="btn btn-lg btn-white">Subscribe</button>
              </span>
                </div>


            </form>

        </div>
    </section>



</main>




<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                    <a href="index.html"><img src="{{asset('SaaSassets/img/CustomBlack.png')}}" alt="logo"></a>
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



</body>

<!-- Scripts -->
@include('sweetalert::alert')
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

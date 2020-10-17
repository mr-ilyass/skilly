@extends('Front.layout.profilelayout')
@section('title')
    Profile

@endsection

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('profileStyle/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('')}}profileStyle/css/animate.css">

    <link rel="stylesheet" href="{{asset('profileStyle/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('profileStyle/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('profileStyle/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('profileStyle/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('profileStyle/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('profileStyle/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('profileStyle/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('profileStyle/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('profileStyle/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('profileStyle/css/style.css')}}">


@endsection

@section('content')




    <div id="Mainpage">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
            <h1 id="colorlib-logo"><a href="index.html"><span></span></a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li><a href="#" data-scrollto="main">Profile</a></li>
                    <li><a href="#" data-scrollto="courses">Courses</a></li>
                    <li><a href="#" data-scrollto="paiment">Paiment</a></li>
                </ul>
            </nav>

            <div class="colorlib-footer">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> <br> All rights reserved | skilly </p>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </aside> <!-- END COLORLIB-ASIDE -->
        <div id="main">
            <div class="hero-wrap js-fullheight" style="background-image: url({{asset('profileStyle/images/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="js-fullheight d-flex justify-content-center align-items-center">
                    <div class="col-md-8 text text-center">
                        <div class="img mb-4" style="background-image: url({{asset('storage/uploadUsers/avatar/'.Auth::user()->avatar)}});"></div>
                        <div class="desc">
                            <h2 class="subheading">Hello </h2>
                            <h1 class="mb-4">{{$name}}</h1>
                            <p class="mb-4">we are glad to have you here</p>
                        </div>
                    </div>
                </div>
            </div>


            <section class="section" id="courses">
                <div class="container">
                    @if(!$course->isEmpty())

                    <header class="section-header">
                        <h2>Les cours enregisté</h2>
                    </header>
                    @else

                        <h2>Vous avez pas de cours enregistré</h2>

                    @endif

                    <div class="row gap-y text-center">

                        @foreach($course as $cours)
                        <div class="col-12 col-md-6 col-lg-4 portfolio-2">
                            <p><a href="demo-helpato.html"><img src="{{asset('storage/'.$cours->image)}}" height="200px"></a></p>
                            <p><strong>{{$cours->name}}</strong></p>
                            <a href="{{route('Episode',$cours->episodes_id)}}">Continuer</a>
                        </div>
                        @endforeach






                    </div>


                </div>
            </section>
            <section id="paiment" class="section p-0">
                <div class="container-wide">
                    <div class="row no-gap text-center">

                        <div class="col-12 col-md-6 bg-gray p-70">
                            <p class="iconbox iconbox-xxl bg-white" style="color: #0b0b0b">
                                <i class="fa fa-user-o"></i>
                            </p>
                            <br><br>
                            <h5>abonnement
                                @if(!empty($abonnement))
                                @if($abonnement->stripe_plan == "PFE_6month")
                                Semestriel
                                @elseif($abonnement->stripe_plan == "PFE_yearly")
                                Annuel
                                @elseif($abonnement->stripe_plan == "PFE_monthly")
                                Mensuel
                                @endif
                                    @endif
                            </h5>
                            <br>
                            <p> @if(!empty($abonnement)) Commencé le : {{$abonnement->created_at->format('d M Y')}} @endif</p>
                            <p> Paiment :
                                @if(!empty($abonnement))
                                @if($abonnement->stripe_plan == "PFE_6month")
                                    le {{$abonnement->created_at->format('d')}} chaque 6 mois
                                @elseif($abonnement->stripe_plan == "PFE_yearly")
                                    le {{$abonnement->created_at->format('d M')}} chaque année
                                @elseif($abonnement->stripe_plan == "PFE_monthly")
                                    le {{$abonnement->created_at->format('d')}} chaque mois
                                @endif
                                @endif
                            </p>
                            <br>
                        </div>


                        <div class="col-12 col-md-6 p-70">
                            <p class="iconbox iconbox-xxl" style="color: #0b0b0b">
                                <i class="fa fa-credit-card-alt"></i>
                            </p>
                            <br><br>
                            <h5>Credit Card</h5>
                            <br>
                            <p>{{strtoupper(Auth::user()->card_brand)}} : **************{{Auth::user()->card_last_four}}</p>
                            <br>
                            <a href="{{route('cancelSubs')}}">Cancel abonnement</a>
                        </div>

                    </div>
                </div>
            </section>
            <br><br><br><br><br>



        </div><!-- END COLORLIB-MAIN -->

    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="{{asset('profileStyle/js/jquery.min.js')}} "></script>
    <script src="{{asset('profileStyle/js/jquery-migrate-3.0.1.min.js')}} "></script>
    <script src="{{asset('profileStyle/js/popper.min.js')}} "></script>
    <script src="{{asset(' profileStyle/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('profileStyle/js/jquery.easing.1.3.js')}} "></script>
    <script src="{{asset('profileStyle/js/jquery.waypoints.min.js')}} "></script>
    <script src="{{asset('profileStyle/js/jquery.stellar.min.js')}} "></script>
    <script src="{{asset('profileStyle/js/owl.carousel.min.js')}} "></script>
    <script src="{{asset('profileStyle/js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{asset('profileStyle/js/aos.js')}} "></script>
    <script src="{{asset('profileStyle/js/jquery.animateNumber.min.js')}} "></script>
    <script src="{{asset(' profileStyle/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset(' profileStyle/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('')}} profileStyle/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset(' profileStyle/js/google-map.js')}}"></script>
    <script src="{{asset('profileStyle/js/main.js')}} "></script>


@endsection

@if(app()->getLocale())
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @else
        <html lang="fr">
        @endif

        <head>
            <meta charset="UTF-8">

            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <script src="{{ asset('js/app.js') }}" defer></script>
            <link rel="stylesheet" href="{{url('loginform/customStyleV1.css')}}">
            <link rel="stylesheet" href="{{url('loginform/all.min.css')}}">
            <link rel="stylesheet" href="{{url('loginform/animate.css')}}">
            <title>Login</title>
        </head>
        <body>
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        @if(Session::has('emailEnregistrer'))
            <div class="animated fadeOutDown" style="animation-delay: 6s;">
            <div class="alert alert-danger"> {{ Session::get('emailEnregistrer') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="animated fadeInUp delay-0.6s">
                <div class="animated fadeOutDown" style="animation-delay: 8s;">

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="animated fadeInUp delay-0.5s">
            <div class="container" id="container">

                <div class="form-container sign-up-container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1>Create Account</h1>
                        <div class="social-container">
                            <a href="{{ url('/login/facebook') }}" class="social-fb"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ url('/login/google') }}" class="social-google"><i class="fab fa-google-plus-g"></i></a>
                            <a href="{{ url('/login/linkedin') }}" class="social-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>or use your email for registration</span>
                        <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid animated shake delay-2s @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        <input name="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        <input name="password_confirmation" placeholder="Password Confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <br>
                        <a type="submit"> <button>Sign Up</button></a>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>Sign in</h1>
                        <div class="social-container">
                            <a href="{{ url('/login/facebook') }}" class="social-fb"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ url('/login/google') }}" class="social-google"><i class="fab fa-google-plus-g"></i></a>
                            <a href="{{ url('/login/linkedin') }}" class="social-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <span>or use your account</span>
                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid animated shake delay-2s @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <input id="password"  placeholder="Password" type="password" class="form-control @error('password') is-invalid animated shake delay-2s  @enderror" name="password" required autocomplete="current-password">
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                        <a type="submit"> <button>Sign In</button></a>


                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Welcome Back!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="ghost" id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, Friend!</h1>
                            <p>Enter your personal details and start journey with us</p>
                            <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<br>




        <script type="text/javascript" src="{{url('loginform/CustomScriptV1.js')}}"></script>
        <script type="text/javascript" src="{{url('loginform/all.min.js')}}"></script>


        </body>
        </html>


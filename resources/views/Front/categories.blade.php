@extends('Front.layout.layouts')
@section('title')

    Catégories

@endsection

{{--@section('header')--}}

{{--    <header class="header header-inverse bg-fixed" data-parallax="{{url('SaaSassets/img/categorie_header.jpg')}}" data-overlay="8">--}}
{{--        <div class="container text-center">--}}

{{--            <div class="row">--}}
{{--                <div class="col-12 col-lg-8 offset-lg-2">--}}

{{--                    <h1>Categories</h1>--}}
{{--                    <p class="fs-20 opacity-70">You can find a list of our product in this page. We'll deliver your order in less than two days. Try it yourself!</p>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </header>--}}

{{--@endsection--}}
@section('content')

{{--    <section class="section " style="background: #ADA996;  /* fallback for old browsers */--}}
{{--background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);  /* Chrome 10-25, Safari 5.1-6 */--}}
{{--background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */--}}
{{--">--}}
{{--        <div class="container">--}}

{{--            <div class="row gap-y">--}}


{{--                @foreach($categories as $category)--}}
{{--                <div class="col-12 col-md-6 col-xl-4">--}}
{{--                    <a class="shop-item" href="shop-single.html">--}}
{{--                            <div style="text-align: center">--}}
{{--                                <h5>{{$category->name}}</h5>--}}
{{--                            </div>--}}
{{--                        <img src="{{asset('storage/'.$category->image)}}" alt="product">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                @endforeach--}}



{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}


<div class="section overflow-hidden bg-gray ">

    <div class="container">
        <header class="section-header">
            <small> </small>
            <h2>Notre Liste est spéciale</h2>
            <hr>
            <p class="lead">Les meilleurs formations avec le meilleur prix</p>
        </header>


        <div class="row gap-y text-center ">
            @foreach($categories as $category)

            <div class="col-12 col-md-6 col-lg-4 portfolio-2">
                <p><a href="{{route('courses',[$category->id])}}"><img src="{{asset('storage/'.$category->image)}}" alt=""></a></p>
                <h5 ><strong><a href="{{route('courses',[$category->id])}}">{{$category->name}}</a></strong></h5>
            </div>
        @endforeach



        </div>

    </div>
    </div>








    <section class="section section-inverse py-120" style="background-image: url({{asset('SaaSassets/img/subs.png')}})" data-overlay="7">
        <div class="container text-center">

            <h2>Stay Tuned</h2>
            <br>
            <p class="lead">Subscribe to our newsletter and receive the latest news from Skilly.</p>

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


@endsection

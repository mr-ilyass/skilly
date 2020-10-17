@extends('Front.layout.layouts')

@section('title')

    Episodes

@endsection

@section('content')
    <style>
        .hov:hover{
            background-color: #dbdbdb;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            transition: 1s;

        }
    </style>



    <section class="section bg-gray">
        <div class="container">
            <header class="section-header">
                <h2>Enjoy Our premium Episodes</h2>
                <hr>
                <p class="lead">We are so excited and proud of our product.</p>
                <a class="btn btn-lg btn-round btn-info" href="#"> <i class="fa fa-play"></i>  Get Started : {{$Ept->course->name}}</a>
            </header>

            @foreach($Eps as $ep)


            <div class="card mb-30">
                <div class="row">
                    <div class="col-12 col-md-3 align-self-center">
                        <a href="{{route('Episode',$ep->id)}}"><img src="{{asset('storage/'.$ep->course->image)}}" alt="..."></a>
                    </div>

                    <div class="col-12 col-md-8 hov">
                        <div class="card-block">
                            <h4 class="card-title">{{$ep->N_Ep}} : {{$ep->ep_name}}</h4>
                            <p class="card-text"> {{$ep->ep_description}}</p>
                            <a class="fw-600 fs-12" href="{{route('Episode',$ep->id)}}">Commencer l'épisode <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach




            <nav class="flexbox mt-30">
                <a class="btn btn-white @if($Eps->currentPage()	== 1) disabled @endif" style="background-color: #d2c6b2 ; color: #27496d"  href="{{$Eps->previousPageUrl()}}"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
                <a class="btn btn-white  @if(!$Eps->hasMorePages())  disabled @endif " style="background-color: #d2c6b2 ; color: #27496d"  href="{{$Eps->nextPageUrl()}}">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
            </nav>


        </div>
    </section>

@endsection

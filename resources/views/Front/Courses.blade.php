@extends('Front.layout.layouts')

@section('title')

    {{$category->name}}

@endsection

@section('content')

    <style>
        .hov:hover{
            background-color: #dbdbdb;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
            transition: 1s;

        }
    </style>
    <section class="section bg-gray">
        <div class="container text-center">
            <header class="section-header">
                <h2>Notre Collection : </h2>
                <hr>
                <p class="lead">We are so excited and proud of our product.</p>
            </header>

            <h6 class="divider mt-20"><code></code></h6>
            <div class="row gap-y">
                <div class="col-12 col-lg-1">
                </div>

                <div class="col-12 col-lg-4">
                    <div class="btn-group">
                        <span class="btn btn-primary dropdown-toggle" style="color: white"  data-toggle="dropdown" aria-expanded="false">Niveau</span>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" style="color: grey" href="#">Débutant</a>
                            <a class="dropdown-item" style="color: grey" href="#">Intermediaire</a>
                            <a class="dropdown-item" style="color: grey" href="#">Avance</a>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">Go!</button>
                  </span>
                    </div>
                </div>


                <div class="col-12 col-lg-2">
                </div>


            </div>
            <h6 class="divider mt-20"><code></code></h6>
            <div class="row gap-y">

                @foreach($courses as $course)

{{--                    @if($course->level == 'debutant')--}}
{{--                    <h6 class="divider mt-20"><code>.table-striped</code></h6>--}}
                    <div class="col-12 col-lg-4 ">
                    <div class="video-btn-wrapper">
                        <img class="shadow-2 rounded" src="{{asset('storage/'.$course->image)}}" style="height: 200px; width: 320px">
                        <a class="btn btn-circular btn-glass" href="//www.vimeo.com/{{$course->overview}}" data-provide="lightbox"><i class="fa fa-play"></i></a>
                    </div>

                    <div class="hov">
                        <br>
                    <h6><a href="{{route('front/episodes',$course->id)}}">{{$course->name}}</a></h6>
                    <p class="small" style="color: #0b0b0b">Niveau : {{$course->level}}</p>
                    </div>
                </div>


            @endforeach

            </div>
            <nav class="flexbox mt-30">

            <a class="btn btn-white "  style="background-color: #d2c6b2 ; color: #27496d" href="#" >
                <i class="ti-arrow-left fs-9 mr-4"></i> Precedent
            </a>



                <a class="btn btn-white" style="background-color: #d2c6b2 ; color: #27496d"  href="#">
                        Suivent
                        <i class="ti-arrow-right fs-9 ml-4">

                        </i>
                </a>
            </nav>


        </div>
    </section>

@endsection

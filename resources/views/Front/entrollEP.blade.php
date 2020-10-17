@extends('Front.layout.layouts')

@section('title')

    Episode {{$ep->N_Ep}}

@endsection

@section('content')


    <section class="section bg-gray">
        <div class="container">


            <header class="section-header">
                <small>Chapitre {{$ep->N_Ep}}</small>
                <h2>{{$course->name}} : {{$ep->ep_name}}</h2>

                <p class="lead"> {{$ep->ep_description}}</p>
            </header>



            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('courses',[$cat->id])}}">{{$cat->name}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('front/episodes',$course->id)}}">{{$course->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">EP : {{$ep->N_Ep}} : {{$ep->ep_name}}</li>
                </ol>
            </nav>
            <div id="app" style="display: flex;
                justify-content: center;">

            <div style="width: 85% ; align-content: center" >
                <video-player :video="{{$ep->ep_video}}"></video-player>

            </div>
                <script src="{{ asset('js/app.js') }}" defer></script>

            </div>

            <nav class="flexbox mt-30">

                <a class="btn btn-white @if(!$precedent) disabled @endif"  style="background-color: #d2c6b2 ; color: #27496d"  @if($precedent) href="{{route('Episode',$precedent->id)}}" @endif>
                    <i class="ti-arrow-left fs-9 mr-4"></i> Precedent @if($precedent)  Ep {{ $precedent->N_Ep }}@endif
                </a>
                <form action="{{route('saveEpisode',$id)}}" method="post">
                    @csrf
                <button type="submit" class="btn btn-success "  href="#">
                    <i class="fa fa-save"></i> Eregistré l'avaencement
                </button>
                </form>

                <a class="btn btn-white  @if(!$suivent) disabled @endif" style="background-color: #d2c6b2 ; color: #27496d" @if($suivent)  href="{{route('Episode',$suivent->id)}}"@endif>
                    @if(!$banner->isEmpty())
                    Suivent
                    @else
                        Terminer
                    @endif
                    @if($suivent)  Ep {{ $suivent->N_Ep }}@endif

                        @if(!$banner->isEmpty())

                            <i class="ti-arrow-right fs-9 ml-4">
                        @endif
                    </i>
                </a>
            </nav>


            <br><br>








            <div class="section bt-1 bg-grey">
                <div class="container">

                    <div class="row">
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <h3>Commentaires : </h3>
                            <div class="media-list">
                                @foreach($comments as $comment)
                                <div class="media">
                                    <img class="rounded-circle w-40"
                                    @if(empty($comment->user->avatar))
                                    src= "{{asset('avatar1.jpg')}}"
                                    @else
                                        src= "{{asset('storage/uploadUsers/avatar/'.$comment->user->avatar)}}"
                                    @endif
                                    >
                                    <div class="media-body">
                                        <p class="fs-14">
                                            <strong>{{$comment->user->name}}</strong>
                                            <time class="ml-16 opacity-70 fs-12">{{$comment->created_at->diffForHumans()}}</time>
                                        </p>
                                        <p class="fs-13"> {{$comment->body}}</p>
                                        @if($comment->User_id == Auth::user()->id or Auth::user()->hasRole('superadministrator'))
                                        <a href="#"><span class="badge badge-danger" data-toggle="modal" data-target="#modifier{{$comment->id}}" >Supprimer</span></a>
                                        @if($comment->User_id == Auth::user()->id )
                                        <a href="#"><span class="badge badge-warning"  data-toggle="modal" data-target="#supprimer{{$comment->id}}">Modifier</span></a>

                                            <div class="modal fade" id="supprimer{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('modifyComment')}}" method="post">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            {{ csrf_field() }}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modification du Commentaire</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <textarea class="form-control" placeholder="Comment" rows="4" name="body">{{$comment->body}}</textarea>
                                                            </div>

                                                        </div>
                                                            <input  name="commentID" type="hidden" value="{{$comment->id}}">

                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-warning">Modifier</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="modal fade" id="modifier{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('DeleteComment')}}" method="post">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            {{ csrf_field() }}

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Suppression du commentaire</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger" role="alert">
                                                                Vous êtes sûr de supprimer le commentaire
                                                            </div>
                                                        </div>
                                                            <input  name="commentID" type="hidden" value="{{$comment->id}}">
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>




                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <hr>


                            <form action="{{ route('Commenter') }}" method="POST">
                            @csrf
                                <input  name="episode" type="hidden" value="{{$id}}">

                                <div class="form-group">
                                    <textarea class="form-control" name="body" placeholder="Comment :   (minimum : 10 Chars) " rows="4"></textarea>
                                </div>

                                <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

<br>















            <div class="card mb-30">
                @if(!$banner->isEmpty())
                    <h2>Les Episodes suivantes</h2>
                @endif
                @foreach($banner as $ep)
                <div class="row">
                    <div class="col-12 col-md-2 align-self-center">
                        <a href="blog-single.html"><img src="{{asset('storage/'.$course->image)}}" alt="..."></a>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="card-block">
                            <h4 class="card-title">{{$ep->N_Ep}} : {{$ep->ep_name}}</h4>
                            <p class="card-text">{{$ep->ep_description}}</p>
                            <a class="fw-600 fs-12" href="{{route('Episode',$ep->id)}}">Commencer l'épisode <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>







        </div>


    </section>
<section>
    <div class="container text-center">
        <h2 class="mb-20">Autre Cours</h2>
    </div>
    <div class="container">
        <div data-provide="shuffle">




            <div class="row gap-y gap-2 shuffle" data-shuffle="list" style="position: relative; overflow: hidden; height: 430.25px; transition: height 500ms ease 0s;">
                @foreach($others as $other)
                    <div class="col-6 col-lg-3 shuffle-item shuffle-item--visible" data-shuffle="item"  style="position: absolute; top: 0px; left: 0px; visibility: visible; will-change: transform; opacity: 1; transition-duration: 500ms, 500ms; transition-timing-function: ease, ease; transition-property: transform, opacity;">
                        <a class="portfolio-1" href="{{route('front/episodes',$other->id)}}">
                            <img src="{{asset('storage/'.$other->image)}}" alt="screenshot" style="height: 170px;">
                            <div class="portfolio-details">
                                <h5>{{$other->name}}</h5>
                                <p>{{$cat->name}}</p>
                            </div>
                        </a>
                    </div>

                @endforeach


            </div>


        </div>
    </div>
</section>

@endsection

@extends('dashboard.layout.master')
@section('title')

    Admin
@endsection
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$cours}}</h3>

                    <p>Cours</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-bookmarks"></i>
                </div>
                <a href="{{url('dashboard/course/edit')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$abonne}}</h3>

                    <p>Abonné</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('dashboard/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>Utilisateurs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="{{route('dashboard/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$profs}}</h3>

                    <p>Professeurs</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-person"></i>
                </div>
                <a href="{{route('dashboard/profs')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-warning">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{asset('img3.png')}}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">Statistiques</h3>
                        <h5 class="widget-user-desc">&emsp;&emsp;&emsp;&emsp;&emsp;Du plateforme <small> ( dérnier 7 jours )</small></h5>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Top Navigateur utilisé <span class="float-right badge bg-primary">
                                        {{$top_browser}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Max des Visiteurs à une page <span class="float-right badge bg-info">{{$topViews}} Visites</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Request::root()}}{{$url}}" class="nav-link">
                                    Titre de la page la plus Visité <span class="float-right badge bg-success">{{$topTitle}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Request::root()}}{{$url}}" class="nav-link">
                                    Lien de la page la plus Visité <span class="float-right badge bg-success">{{Request::root()}}{{$url}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Nouvaux utilisateurs</h3>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Abonnement</th>
                                <th> Provider</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($newUsers as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>@if($user->card_last_four == null)
                                        <span class="badge badge-warning">Non Abonné</span>
                                    @else
                                        <span class="badge badge-success">&emsp;Abonné&emsp;</span>
                                @endif

                                </td>
                                <td><span class="badge bg-danger">
                                        @if($user->provider == null)
                                            Direct Traffic
                                        @else
                                        &emsp;    {{$user->provider}}&emsp;
                                        @endif


                                    </span></td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
        </div>
    </div>





@endsection
@section('scripts')




@endsection

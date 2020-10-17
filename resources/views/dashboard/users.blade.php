@extends('dashboard.layout.master')
@section('title')

{{trans('dashboardUsers.User_sett')}}

@endsection
@section('style')
    <link rel="stylesheet" href="{{url('loginform/animate.css')}}">


@endsection
@section('content')

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon  elevation-1" style="background: #3b5998   ; color: white;"><i class="fab fa-facebook"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Facebook Traffic</span>
                    <span class="info-box-number">
                  {{$fb}}
                  <small>{{Str::plural('Utilisateur', $fb)}}</small>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon  elevation-1" style="background: #db4a39  ; color: white;"><i class="fab fa-google-plus-g"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Google Traffic</span>
                    <span class="info-box-number">{{$google}}
                    <small>{{Str::plural('Utilisateur', $google)}}</small>
                    </span>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon  elevation-1" style="background: #0072b1 ; color: white;"><i class="fab fa-linkedin"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Linkedin Traffic</span>
                    <span class="info-box-number">{{$linkedin}}
                    <small>{{Str::plural('Utilisateur', $linkedin)}}</small>
                    </span>                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Direct Members</span>
                    <span class="info-box-number">{{$direct}} {{Str::plural('Utilisateur', $direct)}} </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="container" style="">
        <div class="row justify-content-md-center">
            <div class="col col-lg-10" style="text-align: center;">
                @if ($errors->any())
                    <div class="alert alert-danger animated fadeOutDown" style="animation-delay: 6s;"    >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="background:#dc3545;">

                            <div class="col-11">
                                <h3 class="card-title" style="color: white"> Users</h3>
                            </div>


                    </div>
                    </div>
                    
                    <form action="{{route('dashboard/searchUsers')}}" method="post">
                        <input type="hidden" name="_method" value="POST">
                        @csrf

                    <div class="row">
                        <div class="col-md-6 offset-md-3 form">
                        <input type="search" name="search" class="form-control" @if(!empty($name)) value="{{$name}}" @endif placeholder="Search by name">

                        </div>
                        <input type="submit" class="btn btn-info" value="Search">
                        <a href="{{route('dashboard/users')}}"  class="btn btn-warning" style="margin-left: 5px; background-color: #f5b971;">
                            <i class="fas fa-backspace"></i>
                        </a>

                    </div>
                    </form>
                    <!-- /.card-header -->
                    <div class="card-body"  >
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead class="thead-dark" style=" font-family: Arial, sans-serif;">
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{trans('dashboardUsers.Nom_complet')}}</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{trans('dashboardUsers.email')}}</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Abonnement</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{trans('dashboardUsers.provider')}}</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">{{trans('dashboardUsers.d_creation')}}</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{trans('dashboardUsers.ban')}}</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{trans('dashboardUsers.stop_ban')}}</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{trans('dashboardUsers.status')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(empty($search))
                                        @foreach($users as $user)
                                        <tr role="row" class="odd">
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td tabindex="0" class="sorting_1">

                                                @if($user->subscription)

                                                    @if($user->subscription->stripe_plan == "PFE_6month")
                                                        <span class="badge badge-success">semestriel</span>

                                                    @elseif($user->subscription->stripe_plan == "webdevmatics_yearly")
                                                        <span class="badge badge-success">Annuel</span>

                                                    @elseif($user->subscription->stripe_plan == "PFE_monthly")
                                                        <span class="badge badge-success">Mensuel</span>


                                                    @endif


                                                @else
                                                    <span class="badge badge-warning">Non abonné</span>

                                                @endif



                                            </td>
                                            <td>@if($user->provider==null) Sur site @else {{$user->provider}} @endif </td>
                                            <td>{{ $user->created_at->isoFormat('M/D/YY')  }}</td>
                                            <td style="padding: 10px;">
                                                <button type="submit" data-toggle="modal" data-target="#ban{{$user->id}}" class="btn btn-block btn-danger">
                                                    <i class="fas fa-ban" ></i>
                                                </button>
                                            </td>
                                            <td style="padding: 10px;">


                                                <button type="submit" data-toggle="modal" data-target="#unban{{$user->id}}" class="btn btn-block btn-success">
                                                    <i class="fas fa-undo" ></i>
                                                </button>
                                            </td>
                                            <td>@if($user->banned_until==null) none @else {{$user->banned_until->isoFormat('M/D/YY') }} @endif </td>
                                            <div class="modal fade" id="unban{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('dashboard/unban',[$user->id])}}" method="post">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    {{ csrf_field() }}
                                                                <div class="modal-body" align="center">

                                                                    <div class="alert alert-default-warning" role="alert">

                                                                        <i class="fas fa-undo" style="margin-right: 5px;" ></i>

                                                                        Vous etes sûr de donner l'acces à : {{$user->name}}
                                                                    </div>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">confirmer</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="modal fade" id="ban{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('dashboard/update',[$user->id])}}" method="post">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            {{ csrf_field() }}

                                                            <div class="modal-body" align="center">

                                                                <div class="alert alert-default-danger" role="alert">

                                                                    <i class="fas fa-ban" style="margin-right: 5px;" ></i>

                                                                    Vous etes sûr de suspendu : {{$user->name}}
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="example-datetime-local-input" class="col-2 col-form-label">Jusqu'a</label>
                                                                    <div class="col-10">
                                                                        <input name="dateBanner" class="form-control" type="date" value="" placeholder="" id="example-datetime-local-input" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">suspendu</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>






                                        </tr>

                                            @endforeach
                                        @else
                                            @foreach($search as $user)
                                                <tr role="row" class="odd">
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td tabindex="0" class="sorting_1">

                                                        @if($user->subscription)

                                                            @if($user->subscription->stripe_plan == "PFE_6month")
                                                                <span class="badge badge-success">semestriel</span>

                                                            @elseif($user->subscription->stripe_plan == "webdevmatics_yearly")
                                                                <span class="badge badge-success">Annuel</span>

                                                            @elseif($user->subscription->stripe_plan == "PFE_monthly")
                                                                <span class="badge badge-success">Mensuel</span>


                                                            @endif


                                                        @else
                                                            <span class="badge badge-warning">Non abonné</span>

                                                        @endif



                                                    </td>
                                                    <td>@if($user->provider==null) Sur site @else {{$user->provider}} @endif </td>
                                                    <td>{{ $user->created_at->isoFormat('M/D/YY')  }}</td>
                                                    <td style="padding: 10px;">
                                                        <button type="submit" data-toggle="modal" data-target="#ban{{$user->id}}" class="btn btn-block btn-danger">
                                                            <i class="fas fa-ban" ></i>
                                                        </button>
                                                    </td>
                                                    <td style="padding: 10px;">


                                                        <button type="submit" data-toggle="modal" data-target="#unban{{$user->id}}" class="btn btn-block btn-success">
                                                            <i class="fas fa-undo" ></i>
                                                        </button>
                                                    </td>
                                                    <td>@if($user->banned_until==null) none @else {{$user->banned_until->isoFormat('M/D/YY') }} @endif </td>
                                                    <div class="modal fade" id="unban{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('dashboard/unban',[$user->id])}}" method="post">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body" align="center">

                                                                        <div class="alert alert-default-warning" role="alert">

                                                                            <i class="fas fa-undo" style="margin-right: 5px;" ></i>

                                                                            Vous etes sûr de unbanner : {{$user->name}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success">Unban</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="ban{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('dashboard/update',[$user->id])}}" method="post">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-header">


                                                                    </div>
                                                                    <div class="modal-body" align="center">

                                                                        <div class="alert alert-default-danger" role="alert">

                                                                            <i class="fas fa-ban" style="margin-right: 5px;" ></i>

                                                                            Vous etes sûr de banner : {{$user->name}}
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-datetime-local-input" class="col-2 col-form-label">Jusqu'a</label>
                                                                            <div class="col-10">
                                                                                <input name="dateBanner" class="form-control" type="date" value="" placeholder="" id="example-datetime-local-input" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger">ban</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>






                                                </tr>

                                            @endforeach

                                        @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6 float-left">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        @if(empty($search))
                                            Showing {{$users->count()}} of {{$users->total()	}} </div>
                                        @else
{{--                                        Showing {{$search->count()}} of {{$search->total()	}} </div>--}}
                                        @endif

                                </div>
                                <div class="col-md-6 float-right">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                        <ul class="pagination">
                                            @if(empty($search))
                                            {{$users->links()}}
                                            @else
{{--                                            {{$search->links()}}--}}
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        <div class="container" style="">
            <div class="row justify-content-md-center">
                <div class="col col-lg-8" style="text-align: center;">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title float">{{trans('dashboardUsers.stats')}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div></div></div>



    <div class="container" style="">
        <div class="row justify-content-md-center">
            <div class="col col-lg-8" style="text-align: center;">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title float">Statistique d'abonnement</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donut" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div></div></div>


@endsection
@section('scripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <script>
                $('#myModal').on('shown.bs.modal', function () {
                    $('#myInput').trigger('focus')
                })
            </script>
            <script>
                // Get context with jQuery - using jQuery's .get() method.
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData        = {
                    labels: [
                        '{{trans('dashboardUsers.fb')}}\n',
                        '{{trans('dashboardUsers.google')}}\n',
                        '{{trans('dashboardUsers.linkedin')}}\n',
                        '{{trans('dashboardUsers.directe')}}\n',
                    ],
                    datasets: [
                        {
                            data: [{{$fb}},{{$google}},{{$linkedin}},{{$direct}}],
                            backgroundColor : ['#3b5998', '#db4a39', '#0072b1', '#ffc107'],
                        }
                    ]
                }
                var donutOptions     = {
                    maintainAspectRatio : false,
                    responsive : true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                var donutChart = new Chart(donutChartCanvas, {
                    type: 'pie',
                    data: donutData,
                    options: donutOptions
                })
            </script>
    <script>
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donut').get(0).getContext('2d')
        var donutData        = {
            labels: [

                'Abonné',
                'Non abonné',
            ],
            datasets: [
                {
                    data: [{{$abonne}},{{$non_abonne}}],
                    backgroundColor : ['#00ff00', '#dd7631'],
                }
            ]
        }
        var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    </script>

@endsection

@extends('dashboard.layout.master')
@section('title')


    Coupons

@endsection
@section('style')
    <link rel="stylesheet" href="{{url('loginform/animate.css')}}">


@endsection
@section('content')
    @include('sweetalert::alert')

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
                    @if (session('SOS'))
                        <div class="alert alert-danger animated fadeOutDown" style="animation-delay: 6s;"  >
                            {{ session('SOS') }}
                        </div>
                    @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('dashboardCategorie.listecat')}}</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#createcoupon">
                                           Creer un coupon</button>
                                        <div class="modal fade" id="createcoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('dashboard/couponCreate')}}" method="post">
                                                        <input type="hidden" name="_method" value="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nom de coupon</label>
                                                                <input type="text" class="form-control" name="name_C" aria-describedby="emailHelp">
                                                                <small id="emailHelp"  class="form-text text-muted btn-warning">Le nom de coupon doit etre unique</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">clé du coupon</label>
                                                                <input type="text" class="form-control" name="key_C" >
                                                            </div>
                                                            <br>
                                                            <div class="form-check">
                                                                <input type="checkbox" name="checkValue" class="form-check-input" id="exampleCheck1" checked>
                                                                <label class="form-check-label" for="exampleCheck1">Activer</label>
                                                            </div>
                                                            <br>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>clé </th>
                                        <th>status</th>
                                        <th>{{trans('dashboardCategorie.modifier')}}</th>
                                        <th>{{trans('dashboardCategorie.delete')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->coupon_Name}}</td>
                                        <td>{{$coupon->coupon_Key}}</td>
                                        <td>
                                            @if($coupon->coupon_value == 'active')
                                                <span class="badge badge-success">
                                                {{$coupon->coupon_value}}
                                            </span>

                                                @else
                                                <span class="badge badge-danger">
                                                {{$coupon->coupon_value}}
                                            </span>
                                                @endif

                                        </td>

                                        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$coupon->id}}"><i class="fas fa-edit"></i></button></td>
                                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$coupon->id}}"><i class="far fa-trash-alt"></i></button></td>


                                        <div class="modal fade" id="exampleModal{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('dashboard/couponEdit',[$coupon->id])}}" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        {{ csrf_field() }}
                                                    <div class="modal-body">


                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nom de coupon</label>
                                                            <input value="{{$coupon->coupon_Name}}" type="text" class="form-control" name="name_C" aria-describedby="emailHelp">
                                                            <small id="emailHelp"  class="form-text text-muted btn-warning">Le nom de coupon doit etre unique</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">clé du coupon</label>
                                                            <input type="text" class="form-control" name="key_C" value="{{$coupon->coupon_Key}}" >
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="checkbox" name="checkValue" class="form-check-input" id="exampleCheck1" @if($coupon->coupon_value =='active') checked @endif>
                                                            <label class="form-check-label" for="exampleCheck1">Activer</label>
                                                        </div>
                                                        <br>





                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning">Save changes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="delete{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('dashboard/deleteCoupons',$coupon->id)}}" method="post" >
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger" role="alert">
                                                               Vous etes sûr de supprimer le coupon {{$coupon->coupon_Name}}
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>


        </div>
    </div>
    @include('sweetalert::alert')

@endsection
@section('scripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection

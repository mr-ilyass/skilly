@extends('profDashboard.layout')
@section('title')

    Episodes

@endsection
@section('style')
    <link rel="stylesheet" href="{{url('loginform/animate.css')}}">


@endsection
@section('content')


    <div class="container" style="">
        <div class="row justify-content-md-center">
            <div class="col col-lg-10">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <button type="button" class="btn btn-block btn-success btn-xs"  data-toggle="modal" data-target="#create">
                                Add Episode
                            </button>


                        </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>N Episode</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Video ID</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Eps as $ep)
                        <tr>

                            <td>{{$ep->N_Ep}}</td>
                            <td> {{  \Illuminate\Support\Str::limit($ep->ep_name, 25, $end='...') }}</td>
                            <td>{{  \Illuminate\Support\Str::limit($ep->ep_description, 25, $end='...') }}</td>
                            <td>
                                {{$ep->ep_video}}
                            </td>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$ep->id}}"><i class="fas fa-edit"></i></button></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$ep->id}}">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                            <div class="modal fade" id="delete{{$ep->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('prof/deleteEP',[$ep->id])}}" method="post" >
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="alert alert-danger" role="alert">
                                                    Vous etes sûr de supprimer l'episode : {{$ep->ep_name}}
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
                            <div class="modal fade" id="exampleModal{{$ep->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('prof/editEP',[$ep->id])}}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
                                            {{ csrf_field() }}
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Titre</label>
                                                    <input type="text" class="form-control" name="titre" aria-describedby="emailHelp"value="{{$ep->ep_name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Description</label>
{{--                                                    <input type="text" class="form-control" name="desc" value="{{$ep->ep_description}}">--}}
                                                    <textarea name="desc" cols="63" rows="3">{{$ep->ep_description}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Video ID</label>
                                                    <input type="text" class="form-control" name="video" value="{{$ep->ep_video}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Numero d'episode</label>
                                                    <input type="text" class="form-control" name="ep" value="{{$ep->N_Ep}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Save changes</button>
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
                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('prof/createEP',[$id])}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titre</label>
                                            <input type="text" class="form-control" name="titre" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="desc" cols="63" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Video ID</label>
                                            <input type="text" class="form-control" name="video" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Numero d'episode</label>
                                            <input type="text" class="form-control" name="ep">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

            </div>
        </div>
    </div>





@endsection
@section('scripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="{{ asset('js/popper.js.map') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

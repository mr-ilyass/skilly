@extends('dashboard.layout.master')
@section('title')

    {{trans('dashboardCategorie.title')}}

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
                                        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#createcategorie">
                                            {{trans('dashboardCategorie.add')}}</button>
                                        <div class="modal fade" id="createcategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('dashboard/catcreate')}}" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_method" value="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">








                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">{{trans('dashboardCategorie.nom')}}</label>
                                                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                                                                <small id="emailHelp"  class="form-text text-muted btn-warning">Le nom de catégorie doit etre unique</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">{{trans('dashboardCategorie.keywords')}}</label>
                                                                <input type="text" class="form-control" name="meta" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">{{trans('dashboardCategorie.description')}}</label>
                                                                <input type="text" class="form-control" name="metadesc">
                                                            </div>
                                                            <br>

                                                        <div class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="image" >
                                                                <label class="custom-file-label" for="customFileLang">Selectioner l'image</label>
                                                                <small id="emailHelp"  class="form-text text-muted btn-warning">Extension : JPEG, PNG, JPG, GIF,SVG , Taille max :2 mb</small>

                                                            </div>

                                                        </div>









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
                                        <th>{{trans('dashboardCategorie.nom')}}</th>
                                        <th>{{trans('dashboardCategorie.image')}}</th>
                                        <th>{{trans('dashboardCategorie.keywords')}}</th>
                                        <th>{{trans('dashboardCategorie.description')}}</th>
                                        <th>{{trans('dashboardCategorie.modifier')}}</th>
                                        <th>{{trans('dashboardCategorie.delete')}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><img src="{{ asset('storage/'.$category->image) }}" style="height: 50px; width: 90px ;" /></td>
                                        <td>{{$category->meta_keywords}}</td>
                                        <td>{{$category->meta_des}}</td>

                                        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$category->id}}"><i class="fas fa-edit"></i></button></td>
                                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$category->id}}"><i class="far fa-trash-alt"></i></button></td>


                                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('dashboard/catEdit',[$category->id])}}" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        {{ csrf_field() }}
                                                    <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">{{trans('dashboardCategorie.nom')}}</label>
                                                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp"value="{{$category->name}}">
                                                                <small id="emailHelp"  class="form-text text-muted btn-warning">Les cours du catégorie  {{$category->name}} seront transferer a la nouvelle catégorie</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">{{trans('dashboardCategorie.keywords')}}</label>
                                                                <input type="text" class="form-control" name="meta" value="{{$category->meta_keywords}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">{{trans('dashboardCategorie.description')}}</label>
                                                                <input type="text" class="form-control" name="metadesc" value="{{$category->meta_des}}">
                                                            </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="image" >
                                                            <label class="custom-file-label" for="customFileLang" >Selectioner l'image</label>
                                                            <small id="emailHelp"  class="form-text text-muted btn-warning">Extension : JPEG, PNG, JPG, GIF,SVG , Taille max :2 mb</small>

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

                                        <div class="modal fade" id="delete{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('dashboard/catdelete',[$category->id])}}" method="post" >
                                                        <input type="hidden" name="_method" value="PUT">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger" role="alert">
                                                               Vous etes sûr de supprimer la catégorie {{$category->name}}
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

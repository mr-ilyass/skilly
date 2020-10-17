@extends('profDashboard.layout')
@section('title')

Edit cours
@endsection
@section('style')
    <link rel="stylesheet" href="{{url('loginform/animate.css')}}">


@endsection
@section('content')

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
                    <div class="card-header" style="background: #EB5757;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #000000, #EB5757);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #000000, #EB5757); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */



">

                        <div class="col-11">
                            <h3 class="card-title" style="color: white"> Cours</h3>
                        </div>


                    </div>
                </div>
                <form action="{{route('prof/searchCourse')}}" method="post">
                    <input type="hidden" name="_method" value="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 offset-md-3 form">
                            <input type="search" name="search" class="form-control" @if(!empty($name)) value="{{$name}}" @endif placeholder="Search by name">

                        </div>
                        <input type="submit" class="btn btn-info" value="Search">
                        <a href="{{route('prof/editcourse')}}"  class="btn btn-warning" style="margin-left: 5px; background-color: #f5b971;">
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nom du cours</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Categorie</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Niveau</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">active</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">image</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Edit</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Gestion d'episode</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(empty($search))
                                        @foreach($courses as $course)
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">{{$course->id}}</td>
                                                <td>{{$course->name}}</td>
                                                <td>{{$course->categorie}}</td>
                                                <td>{{$course->level}}</td>

                                                <td>

                                                    @if($course->active)

                                                        <span class="badge badge-success">Activer</span>

                                                    @else

                                                        <span class="badge badge-danger">Desactiver</span>

                                                    @endif
                                                </td>
                                                <td><img src="{{ asset('storage/'.$course->image) }}" style="height: 50px; width: 90px ;" /></td>
                                                <td style="padding: 10px;">
                                                    <a href="{{route('prof/Editspecific',$course->id)}}"  class="btn  btn-warning">
                                                        <i class="fas fa-edit" ></i>
                                                    </a>
                                                </td>
                                                <td style="padding: 10px;">
                                                    <a href="{{route('prof/Episodes',[$course->id])}}"  class="btn  btn-success">
                                                        <i class="fas fa-play-circle" ></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$course->id}}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                                <div class="modal fade" id="delete{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{route('prof/deleteCourse',[$course->id])}}" method="post" >
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Vous etes sûr de supprimer le cours : {{$course->name}}
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
                                    @else
                                        @foreach($search as $course)
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">{{$course->id}}</td>
                                                <td>{{$course->name}}</td>
                                                <td>{{$course->id}}</td>
                                                <td>{{$course->level}}</td>
                                                <td>{{$course->active}}</td>
                                                <td><img src="{{ asset('storage/'.$course->image) }}" style="height: 50px; width: 90px ;" /></td>
                                                <td style="padding: 10px;">
                                                    <a href="{{route('prof/Editspecific',$course->id)}}"  class="btn  btn-warning">
                                                        <i class="fas fa-edit" ></i>
                                                    </a>
                                                </td>
                                                <td style="padding: 10px;">
                                                    <a href="{{route('prof/Episodes',[$course->id])}}"  class="btn  btn-success">
                                                        <i class="fas fa-play-circle" ></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$course->id}}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                                <div class="modal fade" id="delete{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{route('prof/deleteCourse',[$course->id])}}" method="post" >
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Vous etes sûr de supprimer le cours : {{$course->name}}
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

                                    @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-6 float-left">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                    @if(empty($search))
                                        Showing {{$courses->count()}} of {{$courses->total()	}} </div>
                                @else
                                    Showing {{$search->count()}} of {{$search->total()	}} </div>
                            @endif

                        </div>
                        <div class="col-md-6 float-right">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    @if(empty($search))
                                        {{$courses->links()}}
                                    @else
                                        {{$search->links()}}
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


@endsection
@section('scripts')

@endsection

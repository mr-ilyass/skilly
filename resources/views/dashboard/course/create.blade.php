@extends('dashboard.layout.master')
@section('title')

   Create Course

@endsection
@section('style')
    <link rel="stylesheet" href="{{url('loginform/animate.css')}}">


@endsection
@section('content')
{{--    @role('superadministrator')--}}
{{--    <p>This is visible to users with the admin role. Gets translated to--}}
{{--        \Laratrust::hasRole('admin')</p>--}}
{{--    @endrole--}}

<div class="container" style="">
    <div class="row justify-content-md-center">
        <div class="col col-lg-10">

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Create course</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" action="{{route('dashboard/SaveCourse')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nom du cours</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name')  ? old('name') : '' }}" placeholder="Enter ...">
                                    @if($errors->get('name'))
                                        <small id="emailHelp"  class="form-text text-muted btn-danger" >
                                        @foreach($errors->get('name') as $message)
                                            <li style="color: white;margin: 2px;">{{$message}}</li>
                                        @endforeach
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Meta keywords</label>
                                    <input type="text" class="form-control" name="keywords"  value="{{ old('keywords')  ? old('keywords') : '' }}" placeholder="Enter ..." >
                                    @if($errors->get('keywords'))
                                        <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                        @foreach($errors->get('keywords') as $message)
                                            <li style="color: white; margin: 2px;">{{$message}}</li>
                                        @endforeach
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Description du cours</label>
                                    <textarea class="form-control" rows="3" name="description" placeholder="Enter ...">{{ old('description') }}</textarea>
                                    @if($errors->get('description'))
                                        <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                            @foreach($errors->get('description') as $message)
                                                <li style="color: white; margin: 2px;">{{$message}}</li>
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea class="form-control" rows="3"  name="Metadescription"   placeholder="Enter ..." >{{ old('Metadescription') }}</textarea>
                                    @if($errors->get('Metadescription'))
                                        <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                            @foreach($errors->get('Metadescription') as $message)
                                                <li style="color: white; margin: 2px;">{{$message}}</li>
                                            @endforeach
                                        </small>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <!-- input states -->
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-video"></i> Video ID</label>
                            <input type="text" class="form-control " name="video"  value="{{ old('video')  ? old('video') : '' }}"  placeholder="Exemple : 58963245">
                            @if($errors->get('video'))
                                <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                    @foreach($errors->get('video') as $message)
                                        <li style="color: white; margin: 2px;">{{$message}}</li>
                                    @endforeach
                                </small>
                            @endif
                        </div>



                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-image"></i> Image du cours</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image"  value="{{ old('image')  ? old('image') : '' }}" >
                                <label class="custom-file-label" for="customFileLang">Selectioner l'image</label>
                                <small   class="form-text text-muted btn-warning">Extension : JPEG, PNG, JPG, GIF,SVG , Taille max :2 mb</small>
                                @if($errors->get('image'))
                                    <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                        @foreach($errors->get('image') as $message)
                                            <li style="color: white; margin: 2px;">{{$message}}</li>
                                        @endforeach
                                    </small>
                                @endif
                            </div>
                        </div>









                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">



                                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-level-up-alt"></i> Niveau</label>

                                    <select class="form-control" name="niveau">
                                        <option disabled selected> Choisi un niveau</option>
                                        <option value="debutant">Débutant</option>
                                        <option value="intermediaire">Intermediaire</option>
                                        <option value="avance">Avancé</option>
                                    </select>
                                    @if($errors->get('niveau'))
                                        <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                            @foreach($errors->get('niveau') as $message)
                                                <li style="color: white; margin: 2px;">{{$message}}</li>
                                            @endforeach
                                        </small>
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- radio -->
                                <label class="col-form-label" for="inputSuccess"><i class="fas fa-bookmark"></i> Catégorie</label>

                                <div class="form-group">
                                    <select class="form-control is-warning" name="categorie">
                                        <option  disabled selected>Choisi une catégorie</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->get('categorie'))
                                        <small id="emailHelp"  class="form-text text-muted btn-danger" >

                                            @foreach($errors->get('categorie') as $message)
                                                <li style="color: white; margin: 2px;">{{$message}}</li>
                                            @endforeach
                                        </small>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <br><br>

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Select multiple-->
                                <div class="form-group" >
                                    <div  style="  border: 1px dotted #00c054; padding: 2px;">


                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="activer">
                                        <label class="form-check-label">Activer le Cours</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                </div>

                            </div>
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <button type="submit" class="btn btn-primary" >Enregistrer et passer</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>





        </div>
    </div>
</div>
<div>










@include('sweetalert::alert')

@endsection
@section('scripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection

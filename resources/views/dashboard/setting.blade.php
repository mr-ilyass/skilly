@extends('dashboard.layout.master')
@section('title')

Parametre

@endsection
@section('style')


@endsection
@section('content')
    <div class="container" style="">
        <div class="row justify-content-md-center">
            <div class="col col-lg-6" style="text-align: center;">
                <div class="card">

            <div class="card-body login-card-body">
                <p class="login-box-msg">Modifier vos informations</p>

                <form action="{{route('dashboard/changeData')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur : required| min:8| max:50" value="{{Auth::user()->name}}">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <br>

                    </div>


                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="newpass" placeholder="Nouveau mot de passe : required| min:8| max:50">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confNewpass" placeholder="Confirm le Nouveau mot de passe">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Confirmer</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
    </div>
@endsection
@section('scripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection

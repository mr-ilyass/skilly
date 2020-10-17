@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                    <h3>{{trans('home.welcome')}}</h3>
                    You are logged in!
                        <form action="{{ route('store') }}" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input type="email" name="user_email" id="exampleInputEmail" class="form-control">
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <ul>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div style="width: 50% ; align-content: center">
                            <video-player :video="306757638" next-video-url=""></video-player>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

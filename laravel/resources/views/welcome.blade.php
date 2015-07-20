@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')
    <div class="container">
        @if(Auth::check())
            <h1>Welcome Aboard</h1>
            <a href="{{ route('messages')}} " class="btn btn-primary btn-lg btn-block">Messages</a>

        @else
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <a href="{{ route('auth::socialLogin', ['provider' => 'facebook']) }}" class="btn btn-primary btn-lg btn-block">Facebook</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('auth::socialLogin', ['provider' => 'twitter']) }}" class="btn btn-primary btn-lg btn-block">Twitter</a>
                                </div>
                            </div>
                            <form action="{{ route('auth::postLogin') }}" method="post" accept-charset="utf-8">
                                @if (count($errors))
                                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                                @endif

                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control input-lg" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
                                </div>
                                <div class="checkbox clearfix">
                                    <label for="remember" class="pull-left">
                                        <input type="checkbox" name="remember" id="remember" value="checked"> Remember me
                                    </label>
                                    <label class="pull-right"><a href="{{ route('auth::getPasswordEmail') }}" title="Forgot Password">Forgot Password</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">LogIn</button>
                            </form><br/>
                            <div><a href="{{ route('auth::getSignup') }}">Create an account</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

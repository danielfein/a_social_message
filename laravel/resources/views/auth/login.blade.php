@extends('layouts.master')

@section('title', trans('auth.login'))
@section('css', elixir('css/login.css'))
@section('js', elixir('js/login.js'))

@section('content')
    <div class="container login">
        <div class="text-center heading">
            <h1>Log in and get to work</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('auth::postLogin') }}" method="post">
                    <div class="panel panel-default center-block animated fadeInDown">
                        <div class="panel-body">
                            @if (count($errors))
                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                            @endif
                            
                            {!! csrf_field() !!}

                            <div class="form-group">
                                {{-- <label for="email">{{ trans('auth.email') }}</label> --}}
                                <input type="text" name="email" id="email" class="form-control input-lg" value="{{ old('email') }}" placeholder="{{ trans('auth.email') }}">
                            </div>
                            <div class="form-group">
                                {{--<label for="password">{{ trans('auth.password') }}</label> --}}
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="{{ trans('auth.password') }}">
                            </div>
                            <div class="checkbox clearfix">
                                <label for="remember" class="pull-left">
                                    <input type="checkbox" name="remember" id="remember" value="checked"> {{ trans('auth.remember') }}
                                </label>
                                <label class="pull-right"><a href="{{ route('auth::getPasswordEmail') }}" title="{{ trans('auth.forgot_password') }}">{{ trans('auth.forgot_password') }}</a></label>                
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">{{ trans('auth.login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@endsection
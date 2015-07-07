@extends('layouts.master')

@section('css', elixir('css/signup.css'))

@section('content')
    <div class="container signup">
        <div class="text-center heading">
            <h1>Signup</h1>                
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('auth::postSignup') }}" method="post">
                    <div class="panel panel-default signup center-block animated fadeInDown">
                        <div class="panel-body">
                            @if (count($errors))
                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                            @endif
                            
                            {!! csrf_field() !!}                            

                            <div class="form-group">
                                <label for="email">Full name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>                
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="passwordConfirmation" class="form-control">
                            </div>                            
                        </div>
                    </div>                                
                    <div class="text-center"><button type="submit" class="btn btn-primary btn-lg">Signup</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection
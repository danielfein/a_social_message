@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')

        @if(Auth::check())
<div>

          {{!! Form::open() !!}}
              {{!! Form::text('message', "Enter your message here:") !!}}
{{!! Form::submit('Click Me!') !! }}
          {{!! Form::close() !!}}
        @endif
</div>
@endsection

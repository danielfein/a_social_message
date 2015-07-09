@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')

        @if(Auth::check())
<div>

          {{!! Form::open()}}
              {{!! Form::label('message', "Message:")}}
          {{!! Form::close()}}
        @endif
</div>
@endsection

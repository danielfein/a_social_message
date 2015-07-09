@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')

        @if(Auth::check())
<div>

          {{!! Form::open() !!}}
              {{!! Form::label('message', "Message:")}}
              echo Form::label('email', 'E-Mail Address');
          {{!! Form::close() !!}}
        @endif
</div>
@endsection

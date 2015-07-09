@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')

        @if(Auth::check())


        {{ Form::open()}}
            {{Form::label('message', "Message:")}}
        {{ Form::close()}}
        @else

@endsection

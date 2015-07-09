@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')

        @if(Auth::check())
<div>
RECEIVED
    {{ name }}
</div>
@endsection

@extends('layouts.master')

@section('css', elixir('css/login.css'))

@section('content')

        @if(Auth::check())
<div>
RECEIVED
          {!! Form::open(array('action' => 'MessagesController@receiveForm')) !!}
              {!! Form::text('message', "Enter your message here:") !!}
              {!! Form::submit('Click Me!') !!}
          {!! Form::close() !!}
        @endif
</div>
@endsection

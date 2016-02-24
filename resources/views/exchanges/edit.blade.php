@extends('layouts.main')

@section('content')

<h1>Edit an Exchange: {!! $exchange->name !!}</h1>

{!! Form::model( $exchange, ['method' => 'PATCH', 'action' => [ 'exchangesController@update', $exchange->id ]]) !!}

	@include('exchanges.form', ['submitButtonText' => 'Edit a Exchange'])

{!! Form::close() !!}

@stop
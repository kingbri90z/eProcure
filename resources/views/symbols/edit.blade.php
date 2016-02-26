@extends('layouts.main')

@section('content')

<h1>Edit a Symbol: {!! $symbol->name !!}</h1>

{!! Form::model( $symbol, ['method' => 'PATCH', 'action' => [ 'symbolsController@update', $symbol->id ]]) !!}

	@include('symbols.form', ['submitButtonText' => 'Edit a Symbol'])

{!! Form::close() !!}

@stop
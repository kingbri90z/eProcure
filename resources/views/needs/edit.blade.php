@extends('layouts.main')

@section('content')

<h1>Edit a Rep: {!! $rep->name !!}</h1>

{!! Form::model( $rep, ['method' => 'PATCH', 'action' => [ 'repsController@update', $rep->id ]]) !!}

	@include('reps.form', ['submitButtonText' => 'Edit a Rep'])

{!! Form::close() !!}

@stop
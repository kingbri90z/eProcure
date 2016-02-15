@extends('layouts.main')


@section('content')

<h1>Add a new rep</h1>

<hr>

{!! Form::open(array('url' => 'reps')) !!}

	@include('reps.form', ['submitButtonText' => 'Add a Rep'])

{!! Form::close() !!}

@include('errors.errors')

@stop
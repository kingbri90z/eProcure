@extends('layouts.main')


@section('content')

<h1>Add a new exchange</h1>

<hr>

{!! Form::open(array('url' => 'exchanges')) !!}

	@include('exchanges.form', ['submitButtonText' => 'Add a Rep'])

{!! Form::close() !!}

@include('errors.errors')

@stop
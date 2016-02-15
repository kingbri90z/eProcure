@extends('layouts.main')


@section('content')

<h1>Add a new need</h1>

<hr>

{!! Form::open(array('url' => 'needs')) !!}

	@include('notes.form', ['submitButtonText' => 'Add a Need'])

{!! Form::close() !!}

@include('errors.errors')

@stop
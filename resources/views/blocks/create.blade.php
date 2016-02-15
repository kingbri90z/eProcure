@extends('layouts.main')


@section('content')

<h1>Add a new block</h1>

<hr>

{!! Form::open(array('url' => 'blocks')) !!}

	@include('blocks.form', ['submitButtonText' => 'Add a Block'])

{!! Form::close() !!}

@include('errors.errors')

@stop
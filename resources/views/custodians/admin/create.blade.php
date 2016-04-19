@extends('layouts.main')


@section('content')

<h1>Add a new custodian</h1>

<hr>

{!! Form::open(array('url' => '/admin/custodians')) !!}

	@include('custodians.form', ['submitButtonText' => 'Add a Custodian'])

{!! Form::close() !!}

@include('errors.errors')

@stop
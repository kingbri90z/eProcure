@extends('layouts.main')

@section('content')

<h1>Edit a Custodians: {!! $custodian->name !!}</h1>

{!! Form::model( $custodian, ['method' => 'PATCH', 'action' => [ 'custodiansController@update', $custodian->id ]]) !!}

	@include('custodians.form', ['submitButtonText' => 'Edit a Custodian'])

{!! Form::close() !!}

@stop
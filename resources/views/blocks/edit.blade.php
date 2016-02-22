@extends('layouts.main')

@section('content')

<h1>Edit a Block: {!! $block->name !!}</h1>

{!! Form::model( $block, ['method' => 'PATCH', 'action' => [ 'blocksController@update', $block->id ]]) !!}

	@include('blocks.form', ['submitButtonText' => 'Edit a Block'])

{!! Form::close() !!}

@stop
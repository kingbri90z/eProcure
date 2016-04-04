@extends('layouts.main')

@section('content')


<div class="col-sm-6 col-md-5 col-md-offset-4">
<h3>Edit a Block: {!! $block->name !!}</h3></br>
{!! Form::model( $block, ['method' => 'PATCH', 'action' => [ 'blocksController@update', $block->id ]]) !!}

	@include('blocks.form', ['submitButtonText' => 'Edit a Block'])

{!! Form::close() !!}
</div>
@stop
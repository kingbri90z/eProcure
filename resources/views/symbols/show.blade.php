@extends('layouts.main')

@section('content')

<h1>Symbols Admin</h1>

<div class="list-group">

	@foreach ($symbols as $symbol)

  		{{$symbol->name}}

	@endforeach

</div>

@stop
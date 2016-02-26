@extends('layouts.main')

@section('content')

<h1>Symbols Admin</h1>

<div class="list-group">

	@foreach ($symbols as $symbol)

  		<a href="/admin/symbols/{{$symbol->id}}/edit" class="list-group-item">{{$symbol->name}}</a>

	@endforeach

</div>

@stop
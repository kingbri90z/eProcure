@extends('layouts.main')

@section('content')

<h1>Exchanges Admin</h1>

<div class="list-group">

	@foreach ($exchanges as $exchange)

  		<a href="/exchanges/{{$exchange->id}}/edit" class="list-group-item">{{$exchange->name}}</a>

	@endforeach

</div>

@stop
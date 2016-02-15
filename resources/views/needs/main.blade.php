@extends('layouts.main')

@section('content')

<h1>Notes Admin</h1>

<div class="list-group">

	@foreach ($notes as $note)

  		<a href="/exchanges/{{$note->id}}/edit" class="list-group-item">{{$need->name}}</a>

	@endforeach

</div>

@stop
@extends('layouts.main')

@section('content')

<h1>Rep Admin</h1>

<div class="list-group">

	@foreach ($reps as $rep)

  		<a href="/reps/{{$rep->id}}/edit" class="list-group-item">{{$rep->name}}</a>

	@endforeach

</div>

@stop
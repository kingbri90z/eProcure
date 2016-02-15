@extends('layouts.main')

@section('content')

<h1>Reps Admin</h1>

<div class="list-group">

	@foreach ($reps as $rep)

  		{{$rep->name}}

	@endforeach

</div>

@stop
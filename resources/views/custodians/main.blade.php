@extends('layouts.main')

@section('content')

<h1>Custodians Admin</h1>

<div class="list-group">

	@foreach ($custodians as $custodian)

  		<a href="/custodians/{{$custodian->id}}/edit" class="list-group-item">{{$custodian->name}}</a>

	@endforeach

</div>

@stop
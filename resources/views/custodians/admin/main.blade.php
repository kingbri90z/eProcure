@extends('layouts.main')

@section('content')

<h1>Custodian Admin</h1>

<div class="list-group">

	@foreach ($custodians as $custodian)

  		<a href="/admin/custodians/{{$custodian->id}}/edit" class="list-group-item glyphicon glyphicon-edit"> {{$custodian->name}}</a>

	@endforeach

</div>

@stop
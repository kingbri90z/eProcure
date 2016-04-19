@extends('layouts.main')

@section('content')

<h1>Custodian Admin <a href="/admin/custodians/create" class="btn btn-success"> + </a></h1>

<div class="list-group">

	@foreach ($custodians as $custodian)

  		<a href="/admin/custodians/{{$custodian->id}}/edit" class="list-group-item"> {{$custodian->name}}</a>

	@endforeach

</div>

@stop
@extends('layouts.main')

@section('content')

<h1>Custodians Admin</h1>

<div class="list-group">

	@foreach ($custodians as $custodian)

  		<b class="list-group-item">{{$custodian->name}}</b>

	@endforeach

</div>

@stop
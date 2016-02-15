@extends('layouts.main')

@section('content')

<h1>Custodians Admin</h1>

<div class="list-group">

	@foreach ($custodians as $custodian)

  		{{$user->name}}

	@endforeach

</div>

@stop
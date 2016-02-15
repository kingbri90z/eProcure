@extends('layouts.main')

@section('content')

<h1>Users Admin</h1>

<div class="list-group">

	@foreach ($users as $user)

  		<a href="/admin/users/{{$user->id}}" class="list-group-item">{{$user->first_name}} {{$user->last_name}}</a>

	@endforeach

</div>

@stop
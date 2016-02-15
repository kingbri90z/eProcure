@extends('layouts.main')

@section('content')

<h1>Users Admin</h1>

<div class="list-group">

	@foreach ($users as $user)

  		<a href="/admin/users/{{$user->id}}/edit" class="list-group-item">{{$user->first_name}} {{$user->last_name}}</a>

	@endforeach
	<a href="/admin/users/create" class="list-group-item">Create a New User</a>
</div>

@stop
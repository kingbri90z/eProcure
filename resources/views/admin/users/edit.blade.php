@extends('layouts.main')

@section('content')

<h1>Edit {{$user->first_name}} Role</h1>

<hr>

{!! Form::model( $user, ['method' => 'PATCH', 'action' => [ 'AdminUserController@update', $user->id ]]) !!}

	@include('admin.users.form', ['submitButtonText' => 'Submit'])

{!! Form::close() !!}

@include('errors.errors')

@stop
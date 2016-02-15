@extends('layouts.main')

@section('content')

<h1>Add a new User</h1>

<hr>

{!! Form::open(array('url' => 'admin/users')) !!}

<div class="form-group">
	{!! Form::label('first_name', 'First Name: ') !!}
	{!! Form::text('first_name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('last_name', 'Last Name: ') !!}
	{!! Form::text('last_name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email Address: ') !!}
	{!! Form::text('email', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'Password: ') !!}
	{!! Form::text('password', null, array('class' => 'form-control')) !!}
</div>

{!! Form::submit('Add User', array('class' => 'btn btn-default')) !!}

{!! Form::close() !!}

@include('errors.errors')

@stop
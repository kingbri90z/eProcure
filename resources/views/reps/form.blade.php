<div class="form-group">
	{!! Form::label('name', 'Rep Name: ') !!}
	{!! Form::text('name', null, array('class' => 'form-control')) !!}
</div>

{!! Form::submit($submitButtonText, array('class' => 'btn btn-default')) !!}
<div class="form-group">
	{!! Form::label('first_name', 'First Name: ') !!}</br>
	{!!$user->first_name!!}
</div>

<div class="form-group">
	{!! Form::label('last_name', 'Last Name: ') !!}</br>
	{!!$user->last_name!!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email Address: ') !!}</br>
	{!!$user->email!!}
</div>

<div class="form-group">
	{!! Form::label('role', 'Role:') !!}
	<select class="form-control" name="role">
      <option value="A">Administrator</option>
      <option value="N">Normal</option>
    </select>
</div>

{!! Form::submit($submitButtonText, array('class' => 'btn btn-default')) !!}
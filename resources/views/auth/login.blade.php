@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! csrf_field() !!}
					<div class="form-group">
                       <div class="col-lg-4 col-lg-offset-4">
                         <a href="{!!URL::to('google/authorize')!!}" class="btn btn-block btn-lg btn-social btn-google">
                            <span class="fa fa-google"></span> Google Sign In
                          </a>
                         </div>
                     </div><br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@layout('templates.main')
@section('content')
<div class="span4 offset4 well">
{{ Form::open('login')  }}
	@if (Session::has('login_errors'))
		{{ Alert::error("Username or password incorrect.")  }}
	@endif
	<p>{{ Form::label('username', 'Username')  }}</p>
	<p>{{ Form::text('username')  }}</p>

	<p>{{ Form::label('password', 'Password') }}</p>
	<p>{{ Form::password('password') }}</p>

	<p>{{ Form::submit('Login', array('class'=>'btn-large')) }}</p>
{{ Form::close()  }}
</div>
@endsection

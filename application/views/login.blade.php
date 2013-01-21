@layout('templates.login')

@section('navbar-login')
<div class="row">
    <div class="span5 offset5">
        <a href="/">
            {{ HTML::image('img/hvlogo.jpg', 'HomeVote'); }}
        </a>
    </div>
</div>
@endsection

@section('content')
@if (Session::get('login_error'))
<div class="row">
    <div class="span5 offset4 alert alert-error" id="login-error">
        {{ Session::get('login_error'); }}
    </div>
</div>
@endif
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
{{ HTML::link('signup', 'Sign Up') }}<br />
{{ HTML::link('resetpwd', 'Forgot Password?') }}
</div>
@endsection

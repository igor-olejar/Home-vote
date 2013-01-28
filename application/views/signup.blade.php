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
@if (Session::get('user_exists'))
<div class="row">
    <div class="span5 offset4 alert alert-error" id="login-error">
        {{ Session::get('user_exists'); }}
    </div>
</div>
@endif
<div class="span4 offset4 well">
{{ Form::open('signup')  }}
	@if (Session::has('validation_errors'))
		{{ Alert::error("Invalid username or email address.")  }}
	@endif
	<p>{{ Form::label('username', 'Username')  }}</p>
	<p>{{ Form::text('username')  }}</p>

	<p>{{ Form::label('email', 'Email address') }}</p>
	<p>{{ Form::text('email') }}</p>

	<p>{{ Form::submit('Sign Up', array('class'=>'btn-large')) }}</p>
{{ Form::close()  }}
</div>
@endsection

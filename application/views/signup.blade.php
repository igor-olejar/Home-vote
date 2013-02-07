@layout('templates.login')

@section('content')
@if (Session::get('user_exists'))
<div class="row">
    <div class="span5 offset4 alert alert-error" id="login-error">
        {{ Session::get('user_exists'); }}
    </div>
</div>
@endif
<div class="span4 offset4" id="login-container">
    <div class="login-black-box">New User</div>
    <div id="login-form-container">
        {{ Form::open('signup')  }}
                @if (Session::has('validation_errors'))
                        {{ Alert::error("Invalid username or email address.")  }}
                @endif
                <p>{{ Form::text('username', 'Username')  }}</p>

                <p>{{ Form::text('email', 'Email address') }}</p>

                <p>{{ Form::submit('Sign Up', array('class'=>'btn-large')) }}</p>
        {{ Form::close()  }}
    </div>
</div>
@endsection

@layout('templates.login')

@section('content')
@if (Session::get('login_error'))
<div class="row">
    <div class="span5 offset4 alert alert-error" id="login-error">
        {{ Session::get('login_error'); }}
    </div>
</div>
@endif
<div class="span4 offset4" id="login-container">
    <div class="login-black-box">Returning User</div>
    <div id="login-form-container">
        {{ Form::open('login')  }}
                @if (Session::has('login_errors'))
                        {{ Alert::error("Username or password incorrect.")  }}
                @endif
                <p>{{ Form::text('username', 'Username')  }}</p>

                <p>{{ Form::password('password') }}</p>

                <p>{{ Form::submit('Login', array('class'=>'btn-large')) }}</p>
        {{ Form::close()  }}
        <input type="checkbox" name="remember_me" value="1" checked="checked" id="remember-checkbox" /> <span>Remember my details</span><br />
        <br /><br />
        <div style="float:left">{{ HTML::link('resetpwd', 'Forgotten Password?') }}</div>
        <div style="float:right">{{ HTML::link('signup', 'Sign Up New User') }}</div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

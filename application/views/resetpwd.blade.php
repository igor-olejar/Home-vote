@layout('templates.login')

@section('content')
@if (Session::get('no_user'))
<div class="row">
    <div class="span5 offset4 alert alert-error" id="login-error">
        {{ Session::get('no_user'); }}
    </div>
</div>
@endif
<div class="span4 offset4" id="login-container">
@if ($msg != "")
    {{ $msg }}
@else
    <div class="login-black-box">Forgotten Password?</div>
    <div id="login-form-container">
    {{ Form::open('resetpwd')  }}
            @if (Session::has('validation_errors'))
                    {{ Alert::error("Invalid email address.")  }}
            @endif

            <p>{{ Form::label('email', 'Enter your email address and new password will be sent to you.') }}</p>
            <p>{{ Form::text('email', 'example@example.com') }}</p>

            <p>{{ Form::submit('Reset Password', array('class'=>'btn-large')) }}</p>
    {{ Form::close()  }}
    </div>
@endif
</div>
@endsection

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
@if (Session::get('no_user'))
<div class="row">
    <div class="span5 offset4 alert alert-error" id="login-error">
        {{ Session::get('no_user'); }}
    </div>
</div>
@endif
<div class="span4 offset4 well">
@if ($msg != "")
    {{ $msg }}
@else
    {{ Form::open('resetpwd')  }}
            @if (Session::has('validation_errors'))
                    {{ Alert::error("Invalid email address.")  }}
            @endif

            <p>{{ Form::label('email', 'Enter your email address') }}</p>
            <p>{{ Form::text('email') }}</p>

            <p>{{ Form::submit('Reset Password', array('class'=>'btn-large')) }}</p>
    {{ Form::close()  }}
@endif
</div>
@endsection

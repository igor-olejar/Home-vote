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
<div class="span4 offset4 well">
Thank you. A message was sent to you email address with the instructions on how to reset your password.
</div>
@endsection

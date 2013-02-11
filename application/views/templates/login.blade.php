<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Homevote - {{ $community_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ Asset::container('bootstrapper')->styles(); }}
    <?php echo HTML::style('css/custom.css'); ?>
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    {{ Asset::container('bootstrapper')->scripts(); }}
</head>
<body class="cloud-body">    
    <div class="navbar-login">
        <div class="container">
            <div class="row">
                <div class="span4">
                <a href="/" class="btn-navbar">
                    Home<strong>Vote</strong>
                </a>
                </div>
                <div class="span2 offset6">
                    {{ $community_name }}
                </div>
            </div>
        </div>
    </div>
 
    <div class="container">
        @yield('content')
    </div><!--/container-->
 
    @include('templates.footer')
</body>
</html>

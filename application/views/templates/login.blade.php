<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Homevote</title>
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
<body style="padding-top: 0;">    
    <div class="navbar-login">
        @yield('navbar-login')
    </div>
 
    <div class="container">
          <div class="row">
          @yield('content')
          </div>
    </div><!--/container-->
 
    <div class="container">
        <footer>
            HoveVote project &copy; 2013
        </footer>
      </div>
</body>
</html>

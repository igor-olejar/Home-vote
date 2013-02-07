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
<body>
     <div class="navbar navbar-fixed-top" style="margin-bottom: 0;">
         <div class="navbar-inner" id="main-navbar">
             <div class="container">
                 <div class="span8 first">
                     <strong>Community Name</strong>
                 </div>
                 <div class="span1">
                     Community
                 </div>
                 <div class="span1">
                     My Activity
                 </div>
                 <div class="span1">
                     Edit profile
                 </div>
                 <div class="span1">
                    {{ HTML::link('logout', 'Log Out') }}
                 </div>
             </div>
         </div>
    </div>
    
    <div id="subnav" class="clearfix">
        <div class="container">
            <div class="span2 first" id="large-avatar">
                {{ HTML::image('img/user_dashboard/default_image.jpg', 'User Name', array('id'=>'large-avatar-img')) }}
            </div>
            <div class="span9" style="padding-top: 8px;">
                <h1>Hello User Name.</h1>
                <h4>You have <a href="#" class="blue-accent">1</a> new message(s).</h4>
                <h4>
                    There have been <a href="#" class="blue-accent" >3</a> new voting topic(s) and 
                    <a href="#" class="blue-accent">1</a> new discussion topic(s) since your last visit.
                </h4>
            </div>
            <div class="span1">
                arrow
            </div>
        </div>
    </div>
    
 
    @yield('content')
 

    @include('templates.footer')
</body>
</html>

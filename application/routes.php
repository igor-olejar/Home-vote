<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

//Route::get('/', array('before'=>'auth'), function()
Route::get('/', function()
{
	//return View::make('user.dashboard');
        return Redirect::to('user/dashboard');
});

/* LOGIN ROUTE */
Route::get('login', function()
{
    //get the community name
    $community = Community::find(1);
    return View::make('login')->with('community_name', $community->community_name);
});

Route::post('login', function()
{
    $credentials = array(
        'username'   =>  Input::get('username'),
        'password'  =>  Input::get('password')
    );
    
    //get the community name
    $community = Community::find(1);
    
    if (Auth::attempt($credentials)) {
        //save user to Session
        Session::put('user', Auth::user());
        Session::put('community', $community);
        return Redirect::to('user/dashboard');
    } else {
        Session::flash('login_error', 'The username and password provided do not match, or you have not yet been approved by the administrator. Try again.');
        return View::make('login')->with('community_name', $community->community_name);
    }
    
});
/*********************************/

/*SIGN UP ROUTE */
Route::get('signup', function(){
    //get the community name
    $community = Community::find(1);
    return View::make('signup')->with('community_name', $community->community_name);
});

Route::post('signup', function(){
    $input = Input::all();
    
    //check if user already exists
    $user_check = User::where('email','=',$input['email'])->first();
    
    /***************************/
    //get the community name
    $community = Community::find(1);
    if (!$user_check) {
        $rules = array(
            'username'  => 'required',
            'email'     =>  'required|email'
        );
        
        $validation = Validator::make($input, $rules);
        
        if ($validation->fails()) {
            Session::flash('validation_errors', $validation->errors);
            return View::make('signup');
        } else {
            $user = new User();
            $user->email = $input['email'];
            $user->username = $input['username'];
            $user->password = Hash::make('sdlD3%!!asdflkj32rdsfjSAD£');
            $user->name = "";
            $user->group = 3;
            $user->save();
            return View::make('signup_ok')->with('community_name', $community->community_name);
        }
    } else {
        Session::flash('user_exists', 'The given email address already exists in the database');
        return View::make('signup')->with('community_name', $community->community_name);
    }
});
/*********************************/

/*RESET PASSWORD ROUTES */
Route::get('resetpwd/(:any?)', function($token = FALSE){
    $msg = "";
    
    if ($token) {
        $new_pwd = Customfunctions::resetPwd($token);
        mail($new_pwd['email'], 'New password', 'Your new password is:<br />' . $new_pwd['pwd']);
        $msg = "Your new password has been emailed to you.";
    }
    
    //get the community name
    $community = Community::find(1);
    
    //Customfunctions::resetAdminPwd();
    return View::make('resetpwd')
            ->with('msg', $msg)
            ->with('community_name', $community->community_name);
});

Route::post('resetpwd', function(){
    $input = Input::get('email');
    
    //check if such user exists
    $user_check = User::where('email','=',$input)->first();
    
    //get the community name
    $community = Community::find(1);
    if ($user_check) {
        $token = new Token();
        $token->value = Customfunctions::emailToken();
        $token->type = 'email';
        $token->user_id = $user_check->attributes['id'];
        $token->used = 0;
        $token->save();
        
        //email the info
        /* @todo figure out how to get the Messages bundle */
        $message = URL::current() . '/token/' . $token->value;
        mail($input, 'Reset password', 'Click here to reset password:<br />$message');
        
        
        return View::make('resetpwd_ok')->with('community_name', $community->community_name);
    } else {
        Session::flash('no_user', 'The given email address does not match any user on our records.');
        return View::make('resetpwd')->with('community_name', $community->community_name);
    }
});
/*********************************/

/* LOGOUT ROUTE */
Route::get('logout', function(){
    Session::forget('user');
    Session::forget('community');
    Auth::logout();
    
    //get the community name
    $community = Community::find(1);
    return Redirect::to('login')->with('community_name', $community->community_name);
});
/*********************************/

/* USER ROUTES */
Route::get('user/dashboard', function()
{
    var_dump(Session::get('user'));die();
    //start the admin bundle if the user is in the admin group
    if (Session::get('user')->group == 1) {
        Bundle::start('admin');
    }
    
    return View::make('user.dashboard');
});

//Route::get('community/overview', array('before'=>'auth'), function(){
Route::get('community/overview', function(){
    return View::make('user.community_overview');
});
/*********************************/

//Route::controller(Controller::detect());

/* ADMIN CONTROLLERS */
//Route::controller('admin::test');
//Route::get('admin/test', 'admin::test@index');
//
//Route::get('admin/overview', function(){
//    //check if user is admin
//    if (Auth::user()->group == 1) {
//        $community = Community::find(1);
//        return View::make('admin::overview')->with('community', $community);
//    } else {
//        return Redirect::to('user/dashboard');
//    }
//});
/*********************************/

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) {
          return Redirect::to('login');  
        }
});
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

Route::get('/', array('before'=>'auth'),function()
{
	//return View::make('user.dashboard');
        return Redirect::to('user/dashboard');
});

/* LOGIN ROUTE */
Route::get('login', function()
{
    return View::make('login');
});

Route::post('login', function()
{
    $credentials = array(
       'username'   =>  Input::get('username'),
        'password'  =>  Input::get('password')
    );
    
    if (Auth::attempt($credentials)) {
        return Redirect::to('user/dashboard');
    } else {
        Session::flash('login_error', 'The username and password provided do not match. Try again.');
        return View::make('login');
    }
    
});

Route::get('signup', function(){
    return View::make('signup');
});

Route::post('signup', function(){
    $input = Input::all();
    //print_r($input);
    
    //check if user already exists
    $user_check = User::where('email','=',$input['email'])->first();
    
    /***************************/
    die('To do: add column "active" to user table. When signup submitted, save the info as "not active". Moderator will activate the user and automatically send the new password.');
    
    if (!$user_check) {
        $rules = array(
            'username'  => 'required',
            'email'     =>  'required|email'
        );
        
        $validation = Validator::make($input, $rules);
        
        if ($validation->fails()) {
            return $validation->errors();
        } else {
            return View::make('signup_ok');
        }
    } else {
        Session::flash('user_exists', 'The given email address already exists in the database');
        return View::make('signup');
    }
});

Route::get('resetpwd', function(){
    return Redirect::to('login');
});

/* LOGOUT ROUTE */
Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('login');
});

/* USER ROUTES */
Route::get('user/dashboard', function()
{
    return View::make('user.dashboard');
});

//Route::controller(Controller::detect());



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
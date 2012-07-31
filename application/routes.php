<?php
Bundle::start('basset');
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

Route::get('/', array('as' => 'root', function()
{
	return View::make('home.index');
}));

Route::get('get_involved', array('as' => 'involved', function() {
  return View::make('pages.involved');
}));

Route::get('about', array('as' => 'about', function() {
  return View::make('pages.about');
}));

Route::get('pictures', array('as' => 'pictures', function() {
  return View::make('pages.pictures');
}));

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
  
});

Route::filter('after', function($response)
{
	Event::listen('laravel.done', function() {
    $compiled_dir = Bundle::path('basset').'compiled';
    $uri = 'http://up.dev/basset';
    $assets = array('up.css', 'nivo.css', 'pg.css', 'jq.js', 'nivo.js', 'pg.js');
    foreach($assets as $asset) {
      $hash = md5('basset::'.$uri.'/'.$asset);
      if(!File::exists($compiled_dir.'/'.$hash)) {
        Basset::compile();
      }
    }
  });
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
/*
/--------------------------------------------------------------------
/ Basset Routes
/--------------------------------------------------------------------
*/

Basset::styles('up', function($basset) {
  $basset->add('application', 'application.css')
    ->add('main', 'main.css')
    ->add('mobile', 'mobile.css')
    ->compress();
});

Basset::styles('nivo', function($basset) {
  $basset->add('nivo-slider', 'nivo-slider.css')
    ->add('up-nivo', 'up-nivo.css')
    ->compress();
});

Basset::styles('pg', function($basset) {
  $basset->add('jphotogrid', 'jphotogrid.css')
    ->compress();
});

Basset::scripts('jq', function($basset) {
  $basset->add('jquery', 'jquery.js')
    ->compress();
});

Basset::scripts('pg', function($basset) {
  $basset->add('jphotogrid', 'jphotogrid.min.js')
    ->add('pgInit', 'pgInit.js')
    ->compress();
});

Basset::scripts('nivo', function($basset) {
  $basset->add('jquery.nivo', 'jquery.nivo.slider.pack.js')
    ->add('nivoInit', 'nivoInit.js')
    ->compress();
});
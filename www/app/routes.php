<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/dive', function(){

    $dive = new Develpr\Freediving\Dive;

    $diveSimulator = new Develpr\Freediving\DiveSimulator;

    var_dump($diveSimulator->getDiveData());

});


Route::post('/notify-me', function(){

	$mailchimp = new Mailchimp(Config::get('app.mailchimp.api'));

	$mailchimp->lists->subscribe(Config::get('app.mailchimp.notify_list_id'), Input::all(), Input::all());

	return Redirect::to('/')->with(array('success' => true));

});

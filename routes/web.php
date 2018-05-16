<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('writers',  ['uses' => 'WriterController@showAllWriters']);

    $router->get('writers/{id}', ['uses' => 'WriterController@showOneWriter']);

    $router->post('writers', ['uses' => 'WriterController@create']);

    $router->delete('writers/{id}', ['uses' => 'WriterController@delete']);

    $router->put('writers/{id}', ['uses' => 'WriterController@update']);
});
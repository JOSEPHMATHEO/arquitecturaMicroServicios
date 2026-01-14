<?php

/*
|--------------------------------------------------------------------------
| Application Routes cccc
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json(['message' => 'LumenLibrariesApi', 'status' => 'running']);
});

$router->get('/libraries', 'LibraryController@index');
$router->post('/libraries', 'LibraryController@store');
$router->get('/libraries/{library}', 'LibraryController@show');
$router->put('/libraries/{library}', 'LibraryController@update');
$router->patch('/libraries/{library}', 'LibraryController@update');
$router->delete('/libraries/{library}', 'LibraryController@destroy');

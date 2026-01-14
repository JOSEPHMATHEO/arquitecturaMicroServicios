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
    return response()->json([
        'message' => 'LumenGatewayApi', 
        'status' => 'running',
        'services' => [
            'authors' => 'http://localhost:8000/authors',
            'books' => 'http://localhost:8000/books',
            'libraries' => 'http://localhost:8000/libraries'
        ]
    ]);
});

    /**
     * Authors routes
     */
    $router->get('/authors', 'AuthorController@index');
    $router->post('/authors', 'AuthorController@store');
    $router->get('/authors/{author}', 'AuthorController@show');
    $router->put('/authors/{author}', 'AuthorController@update');
    $router->patch('/authors/{author}', 'AuthorController@update');
    $router->delete('/authors/{author}', 'AuthorController@destroy');

    /**
     * Books routes
     */
    $router->get('/books', 'BookController@index');
    $router->post('/books', 'BookController@store');
    $router->get('/books/{book}', 'BookController@show');
    $router->put('/books/{book}', 'BookController@update');
    $router->patch('/books/{book}', 'BookController@update');
    $router->delete('/books/{book}', 'BookController@destroy');

    /**
     * Libraries routes (forwarded to Libraries microservice)
     */
    $router->get('/libraries', 'LibraryController@index');
    $router->post('/libraries', 'LibraryController@store');
    $router->get('/libraries/{library}', 'LibraryController@show');
    $router->put('/libraries/{library}', 'LibraryController@update');
    $router->patch('/libraries/{library}', 'LibraryController@update');
    $router->delete('/libraries/{library}', 'LibraryController@destroy');

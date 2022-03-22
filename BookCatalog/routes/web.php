<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function () use ($router) {
//Find Authors
$router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
$router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);

//CRUD Authors
$router->put('authors/{id}', ['uses' => 'AuthorController@update']);
$router->post('authors', ['uses' => 'AuthorController@create']);
$router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

//Find books
$router->get('/books', ['uses' => 'AuthorController@showAllBooks']);
$router->get('/authors/{author_id}/books', ['uses' => 'AuthorController@showAllBooksFromAuthor']);
$router->get('/authors/{author_id}/books/{book_id}', ['uses' => 'AuthorController@showOneBook']);

//CRUD Books
$router->put('/authors/{author_id}/books/{book_id}', ['uses' => 'AuthorController@updateBook']);
$router->post('/authors/{author_id}/books', ['uses' => 'AuthorController@createBook']);
$router->delete('/authors/{author_id}/books/{book_id}', ['uses' => 'AuthorController@deleteBook']);

// //Find Comments
// $router->get('comments',  ['uses' => 'CommentController@showAllAuthors']);
// $router->get('/books/{book_id}/comments', ['uses' => 'CommentController@showOneAuthor']);

// //CRUD Comments
// $router->put('comments/{id}', ['uses' => 'CommentController@update']);
// $router->post('comments', ['uses' => 'CommentController@create']);
// $router->delete('comments/{id}', ['uses' => 'CommentController@delete']);


});
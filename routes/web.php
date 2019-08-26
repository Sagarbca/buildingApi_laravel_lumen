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

$router->group(['prefix' => 'api/v1'],function($router) {


    $router->group(['prefix' => 'posts'], function ($router) {


        $router->group(['middleware' => 'auth'], function ($router) {

            $router->post('/add', 'PostsController@createPost');
            $router->put('/edit/{id}', 'PostsController@updatePost');

            $router->get('/view/{id}', 'PostsController@viewPost');

            $router->delete('/delete/{id}', 'PostsController@deletePost');

            $router->get('/index', 'PostsController@index');
        });


    });

//users
    $router->group(['prefix' => 'users'], function ($router) {
        $router->post('/add', 'UsersController@add');

        $router->put('/edit/{id}', 'UsersController@updateUser');

        $router->get('/view/{id}', 'UsersController@viewUser');

        $router->delete('/delete/{id}', 'UsersController@deleteUser');

        $router->get('/index', 'UsersController@index');

    });

//MEDICINES
    $router->group(['prefix' => 'medicine'], function ($router) {
        $router->post('/add', 'MedicineController@add');
        $router->put('/edit/{id}', 'MedicineController@updateUser');
        $router->get('/view/{id}', 'MedicineController@viewUser');
        $router->delete('/delete/{id}', 'MedicineController@deleteUser');
        $router->get('/index', 'MedicineController@index');

    });

});

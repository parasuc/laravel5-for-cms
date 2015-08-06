<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'auth' ], function()
{
	Route::get('/', 'IndexController@index');
    Route::get('home', 'HomeController@index');
	//Route::resource('base','BaseController',['except' => 'show']);
	
    Route::resource('articles', 'ArticlesController', [
        'except' => 'show',
        'names' => [
            'index' => 'articles.index',
            'create' => 'articles.create',
            'store' => 'articles.store',
            'show' => 'articles.show',
            'update' => 'articles.update',
            'edit' => 'articles.edit',
            'destroy' => 'articles.destroy',
        ]
    ]);
    Route::resource('users', 'UsersController', [
            'except' => 'show',
            'names' => [
                'index' => 'users.index',
                'create' => 'users.create',
                'store' => 'users.store',
                'show' => 'users.show',
                'update' => 'users.update',
                'edit' => 'users.edit',
                'destroy' => 'users.destroy',
            ]
        ]);
    Route::resource('categories', 'CategoriesController', [
        'except' => 'show',
        'names' => [
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'show' => 'categories.show',
            'update' => 'categories.update',
            'edit' => 'categories.edit',
            'destroy' => 'categories.destroy',
        ]
    ]);
    Route::resource('roles', 'RolesController', [
        'except' => 'show',
        'names' => [
            'index' => 'roles.index',
            'create' => 'roles.create',
            'store' => 'roles.store',
            'show' => 'roles.show',
            'update' => 'roles.update',
            'edit' => 'roles.edit',
            'destroy' => 'roles.destroy',
        ]
    ]);
    Route::resource('permissions', 'PermissionsController', [
        'except' => 'show',
        'names' => [
            'index' => 'permissions.index',
            'create' => 'permissions.create',
            'store' => 'permissions.store',
            'show' => 'permissions.show',
            'update' => 'permissions.update',
            'edit' => 'permissions.edit',
            'destroy' => 'permissions.destroy',
        ]
    ]);
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

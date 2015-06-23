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

get('/', ['middleware' => 'auth', 'uses' => 'AccountsController@index']);

get('login', 'AccountsController@login');

get('logout', 'AccountsController@logout');

post('login', 'AccountsController@doLogin');

get('home', ['middleware' => 'auth', 'uses' => 'AccountsController@index']);

get('accounts', ['middleware' => 'auth', 'uses' => 'AccountsController@accounts']);

post('accounts/search', ['middleware' => 'auth', 'uses' => 'AccountsController@find']);

get('accounts/{id}', ['middleware' => 'auth', 'uses' => 'AccountsController@show']);

patch('accounts/{id}', ['middleware' => 'auth', 'uses' => 'AccountsController@update']);

patch('accounts/{id}/ban', ['middleware' => 'auth', 'uses' => 'AccountsController@ban']);

get('accounts/{id}/edit', ['middleware' => 'auth', 'uses' => 'AccountsController@edit']);

post('characters/search', ['middleware' => 'auth', 'uses' => 'CharacterController@find']);

get('characters', ['middleware' => 'auth', 'uses' => 'CharacterController@index']);

get('characters/{id}', ['middleware' => 'auth', 'uses' => 'CharacterController@show']);

get('accounts/{id}/characters', ['middleware' => 'auth', 'uses' => 'CharacterController@showAll']);

get('clans', ['middleware' => 'auth', 'uses' => 'ClansController@index']);

get('clans/{id}', ['middleware' => 'auth', 'uses' => 'ClansController@show']);



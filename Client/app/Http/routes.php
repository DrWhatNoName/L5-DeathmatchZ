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

get('/',['middleware' => 'auth', 'uses' => 'ClientController@index']);

get('home' , ['middleware' => 'auth', 'uses' => 'ClientController@index']);

get('login', 'Auth\AuthController@login');

post('login', 'Auth\AuthController@doLogin');

get('logout','Auth\AuthController@logout');

get('register','Auth\AuthController@register');

post('register','Auth\AuthController@create');

get('shop', ['middleware' => 'auth', 'uses' => 'ShopController@index']);

get('shop/{id}', ['middleware' => 'auth', 'uses' => 'ShopController@store']);

get('shop/{id}/GC', ['middleware' => 'auth', 'uses' => 'ShopController@storeGP']);

get('shop/{id}/GD', ['middleware' => 'auth', 'uses' => 'ShopController@storeGD']);
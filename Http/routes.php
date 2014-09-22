<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Modules\Session\Http\Controllers'], function()
{
    # Login
    Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
    Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));
    # Register
    Route::get('register', array('as' => 'register', 'uses' => 'AuthController@getRegister'));
    Route::post('register', array('as' => 'register.post', 'uses' => 'AuthController@postRegister'));
    # Account Activation
    Route::get('activate/{userId}/{activationCode}', 'Modules\Session\Controllers\AuthController@getActivate');
    # Reset password
    Route::get('reset', ['as' => 'reset', 'uses' => 'AuthController@getReset']);
    Route::post('reset', ['as' => 'reset.post', 'uses' => 'AuthController@postReset']);
    Route::get('reset/{id}/{code}', ['as' => 'reset.complete', 'uses' => 'AuthController@getResetComplete']);
    Route::post('reset/{id}/{code}', ['as' => 'reset.complete.post', 'uses' => 'AuthController@postResetComplete']);
    # Logout
    Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
});
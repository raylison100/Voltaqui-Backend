<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return redirect('/');
});
Route::group(['prefix' => 'voltaqui'], function () {
    //  Gerenciamento de login
    Route::post('oauth/token',                  '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->middleware('check-email-verification','insert-scope');//Login de usuario;
    Route::get('activate/{token}',              'Auth\AuthController@enableSignUp');//Ativação de usuario via token em email.
    // Gerenciamento de password
    Route::group(['prefix' => 'password'], function () {
        Route::post('email',        'Auth\PasswordResetController@create');// Solicitação de reset de senha passando email.
        Route::get('find/{token}',  'Auth\PasswordResetController@find');// Validação de token para reset de senha.
        Route::post('reset',        'Auth\PasswordResetController@reset');// Recebendo dados para auteração de senha.
    });
    // New User
    Route::post('users',                    'UsersController@store');// Create a user.
    // Routes Autenticadas
    Route::group(['middleware' => ['auth:api','scope:COMMON']], function () {
        // Authenticated
        Route::get('auth',                      'Auth\AuthController@getUserAuthenticated');// Recupera usuario logado.
        Route::delete('oauth/tokens',           'Auth\AuthController@destroyToken');//  Destroi token de acesso.
        // User
        Route::get('users',                     'UsersController@index');// Return all users.
        Route::get('users/{id}',                'UsersController@show');// Return a users.
        Route::put('users/{id}',                'UsersController@update');// Update a user.
        Route::delete('users/{id}',             'UsersController@destroy');// Delete a user.

    });
});

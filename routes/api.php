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
//    //  Gerenciamento de login
//    Route::post('oauth/token',                  '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->middleware('check-email-verification','insert-scope');//Login de usuario;
//    Route::get('activate/{token}',              'Auth\AuthController@enableSignUp');//Ativação de usuario via token em email.
//    // Gerenciamento de password
//    Route::group(['prefix' => 'password'], function () {
//        Route::post('email',        'Auth\PasswordResetController@create');// Solicitação de reset de senha passando email.
//        Route::get('find/{token}',  'Auth\PasswordResetController@find');// Validação de token para reset de senha.
//        Route::post('reset',        'Auth\PasswordResetController@reset');// Recebendo dados para auteração de senha.
//    });
//    // New User
//    Route::post('users',                    'UsersController@store');// Create a user.
    // Routes Autenticadas
//    Route::group(['middleware' => ['auth:api','scope:COMMON']], function () {
//        // Authenticated
//        Route::get('auth',                      'Auth\AuthController@getUserAuthenticated');// Recupera usuario logado.
//        Route::delete('oauth/tokens',           'Auth\AuthController@destroyToken');//  Destroi token de acesso.
    // User
    Route::post('assessment', 'AssessmentsController@store');// Create a assessment.
    Route::get('assessment/{id}', 'AssessmentsController@show');// Return a assessment.
    Route::put('assessment/{id}', 'AssessmentsController@update');// Update a assessment.


    Route::post('catalog', 'CatalogsController@store');// Create a catalog.
    Route::get('catalog/{id}', 'CatalogsController@show');// Return a catalog.
    Route::put('catalog/{id}', 'CatalogsController@update');// Update a catalog.
    Route::delete('catalog/{id}', 'CatalogsController@destroy');// Delete a catalog.

    Route::get('client', 'ClientsController@index');// Return all client.
    Route::get('client/{id}', 'ClientsController@show');// Return a client.
    Route::put('client/{id}', 'ClientsController@update');// Update a client.
    Route::delete('client/{id}', 'ClientsController@destroy');// Delete a client.

    Route::post('comment', 'CommentsController@store');// Create a comment.
    Route::get('comment', 'CommentsController@index');// Return all comment.
    Route::get('comment/{id}', 'CommentsController@show');// Return a comment.
    Route::put('comment/{id}', 'CommentsController@update');// Update a comment.
    Route::delete('comment/{id}', 'CommentsController@destroy');// Delete a comment.

    Route::post('fidelity', 'FidelitiesController@store');// Create a fidelity.
    Route::get('fidelity', 'FidelitiesController@index');// Return all fidelity.
    Route::get('fidelity/{id}', 'FidelitiesController@show');// Return a fidelity.
    Route::put('fidelity/{id}', 'FidelitiesController@update');// Update a fidelity.
    Route::delete('fidelity/{id}', 'FidelitiesController@destroy');// Delete a fidelity.

    Route::post('preference', 'PreferencesController@store');// Create a preference.
    Route::get('preference', 'PreferencesController@index');// Return all preference.
    Route::get('preference/{id}', 'PreferencesController@show');// Return a preference.
    Route::put('preference/{id}', 'PreferencesController@update');// Update a preference.
    Route::delete('preference/{id}', 'PreferencesController@destroy');// Delete a preference.

    Route::post('restaurant', 'RestaurantsController@store');// Create a restaurant.
    Route::get('restaurant', 'RestaurantsController@index');// Return all restaurant.
    Route::get('restaurant/{id}', 'RestaurantsController@show');// Return a restaurant.
    Route::put('restaurant/{id}', 'RestaurantsController@update');// Update a restaurant.
    Route::delete('restaurant/{id}', 'RestaurantsController@destroy');// Delete a restaurant.

    Route::post('visit', 'VisitsController@store');// Create a visit.
    Route::get('visit', 'VisitsController@index');// Return all visit.
    Route::get('visit/{id}', 'VisitsController@show');// Return a visit.
    Route::put('visit/{id}', 'VisitsController@update');// Update a visit.
    Route::delete('visit/{id}', 'VisitsController@destroy');// Delete a visit.

//    });
});

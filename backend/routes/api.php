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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware(['api'])->group(function () {
    
    Route::get('/', 'MainController@main' )->name('main');
    Route::match(['POST', 'OPTIONS'], '/auth', 'MainController@auth' )->middleware('check.json')->name('auth');
    
    Route::prefix('doctor')->name('doctor.')->group(function () {        
        Route::post('/', 'DoctorController@create' )->middleware('check.json')->name('create');
        Route::put('/{id}', 'DoctorController@create' )->middleware('check.json')->name('update');
        Route::delete('/{id}', 'DoctorController@delete' )->name('delete');
        Route::get('/{id?}', 'DoctorController@list' )->name('list');
    });

    Route::get('/specialty', 'SpecialtyController@list' )->name('list');

});

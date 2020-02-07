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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/petitionPending', 'PetitionController@getPendingPetitionsCollection');


Route::get('/petition/approved', 'PetitionController@getApprovedPetitionsCollection');

Route::get('/batch/pending', 'BatchController@getPendingBatchCollection');

Route::put('/rejectbatch/{batch}', 'BatchController@updateBatchStatusToRejected');

Route::put('/approvedbatch/{batch}', 'BatchController@updateBatchStatusToApproved');

Route::resource('/batch', 'BatchController');

Route::put('/petitionReject/{petition}', 'PetitionController@updatePetitionStatusToRejected');
Route::post('/login', 'LogginController@login');
Route::middleware('auth:api')->post('/logout','LogginController@logout');
//Route::post('/logout','LogginController@logout');

Route::post('/register', 'LogginController@register');

Route::get('/batches','BatchController@index');
Route::post('/batches','BatchController@store');
    

Route::get('batches/{batch}','BatchController@show');
    

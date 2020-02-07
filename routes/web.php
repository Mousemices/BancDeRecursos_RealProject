<?php

Route::get('/', 'SiteController@index')->name('home');

Route::get('/petitions', 'PetitionController@getApprovedPetitionsCollection'); 
Route::get('/petition-pending', 'PetitionController@getPendingPetitionsCollection');
Route::get('/petition/approved', 'PetitionController@getApprovedPetitionsCollection');

Route::put('/petitionReject/{petition}', 'PetitionController@updatePetitionStatusToRejected'); 
Route::put('/petitionapproved/{petition}', 'PetitionController@updatePetitionStatusToApproved'); 
Route::put('/petitionToPending/{petition}', 'PetitionController@updatePetitionStatusToPending'); 

Route::get('/petition/{petition}/edit', 'PetitionController@edit'); 

Route::get('petition/form/{batch}', [ 
    'as' => 'petition.create',       
    'uses' => 'PetitionController@create']); 


Route::post('/petition/{batch_id}','PetitionController@store'); 


Route::get('/batch/pending', 'BatchController@getPendingBatchCollection'); 
Route::put('/rejectbatch/{batch}', 'BatchController@updateBatchStatusToRejected'); 
Route::put('/approvedbatch/{batch}', 'BatchController@updateBatchStatusToApproved'); 
Route::resource('/batch', 'BatchController'); 


Route::get('/batch/create', 'BatchController@create')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/batch','BatchController@index');
    Route::get('/batch/pending', 'BatchController@getPendingBatchCollection');
    Route::get('/petitions', 'PetitionController@getApprovedPetitionsCollection'); 
    Route::get('/petition-pending', 'PetitionController@getPendingPetitionsCollection'); 
    Route::put('/petitionReject/{petition}', 'PetitionController@updatePetitionStatusToRejected');

}); 
Route::resource('/role','RoleController');

Route::resource('/petition', 'PetitionController');
Auth::routes();


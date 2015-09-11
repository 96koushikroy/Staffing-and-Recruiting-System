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

Route::get('/','HomeController@getFirstPage');
Route::post('/','HomeController@postLogin');
Route::post('savebasic','HomeController@postSaveBasic');
Route::post('createadmin','HomeController@postCreateFirstAdmin');
Route::get('logout','HomeController@UserLogout');
Route::get('dashboard','HomeController@getDashboard');
Route::get('add-job-category','ListingController@getAddJobCategory');
Route::post('add-job-category','ListingController@postAddJobCategory');
Route::get('add-job-category/delete/{id}','ListingController@deleteJobCategory');

Route::get('add-job-type','ListingController@getAddJobType');
Route::post('add-job-type','ListingController@postAddJobType');
Route::get('add-job-type/delete/{id}','ListingController@deleteJobType');

Route::get('add-pay-type','ListingController@getAddPayType');
Route::post('add-pay-type','ListingController@postAddPayType');
Route::get('add-pay-type/delete/{id}','ListingController@deletePayType');

Route::get('add-listing','ListingController@getAddListing');
Route::post('add-listing','ListingController@postAddListing');
Route::get('my-listings','ListingController@getAllListing');
Route::get('job/{lid}','ListingController@showIndividualJobPage');
Route::get('job/delete/{lid}','ListingController@deleteJob');
Route::get('job/deactivate/{lid}','ListingController@deActivateJob');
Route::get('job/activate/{lid}','ListingController@ActivateJob');
Route::get('job/apply/{lid}','ListingController@getJobApplyPage');
Route::post('job/apply/{lid}','ListingController@postJobApplyPage');
Route::get('application-check','ListingController@checkApplication');
Route::post('application-check','ListingController@postCheckApplication');
Route::get('my-listings/applicants/{lid}','ListingController@getApplicants');
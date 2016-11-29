<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => []], function() {
    Route::post('/register', 'AuthenticateController@register');
    Route::post('/login', 'AuthenticateController@login');
    Route::resource('subjects', 'SubjectController');
    Route::get('/criteria', 'CriterionController@index');
});
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::resource('assessments', 'AssessmentController');
    Route::put('update', 'AuthenticateController@update');
});

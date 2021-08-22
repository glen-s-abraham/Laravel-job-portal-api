<?php


use Illuminate\Support\Facades\Route;

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

Route::resource('countries', 'CountryController');
Route::resource('states', 'StateController');
Route::resource('educations', 'EducationController');
Route::resource('specializations', 'SpecializationController');
Route::resource('userRoles', 'UserRoleController');
Route::resource('jobCategories', 'JobCategoryController');
Route::resource('users','UserController');
Route::resource('jobs','JobController');
Route::get('user/{userId}/jobs','UserJobController@index');
Route::get('job/{job}/applicants','JobApplicationController@getJobApplicants');
Route::post('job/{job}/apply','JobApplicationController@applyForJob');
Route::delete('job/{job}/cancel','JobApplicationController@cancelJobApplication');
Route::get('myApplications','JobApplicationController@getMyJobApplications');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('resumes','ResumeController@store');
Route::put('resumes', 'ResumeController@update');
Route::delete('resumes', 'ResumeController@destroy');
Route::get('myResume','ResumeController@show');




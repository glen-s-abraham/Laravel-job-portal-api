<?php

use App\Models\Specialization;
use Illuminate\Http\Request;
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


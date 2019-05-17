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

//Category api resource
Route::apiResource('/category', 'API\CategoryController');

//Subcategory api resource
Route::apiResource('/subcategory', 'API\SubcategoryController');

//Doctor api resource
Route::apiResource('/doctor', 'API\DoctorController');
<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\QuizController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company/{id}', [CompanyController::class, 'getAction'])->whereNumber('id');
Route::get('/company/list', [CompanyController::class, 'listAction']);

Route::get('/group/list', [GroupController::class, 'listAction']);
Route::get('/group/{id}', [GroupController::class, 'getAction'])->whereNumber('id');;

Route::get('/quiz/{id}', [QuizController::class, 'getAction'])->whereNumber('id');
Route::post('/quiz', [QuizController::class, 'storeAction']);

Route::get('/employee/{id}', [EmployeeController::class, 'getAction'])->whereNumber('id');

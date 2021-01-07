<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PositionController;
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

Route::get('/answer/default', [AnswerController::class, 'getDefaultAction']);

Route::get('/company/{id}', [CompanyController::class, 'getAction'])->whereNumber('id');
Route::get('/company/{id}/quizzes', [CompanyController::class, 'getQuizzesAction'])->whereNumber('id');
Route::get('/company/list', [CompanyController::class, 'listAction']);

Route::get('/position/list', [PositionController::class, 'listAction']);
Route::post('/position', [PositionController::class, 'storeAction']);

Route::get('/group/list', [GroupController::class, 'listAction']);
Route::get('/group/{id}', [GroupController::class, 'getAction'])->whereNumber('id');;
Route::put('/group/{id}', [GroupController::class, 'setHeadAction'])->whereNumber('id');;
Route::post('/group', [GroupController::class, 'storeAction']);

Route::get('/quiz/{id}', [QuizController::class, 'getAction'])->whereNumber('id');
Route::post('/quiz/{id}', [FeedbackController::class, 'storeAction'])->whereNumber('id');
Route::post('/quiz', [QuizController::class, 'storeAction']);

Route::get('/quiz/{id}/check-answered', [FeedbackController::class, 'checkAnsweredAction'])->whereNumber('id');

Route::post('/employee', [EmployeeController::class, 'storeAction']);
Route::get('/employee/list', [EmployeeController::class, 'listAction']);
Route::get('/employee/{id}', [EmployeeController::class, 'getAction'])->whereNumber('id');
Route::put('/employee/{id}', [EmployeeController::class, 'setAdminAction'])->whereNumber('id');
Route::get('/employee/{id}/quizzes', [EmployeeController::class, 'getQuizzesAction'])->whereNumber('id');

Route::post('/auth/get-user', [AuthController::class, 'getUserAction']);
Route::post('/auth/login', [AuthController::class, 'loginAction']);

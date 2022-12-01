<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\OnlyMemberMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware([OnlyMemberMiddleware::class]);

Route::controller(\App\Http\Controllers\UserController::class)->group(function() {
    Route::get('/login', 'login')->middleware([OnlyGuestMiddleware::class]);
    Route::post('/login', 'doLogin')->middleware([OnlyGuestMiddleware::class]);
    Route::post('/logout','doLogout')->middleware([OnlyMemberMiddleware::class]);
    Route::get('/register', 'register')->middleware([OnlyGuestMiddleware::class]);
    Route::post('/register', 'doRegister')->middleware([OnlyGuestMiddleware::class]);
});

Route::controller(\App\Http\Controllers\StudentController::class)->middleware(OnlyMemberMiddleware::class)
->group(function(){
    Route::get('/student', 'index');
    Route::get('/student/create','create');
    Route::post('/student/create','doCreate');
    Route::get('/student/{id}/edit', 'edit');
    Route::post('/student/{id}/edit', 'doEdit');
    Route::post('/student/{id}/delete', 'doDelete');


});

Route::controller(App\Http\Controllers\MajorController::class)->middleware([OnlyMemberMiddleware::class])->group(function(){
    Route::get('/major','index');
    Route::get('/major/create','create');
    Route::post('/major/create','doCreate');
    Route::get('/major/{id}/edit', 'edit');
    Route::post('/major/{id}/edit', 'doEdit');
    Route::post('/major/{id}/delete', 'doDelete');

});

Route::controller(App\Http\Controllers\ClassGroupController::class)->middleware([OnlyMemberMiddleware::class])->group(function(){
    Route::get('/classgroup', 'index');
    Route::get('/classgroup/create','create');
    Route::post('/classgroup/create','doCreate');
    Route::get('/classgroup/{id}/edit', 'edit');
    Route::post('/classgroup/{id}/edit', 'doEdit');
    Route::post('/classgroup/{id}/delete', 'doDelete');

});

Route::controller(App\Http\Controllers\TeacherController::class)->middleware([OnlyMemberMiddleware::class])->group(function()
{
    Route::get('/teacher','index');
    Route::get('/teacher/create', 'create');
    Route::post('/teacher/create', 'doCreate');
    Route::get('/teacher/{id}/edit', 'edit');
    Route::post('/teacher/{id}/edit', 'doEdit');
    Route::post('/teacher/{id}/delete', 'doDelete');


});
Route::controller(App\Http\Controllers\ClauseController::class)->middleware([OnlyMemberMiddleware::class])->group(function(){
    Route::get('/clause','index');
    Route::get('/clause/create', 'create');
    Route::post('/clause/create', 'doCreate');
    Route::get('/clause/{id}/edit', 'edit');
    Route::post('/clause/{id}/edit', 'doEdit');
    Route::post('/clause/{id}/delete', 'doDelete');


});

Route::controller(App\Http\Controllers\PointController::class)->middleware([OnlyMemberMiddleware::class])->group(function() {
    Route::get('/point', 'index');
    Route::get('/point/create', 'create');
    Route::post('/point/create', 'doCreate');
    Route::get('/point/{id}/edit', 'edit');
    Route::post('/point/{id}/edit', 'doEdit');
    Route::post('/point/{id}/delete', 'doDelete');

});

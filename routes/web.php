<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth','role'],'namespace' => 'App\Http\Controllers'],function () {
        Route::post('/starttime','StudentController@settime');
        Route::get('/student/questions','StudentController@index');
        Route::post('/student/questions','StudentController@store');
        Route::get('/teacher/questions/create','TeacherController@create');
        Route::post('/teacher/questions','TeacherController@store');
    
        //Test  Routes
        Route::get('/test','TestController@test');
        Route::post('/test','TestController@valid');
        // Route::get('/questions/create','QuestionController@create');
    
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

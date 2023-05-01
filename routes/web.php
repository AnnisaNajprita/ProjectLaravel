<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('student', StudentController::class)->middleware('isLogin');

Route::get('/', [PageController::class, 'index']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/about', [PageController::class, 'about']);

Route::get('/sesi',[SessionController::class,'index'])->middleware('isLecture');
Route::post('/sesi/login',[SessionController::class,'login'])->middleware('isLecture');
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register']);
Route::post('/sesi/create',[SessionController::class,'create']);

Route::get('/', function(){
    return view('sesi/welcome');
})->middleware('isLecture');

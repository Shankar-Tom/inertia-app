<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return inertia('Login');
})->name('login');
Route::get('/signup', function () {
    return inertia('Signup');
})->name('signup');


Route::controller(AuthController::class)->group(function(){
    Route::post('/signup','signup');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::controller(TodoController::class)->middleware('loggin')->group(function(){
    Route::get('/todos','list')->name('todos');
    Route::post('/add','add')->name('add');
    Route::post('/update-status','update_status');
    Route::post('/delete','delete');
});

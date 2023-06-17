<?php

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
    return inertia('welcome',[
        'name'=>"Shankar"
    ]);
});

Route::get('/second',function(){
    return inertia('second');
})->middleware('loggin');

Route::get('/third', function () {
    return inertia('third');
});

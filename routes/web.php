<?php

use App\Http\Controllers\EmployeeController;
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

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/registration','registration');
    Route::post('/registration','registered');
    Route::get('/','index');
    Route::get('/edit/{id}','edit');
    Route::post('/update/{id}','Update');
    Route::get('/trash/{id}','trash');
    Route::get('/viewtrash','viewtrash');
    Route::get('/restore/{id}','restore');
    Route::get('/delete/{id}','destroy');
});

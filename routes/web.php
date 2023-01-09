<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountDetailController;
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

Route::get('/',[AccountDetailController::class,'index'])->name('index');
Route::post('/addUser',[AccountDetailController::class,'addUser'])->name('add-user');
Route::post('/get-user',[AccountDetailController::class,'getUser'])->name('get-user');
Route::post('/get-result',[AccountDetailController::class,'getResult'])->name('get-result');
Route::post('/add-account',[AccountDetailController::class,'addAccount'])->name('add-account');
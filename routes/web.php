<?php

use App\Http\Controllers\CustomerController;
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
    return view('welcome');
});
Route::post('customer/store', [CustomerController::class,'store'])->name('store.customer');

Route::get('/checkEmail',[CustomerController::class,'checkEmail']);

Route::get('/checkPhoneNumber',[CustomerController::class,'checkPhoneNumber']);

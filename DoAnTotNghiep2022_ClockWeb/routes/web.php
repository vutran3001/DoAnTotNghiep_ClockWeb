<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('Main',[MainController::class,'home'])->name('admin');
    Route::get('Main/mains',[MainController::class,'index']);
});

Route::resource('Account',UserController::class);
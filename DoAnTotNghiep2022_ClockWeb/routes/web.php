<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\MauController;
use App\Http\Controllers\SizeController;
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

// Đăng nhập
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('login/store',[LoginController::class,'store']);

//Trang chủ
Route::middleware(['auth'])->group(function () {
    Route::get('Main',[MainController::class,'home'])->name('admin');
    Route::get('Main/mains',[MainController::class,'index']);
});


//Tin nhắn
Route::get('messages',[MainController::class,'messages'])->name('messages');
Route::get('messages_show',[MainController::class,'messages_show'])->name('messages_show');
Route::get('messages_send',[MainController::class,'messages_send'])->name('messages_send');

//Cài đặt
Route::get('setting',[MainController::class,'setting'])->name('setting');
//Tài khoản
Route::resource('User',UserController::class);

//Slide
Route::resource('Slide',SlideController::class);

//Contact
Route::resource('Contact',ContactController::class);

//Loại sản phẩm
Route::resource('LoaiSanPham',LoaiSanPhamController::class);

//Nhà cung cấp
Route::resource('NhaCungCap', NhaCungCapController::class);

//Màu
Route::resource('Mau', MauController::class);

//Size
Route::resource('Size', SizeController::class);

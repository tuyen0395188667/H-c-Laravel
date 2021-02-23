<?php

use App\Http\Controllers\MyController;
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


// Route gồm Loại phương thức, tên Đường dẫn, Tham só truyền vào
Route::get('KhoaHoc', function() {
    return "Xin chào các bạn";
});
// Test route
Route::get('KhoaPham/Laravel', function(){
    echo "<h1>Khoa Hoc - Laravel </h1>";
});


// Truyền tham số cho Route
Route::get('HoTen/{ten}', function ($ten) {
    echo "Tên của bạn là: " .$ten;
});
// Đặt điều kiện cho tham số
Route::get('Laravel/{ngay}', function ($ngay) {
    echo "Hôm này là ngày: " .$ngay;
})->where(['ngay' => '[a-zA-Z0-9]+']);


// Định danh cho Route
// Cách 1
Route::get('Route1', ['as' => 'Myroute1', function (){
    echo "Đã đổi tên";
}]);
// Cách 2
Route::get('Route2', function () {
    echo "Đây là Route2";
})->name('Myroute2');

// Gọi Route1 bằng tên đã đặt
Route::get('GoiTen1', function () {
    return redirect() -> route("Myroute1");
});
// Gọi Route2 bằng tên đã đặt
Route::get('GoiTen2', function () {
    return redirect() -> route("Myroute2");
});


// Nhóm Route thành Group
Route::group(['prefix' => 'MyGroup'], function() {
    // Gọi Route User1: domain/MyGroute/User1
    Route::get('User1', function() {
        echo "User1";
    });
    // Gọi Route User2: domain/MyGroute/User2
    Route::get('User2', function() {
        echo "User2";
    });
    // Gọi Route User3: domain/MyGroute/User3
    Route::get('User3', function() {
        echo "User3";
    });
});


// Bài gọi Controller
Route::get('GoiController', [MyController::class, 'XinChao']);

// Gửi dữ liệu từ Route sang Controller
Route::get('ThamSo/{ten}', [MyController::class, 'KhoaHoc']); 


// URL
Route::get('MyRequest', [MyController::class, 'GetURL']);


// Gửi dữ liệu với Request
Route::get('getForm', function(){
    return view('postForm'); // Laravel tu hieu la file postForm.blade.php
});

Route::post('postForm', ['as'=>'postForm', 'uses' => [MyController::class, 'Postform']]);
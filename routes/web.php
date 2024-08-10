<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\IntroController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSliderController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\UploadFileController;
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

// Trang chủ
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

// Địch vụ
Route::get('/dich-vu', [App\Http\Controllers\ProductController::class, 'listAll']);
Route::get('/danh-muc/{id}-{slug}', [App\Http\Controllers\ProductController::class, 'list']);
Route::get('/dich-vu/{slug}', [App\Http\Controllers\ProductController::class, 'detail']);

Route::get('/search', [App\Http\Controllers\ProductController::class, 'search']);

//
Route::get('/tin-tuc', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/bai-viet/{slug}', [App\Http\Controllers\PostController::class, 'post']);

// trang liên hệ
Route::get('/lien-he', function() {
    return view('contacts.contact', [
        'title' => 'Gia Phú - trang liên hệ',
        'name' => 'liên hệ',
        'menu' => 0
    ]);
});

// trang giới thiệu
Route::get('/gioi-thieu', function() {
    return view('contacts.intro', [
        'title' => 'Gia Phú - trang giời thiệu',
        'name' => 'giời thiệu',
        'menu' => 0
    ]);
});

// Login Admin
Route::get('/admin/user/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/user/login', [LoginController::class, 'login']);

// Admin
Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [MainController::class, 'index']);

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::post('upload-file', [UploadFileController::class, 'upload']);

        Route::prefix('menu')->group(function() {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::post('check', [MenuController::class, 'check']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'edit']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::post('delete', [MenuController::class, 'destroy']);
        });

        Route::prefix('product')->group(function() {
            //
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::post('check', [ProductController::class, 'check']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'edit']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::post('delete', [ProductController::class, 'destroy']);

            //
            Route::prefix('slider')->group(function() {
                Route::get('add/{slider}', [ProductSliderController::class, 'create']);
                Route::post('add/{slider}', [ProductSliderController::class, 'store']);
                Route::get('list/{slider}', [ProductSliderController::class, 'index']);
                Route::get('edit/{slider}', [ProductSliderController::class, 'edit']);
                Route::post('edit/{slider}', [ProductSliderController::class, 'update']);
                Route::post('delete', [ProductSliderController::class, 'destroy']);
            });
        });

        //
        Route::prefix('post')->group(function() {
            Route::get('add', [PostController::class, 'create']);
            Route::post('add', [PostController::class, 'store']);
            Route::get('list', [PostController::class, 'index']);
            Route::get('edit/{post}', [PostController::class, 'edit']);
            Route::post('edit/{post}', [PostController::class, 'update']);
            Route::post('delete', [PostController::class, 'destroy']);
        });

        //
         Route::prefix('social')->group(function() {
            Route::get('add', [SocialController::class, 'create']);
            Route::post('add', [SocialController::class, 'store']);
            Route::get('list', [SocialController::class, 'index']);
            Route::get('edit/{social}', [SocialController::class, 'edit']);
            Route::post('edit/{social}', [SocialController::class, 'update']);
            Route::post('delete', [SocialController::class, 'destroy']);
        });


        // Account manage
        // Tài khoản của cấp quản lý
        Route::middleware(['authMaster'])->group(function() {

            //
            Route::prefix('contact')->group(function() {
                Route::get('add', [ContactController::class, 'create']);
                Route::post('add', [ContactController::class, 'store']);
                Route::get('list', [ContactController::class, 'index']);
                Route::get('edit/{contact}', [ContactController::class, 'edit']);
                Route::post('edit/{contact}', [ContactController::class, 'update']);
                Route::post('delete', [ContactController::class, 'destroy']);
            });

            Route::prefix('intro')->group(function() {
                Route::get('add', [IntroController::class, 'create']);
                Route::post('add', [IntroController::class, 'store']);
                Route::get('list', [IntroController::class, 'index']);
                Route::get('edit/{intro}', [IntroController::class, 'edit']);
                Route::post('edit/{intro}', [IntroController::class, 'update']);
                Route::post('delete', [IntroController::class, 'destroy']);
            });
        });

    });
});
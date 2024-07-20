<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminAuth\AdminNewPasswordController;
use App\Http\Controllers\AdminAuth\AdminPasswordResetLinkController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{bookId}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// 管理者用ルート
Route::prefix('admin')->name('admin.')->group(function () {
    // 認証ルート
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // 認証が必要な管理者専用ルート
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::resource('books',BookController::class);
        Route::resource('categories', AdminCategoryController::class);

        // プロフィール編集ルート
        Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('profile.edit');
        Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    });

    // 管理者用パスワードリセットルート
    Route::get('/forgot-password', [AdminPasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [AdminNewPasswordController::class, 'store'])->name('password.update');
});

require __DIR__.'/auth.php';

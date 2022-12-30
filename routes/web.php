<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return inertia('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'verified')->group(function () {
    Route::inertia('dashboard', 'Admin/Dashboard')->name('dashboard');
});

Route::get('language/{lang}', function ($lang) {
    session(['locale' => $lang]);

    return redirect()->back();
})->name('lang.switch')->where('lang', 'ar|en');

require __DIR__.'/auth.php';

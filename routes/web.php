<?php

// use App\Http\Controllers\Dashboard;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\login; 
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
// another method OF LARAVEL 9 is 
// route :: controller(login ::class ) -> middleware(['guest']) -> group (function(){
    
// Route::get('/','index') -> name('login');

// Route::get('/register', 'register') -> name('register');

// Route::get('/forgot-password','forgot_password') -> name('forgot-password');

// Route::post('/register', 'process_register');
// Route::post('/', 'authenticate_user');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [
//         Dashboard::class,
//         'index'
//     ])->name('admin.dashboard');
// });

use App\Http\Controllers\Countries;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [Login::class, 'index'])->name('login');
    Route::get('/register', [Login::class, 'register'])->name('register');
    Route::get('/forgot-password', [Login::class, 'forgot_password'])->name('forgot-password');
    Route::post('/register', [Login::class, 'process_register']);
    Route::post('/', [Login::class, 'authenticate_user']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',
     [Dashboard::class, 
     'index'])->name('admin.dashboard');

     Route:: resource('countries', Countries::class);
});

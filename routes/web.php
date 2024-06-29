<?php


use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

    Route::get('/', [FrontController::class, 'index'])->name('indexx');
      
     Route::middleware('auth:web')->prefix('admin')->group(function () {
     Route::get('/home', [HomeController::class, 'index'])->name('home');

     //user registration section
     Route::get('/users', [UserController::class, 'index'])->name('user.index');
     Route::get('/user-registration', [UserController::class, 'adduser'])->name('adduser');
     Route::post('/user-registration-store', [UserController::class, 'storeuser'])->name('storeuser');
     Route::get('/user-remove/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');


     //sales section
     Route::get('/admin-sales-create', [SalesController::class, 'create'])->name('sales.create');
     Route::post('/admin-sales', [SalesController::class, 'store'])->name('sales.store');
     Route::get('/admin-sales-mysales', [SalesController::class, 'mysales'])->name('sales.mysales');
     Route::get('/admin-sales-payroll', [SalesController::class, 'payroll'])->name('sales.payroll');

    });

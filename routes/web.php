<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    if (auth()->check()) {
        if (auth()->user()->is_admin == true) {
            return redirect()->route('admin.dashboard');
        }else{
           return redirect()->route('user.dashboard');
        }
       }else{
        return redirect()->route('login');
       }
})->middleware(['auth', 'verified'])->name('dashboard');

//admin routes
Route::prefix('administrator')->group(
    function(){
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');
        Route::get('/services', function () {
            return view('admin.services');
        })->name('admin.services');
        Route::get('/customers', function () {
            return view('admin.customers');
        })->name('admin.customers');
        Route::get('/status', function () {
            return view('admin.status');
        })->name('admin.status');
        Route::get('/sales', function () {
            return view('admin.sales');
        })->name('admin.sales');
        Route::get('/report', function () {
            return view('admin.report');
        })->name('admin.report');
    }
);



//user route

Route::prefix('user')->group(
    function(){
        Route::get('/dashboard', function () {
            return view('user.index');
        })->name('user.dashboard');
        Route::get('/laundry-now', function () {
            return view('user.transaction');
        })->name('user.transaction');
        Route::get('/my-booking', function () {
            return view('user.booking');
        })->name('user.booking');
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

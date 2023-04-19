<?php

use App\Http\Controllers\BootcampController;
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
    return redirect('/home');
});

Route::get('/dashboard', function () {
    return view('admin.modules.home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',function () {
    return view('user.modules.home.index');
})->name('home');

Route::get('/bootcamp',function () {
    return view('user.modules.bootcamp.index');
})->name('bootcamp');

Route::name('bootcamp.')->prefix('/bootcamp')->group(function() {
    Route::get('/all', [BootcampController::class, 'index'])->name('all');
    Route::get('/detail/{id}', [BootcampController::class, 'show'])->name('show');
});

Route::get('/mini-event',function () {
    return view('user.modules.mini-event.index');
})->name('mini-event');

Route::get('/404',function () {
    return view('error.error');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

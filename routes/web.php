<?php

use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ManageEventController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\OrdersController;
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


// Route::get('/dashboard', function () {
//     return view('admin.modules.home.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home',function () {
//     return view('user.modules.home.index');
// })->name('home');

Route::get('/home', [BootcampController::class, 'home'])->name('home');
Route::get('/mail', [MailController::class, 'index'])->name('index');


// Route::get('/events',function () {
//     return view('user.modules.bootcamp.index');
// })->name('events');

Route::name('events.')->prefix('/events')->group(function() {
    Route::get('/', [BootcampController::class, 'index'])->name('index');
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

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{program_id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Route::get('/checkout', [OrdersController::class, 'index'])->name('checkout.index');
    Route::get('/checkout', [OrdersController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/pay', [OrdersController::class, 'checkout'])->name('checkout.pay');
    // Route::get('/cart/store', [CartController::class, 'store'])->name('cart.store');

    Route::name('user-dashboard.')->prefix('/user-dashboard')->group(function() {
        Route::get('/home', [DashboardController::class, 'home'])->name('home');
        Route::get('/transaction', [DashboardController::class, 'transaction'])->name('transaction');
        Route::get('/ticket', [DashboardController::class, 'ticket'])->name('ticket');
        Route::get('/ticket/view', [DashboardController::class, 'ticketDetail'])->name('ticket.view');
    });
});

// Route Dashboard Admin
Route::middleware(['auth', 'admin'])->name('dashboard.')->prefix('/dashboard')->group(function() {
    Route::get('/', [ManageUserController::class, 'home'])->name('index');

    Route::name('manage-user.')->prefix('/manage-user')->group(function() {
        Route::get('/', [ManageUserController::class, 'index'])->name('index');
        Route::post('/', [ManageUserController::class, 'store'])->name('store');
        Route::put('/', [ManageUserController::class, 'update'])->name('update');
        Route::delete('/', [ManageUserController::class, 'destroy'])->name('destroy');
    });

    Route::name('manage-event.')->prefix('/manage-event')->group(function() {
        Route::get('/', [ManageEventController::class, 'index'])->name('index');
        Route::post('/', [ManageEventController::class, 'store'])->name('store');
        Route::put('/', [ManageEventController::class, 'update'])->name('update');
        Route::delete('/', [ManageEventController::class, 'destroy'])->name('destroy');
    });

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardUserCertificateController;
use App\Http\Controllers\DashboardUserTicketController;
use App\Http\Controllers\DashboardUserTransactionController;
use App\Http\Controllers\editProfileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ManageEventController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\NewDashboardController;
use App\Http\Controllers\NewUserDashboardcontroller;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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

/*
 * | GUEST ROUTES |
 *
 */
Route::get('/', function () { return redirect('/home');});
Route::get('/home', [BootcampController::class, 'mnt'])->name('home');
// Route::get('/mail', [MailController::class, 'index'])->name('index');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');


// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Route::name('events.')->prefix('/events')->group(function() {
//     Route::get('/', [BootcampController::class, 'index'])->name('index');
//     Route::get('/all', [BootcampController::class, 'index'])->name('all');
//     // Route::get('/detail/{id}', [BootcampController::class, 'show'])->name('show');
//     Route::get('/detail/{slug}', [BootcampController::class, 'showBySlug'])->name('show');
// });

// Route::get('/mini-event',function () {
//     return view('user.modules.mini-event.index');
// })->name('mini-event');

// Route::get('/404',function () {
//     return view('error.error');
// });
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::name('cart.')->prefix('/cart')->group(function () {
//         Route::get('/', [CartController::class, 'index'])->name('index');
//         Route::get('/getData', [CartController::class, 'getData'])->name('getData');
//         Route::post('/add/{program_id}', [CartController::class, 'add'])->name('add');
//         Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
//     });


//     // Route::get('/checkout', [OrdersController::class, 'index'])->name('checkout.index');
//     Route::get('/checkout', [OrdersController::class, 'index'])->name('checkout.index');
//     Route::post('/checkout/pay', [OrdersController::class, 'checkout'])->name('checkout.pay');
//     // Route::get('/cart/store', [CartController::class, 'store'])->name('cart.store');

//     //! Route Dashboard User
//     Route::name('user-dashboard.')->prefix('/user-dashboard')->group(function() {
//         Route::get('/home', [DashboardController::class, 'home'])->name('home');
//         Route::get('/transaction', [DashboardController::class, 'transaction'])->name('transaction');
//         Route::get('/ticket', [DashboardController::class, 'ticket'])->name('ticket');
//         Route::get('/ticket/view', [DashboardController::class, 'ticketDetail'])->name('ticket.view');
//     });

//     // Route::name()->group(function () {
// });

// Route::name('user-dashboard.v2.')->prefix('/user-dashboard/v2')->middleware('auth')->group(function () {
//     Route::get('/', [NewUserDashboardcontroller::class, 'index'])->name('home');

//     Route::name('transactions.')->prefix('/transactions')->group(function () {
//         Route::get('/', [DashboardTransactionController::class, 'index'])->name('index');
//         Route::get('/getData', [DashboardTransactionController::class, 'getData'])->name('getData');
//     });

//     Route::name('edit-profile.')->prefix('/edit-profile')->group(function () {
//         Route::get('/', [editProfileController::class, 'index'])->name('index');
//         Route::get('/getData', [editProfileController::class, 'getData'])->name('getData');
//     });

//     Route::name('ticket.')->prefix('/ticket')->group(function () {
//         Route::get('/', [DashboardUserTicketController::class, 'index'])->name('index');
//         Route::get('/getData', [DashboardUserTicketController::class, 'getData'])->name('getData');
//     });

//     Route::name('certificates.')->prefix('/certificates')->group(function () {
//         Route::get('/', [DashboardUserCertificateController::class, 'index'])->name('index');
//         Route::get('/getData', [DashboardUserCertificateController::class, 'getData'])->name('getData');
//     });

// });

// //! Route Dashboard Admin
// Route::middleware(['auth', 'admin'])->name('dashboard.')->prefix('/dashboard')->group(function() {
//     Route::get('/', [ManageUserController::class, 'home'])->name('index');
//     Route::get('/v2', [NewDashboardController::class, 'index'])->name('home');

//     Route::name('manage-user.')->prefix('/manage-user')->group(function() {
//         Route::get('/', [ManageUserController::class, 'index'])->name('index');
//         Route::post('/', [ManageUserController::class, 'store'])->name('store');
//         Route::put('/', [ManageUserController::class, 'update'])->name('update');
//         Route::delete('/', [ManageUserController::class, 'destroy'])->name('destroy');
//     });

//     Route::name('manage-event.')->prefix('/manage-event')->group(function() {
//         Route::get('/', [ManageEventController::class, 'index'])->name('index');
//         Route::get('/table', [ManageEventController::class, 'table'])->name('table');
//         Route::post('/', [ManageEventController::class, 'store'])->name('store');
//         Route::put('/', [ManageEventController::class, 'update'])->name('update');
//         Route::delete('/', [ManageEventController::class, 'destroy'])->name('destroy');
//     });

// });

require __DIR__.'/auth.php';

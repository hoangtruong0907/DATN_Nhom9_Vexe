<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\BlogControllers;
use App\Http\Controllers\Auth\InfoController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Middleware\CheckAuthGoogle;
use App\Http\Middleware\CheckLoginAdminMiddleware;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\PaymentResultController;
use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\admin\AdminBookingController;

# Admin page
Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin/dashboard');
    })->name('admin')->middleware(AuthMiddleware::class);
    #login admin
    Route::get('/login', [AuthAdminController::class, 'index'])->name('admin.login.index')->middleware(CheckLoginAdminMiddleware::class);
    Route::post('/doLogin', [AuthAdminController::class, 'doLogin'])->name('admin.doLogin');
    Route::get('/doLogout', [AuthAdminController::class, 'doLogout'])->name('admin.doLogout');

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('/blogs')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blogs.index');
        Route::post('/', [BlogController::class, 'store'])->name('admin.blogs.store');
        Route::get('/show/{id}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blogs.create');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
        Route::delete('/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
        Route::get('/{id}', [BlogController::class, 'show'])->name('admin.blogs.show');
    });
    Route::get('/vexeretip', [BlogController::class, 'index'])->name('admin.vexeretip.index');
    Route::get('/news', [BlogController::class, 'index'])->name('admin.news.index');

    // Banner
    Route::prefix('/banner')->group(function () {
        Route::get('/', [ImageUploadController::class, 'showBanner'])->name('admin.banner');
        Route::post('/update', [ImageUploadController::class, 'updateBanner'])->name('admin.banner.update');
    });

    Route::prefix('/booking')->group(function () {
        Route::get('/', [AdminBookingController::class, 'index'])->name('admin.booking');
        Route::get('/get-data-table', [AdminBookingController::class, 'showDataTable'])->name('admin.booking.dataTable');
        Route::get('/get-data-transaction-table', [AdminBookingController::class, 'showDataTransactionsTable'])->name('admin.booking.dataTransactionTable');
        Route::get('/{id}', [AdminBookingController::class, 'show'])->name('admin.booking.detail');
        Route::get('/edit/{id}', [AdminBookingController::class, 'edit'])->name('admin.booking.edit');
        Route::post('/update/{id}', [AdminBookingController::class, 'update'])->name('admin.booking.update');
    });
});

Route::get('/', [RouteController::class, 'index'])->name('home');

Route::get('bai-viet/{slug}', [BlogControllers::class, 'show'])->name('blog.content');

Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');
Route::get('/test', [TestController::class, 'test']);

#Search route
Route::prefix('/route-search')->group(function () {
    Route::get('/xe-khach',  [RouteController::class, 'busRouteSearch'])->name('route.search.bus');
    Route::get('/tau-hoa', [RouteController::class, 'trainRouteSearch'])->name('route.search.train');
    Route::post('/sort-tau-hoa', [RouteController::class, 'trainRouteSort'])->name('route.sort.train');
});


Route::get('/bookingconfirmation/ve-tau',  [BookingController::class, 'bookingConfirmationTrain'])->name('booking.train');
Route::post('/bookingconfirmation/ve-xe-khach',  [BookingController::class, 'index']);
Route::post('/booking-payment',  [BookingController::class, 'store'])->name('booking.store');
Route::post('/update-booking', [BookingController::class, 'updateBookingStatus'])->name('booking.update');
//payment
Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment');

# user login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::post('/add-phone', [GoogleController::class, 'addPhone'])->name('auth.addPhone');

#Account information
Route::middleware(['auth.google'])->prefix('/tai-khoan')->group(function () {
    Route::get('/thong-tin', [InfoController::class, 'index'])->name('auth.info');
    Route::get('/thanh-vien', [InfoController::class, 'membership'])->name('auth.membership');
    Route::get('/ve-cua-toi', [InfoController::class, 'getBookingInfo'])->name('auth.ticket');
    Route::get('/uu-dai', [InfoController::class, 'reward'])->name('auth.reward');
    Route::get('/the-cua-toi', [InfoController::class, 'card'])->name('auth.card');
    Route::get('/nhan-xet', [InfoController::class, 'review'])->name('auth.review');
    Route::get('/dang-xuat', [InfoController::class, 'logout'])->name('auth.logout');
});

Route::get('/payment-result', [PaymentResultController::class, 'showPaymentResult'])->name('payment.result');

// loading page
Route::get('/load-content', function () {
    return view('components._loading'); // Trả về file Blade cần include
});
//update profile
Route::post('/tai-khoan/thong-tin/update_profile',[InfoController::class,'update_profile'])->name('update_profile');

//Delete User
Route::delete('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

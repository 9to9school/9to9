<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\USPController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CommonSettingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WebBannerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('web.index');
});

Route::get('/about-us',function (){
    return view('web.about');
});
Route::get('/contact-us', function () {
    return view('web.contact_us');
});


Route::get('/pre-school', function () {
    return view('web.preschool');
});

Route::get('/day-care', function () {
    return view('web.day-care');
});

Route::get('/events', function () {
    return view('web.events');
});


Route::get('/usp-details', function () {
    return view('web.usp');
});

// payment test
Route::get('/payment-form', [PaymentController::class, 'showForm']);
// Route::post('/pay', [PaymentController::class, 'createPayment'])->name('pay');

// Route::post('/cashfree-webhook', [WebhookController::class, 'handle']);


//Route::get('/usp-details', function () {
//    return view('web.usp');
//});




// Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
Route::get('/login-form', [AdminController::class, 'signin']);
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

 

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'edit'])->name('profile.edit');
    Route::put('/edit/{id}', [AdminController::class, 'update'])->name('update');

    // USP Routes
    Route::get('/usp', [USPController::class, 'index'])->name('usp.list');
    Route::get('/usp/create', [USPController::class, 'create'])->name('usp.create');
    Route::post('/usp', [USPController::class, 'store'])->name('usp.store'); 
    Route::get('/usp/{id}/edit', [USPController::class, 'edit'])->name('usp.edit'); 
    Route::put('/usp/{id}', [USPController::class, 'update'])->name('usp.update'); 
    Route::delete('/usp/{id}', [USPController::class, 'destroy'])->name('usp.destroy'); 

    // Banner Routes
    Route::get('/banners', [BannerController::class, 'index'])->name('banner.list');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store'); 
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit'); 
    Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update'); 
    Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

    // Blog Routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.list');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store'); 
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit'); 
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update'); 
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    // Category Routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store'); 
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit'); 
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update'); 
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // FAQ Routes
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.list');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store'); 
    Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit'); 
    Route::put('/faq/{id}', [FaqController::class, 'update'])->name('faq.update'); 
    Route::delete('/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

    // Common Settings
    Route::get('/common', [CommonSettingController::class, 'index'])->name('common.list');
    Route::get('/common/{id}/edit', [CommonSettingController::class, 'edit'])->name('common.edit'); 
    Route::put('/common/{id}', [CommonSettingController::class, 'update'])->name('common.update'); 
    Route::delete('/common/{id}', [CommonSettingController::class, 'destroy'])->name('common.destroy');

    // Event Routes
    Route::get('/event', [EventController::class, 'index'])->name('event.list');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event', [EventController::class, 'store'])->name('event.store'); 
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit'); 
    Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update'); 
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');

    // Web Banner Routes
    Route::get('/webbanner', [WebBannerController::class, 'index'])->name('webbanner.list');
    Route::get('/webbanner/create', [WebBannerController::class, 'create'])->name('webbanner.create');
    Route::post('/webbanner', [WebBannerController::class, 'store'])->name('webbanner.store'); 
    Route::get('/webbanner/{id}/edit', [WebBannerController::class, 'edit'])->name('webbanner.edit'); 
    Route::put('/webbanner/{id}', [WebBannerController::class, 'update'])->name('webbanner.update'); 
    Route::delete('/webbanner/{id}', [WebBannerController::class, 'destroy'])->name('webbanner.destroy');

    // Role Routes
    Route::get('/role', [RoleController::class, 'index'])->name('role.list');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    // Permission Routes
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission.list');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permission/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    

});
<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginMemberController;
use App\Http\Controllers\MenuHomeController;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::get('admin/users/logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::prefix('admin')->group(function () {


            Route::get('admin', [MainController::class, 'index'])->name('index');
            Route::get('admin/main', [MainController::class, 'index'])->name('main');

            #menu
            Route::prefix('menus')->group(function () {
                Route::get('add', [MenuController::class, 'create'])->name('menus.add');
                Route::post('add', [MenuController::class, 'store'])->name('menus.store');
                Route::get('list', [MenuController::class, 'index'])->name('menus.index');
                Route::get('edit/{menu}', [MenuController::class, 'show'])->name('menus.show');
                Route::post('edit/{menu}', [MenuController::class, 'update'])->name('menus.update');
                Route::DELETE('destroy', [MenuController::class, 'destroy'])->name('menus.destroy');

            });
            #product
            Route::prefix('products')->group(function () {
                Route::get('add', [ProductController::class, 'create']);
                Route::post('add', [ProductController::class, 'store']);
                Route::get('list', [ProductController::class, 'index']);
                Route::get('product_detail/{product}', [ProductController::class, 'show_detail']);
                Route::get('edit/{product}', [ProductController::class, 'show']);
                Route::post('edit/{product}', [ProductController::class, 'update']);
                Route::DELETE('destroy', [ProductController::class, 'destroy']);

            });
            #slider
            Route::prefix('sliders')->group(function () {
                Route::get('add', [SliderController::class, 'create']);
                Route::post('add', [SliderController::class, 'store']);
                Route::get('list', [SliderController::class, 'index']);
                Route::get('edit/{slider}', [SliderController::class, 'show']);
                Route::post('edit/{slider}', [SliderController::class, 'update']);
                Route::DELETE('destroy', [SliderController::class, 'destroy']);

            });
            #member
            Route::prefix('members')->group(function () {
                Route::get('add', [MemberController::class, 'create']);
                Route::post('add', [MemberController::class, 'store']);
                Route::get('list', [MemberController::class, 'index']);
                Route::get('member_detail/{member}', [MemberController::class, 'show_detail']);
                Route::get('edit/{member}', [MemberController::class, 'show']);
                Route::post('edit/{member}', [MemberController::class, 'update']);
                Route::DELETE('destroy', [MemberController::class, 'destroy']);
            });

            #employee
            Route::prefix('employees')->group(function () {
                Route::get('add', [EmployeeController::class, 'create']);
                Route::post('add', [EmployeeController::class, 'store']);
                Route::get('list', [EmployeeController::class, 'index']);
                Route::get('employee_detail/{employee}', [EmployeeController::class, 'show_detail']);
                Route::get('edit/{employee}', [EmployeeController::class, 'show']);
                Route::post('edit/{employee}', [EmployeeController::class, 'update']);
                Route::DELETE('destroy', [EmployeeController::class, 'destroy']);

            });

            #Information
            Route::prefix('infos')->group(function () {
                Route::get('info', [InfoController::class, 'index']);
                Route::get('edit/{info}', [InfoController::class, 'show_info']);
                Route::post('edit/{info}', [InfoController::class, 'update']);
            });
            #Contact
            Route::prefix('contacts')->group(function () {
                Route::get('contact', [ContactController::class, 'index']);
                Route::get('edit/{contact}', [ContactController::class, 'show_info']);
                Route::post('edit/{contact}', [ContactController::class, 'update']);
            });

            #upload
            Route::post('upload/services', [UploadController::class, 'store']);

            #cart
            Route::prefix('carts')->group(function () {
                Route::get('list', [\App\Http\Controllers\Admin\CartController::class, 'index']);
                Route::get('view/{cart}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
                Route::DELETE('destroy', [\App\Http\Controllers\Admin\CartController::class, 'destroy']);
                Route::post('update', [\App\Http\Controllers\Admin\CartController::class, 'update'])->name('cart.update');
            });
            #review
            Route::prefix('reviews')->group(function () {
                Route::get('list', [ReviewController::class, 'index']);
                Route::get('view/{product}', [ReviewController::class, 'show']);
                Route::post('update', [ReviewController::class, 'update'])->name('review.update');
            });
        });
    });
});


Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register/store', [RegisterController::class, 'store_register']);
Route::get('/member_login', [LoginMemberController::class, 'index'])->name('member_login');
Route::post('/login/store', [LoginMemberController::class, 'store']);
Route::get('/member_logout', [LoginMemberController::class, 'logout']);

Route::get('/', [HomeController::class, 'index'])->name('member');
Route::post('/services/load-product', [HomeController::class, 'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html', [MenuHomeController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [ProductHomeController::class, 'index'])->name('product_detail');
Route::post('san-pham/{id}-{slug}.html', [ProductHomeController::class, 'add_review']);
Route::get('list', [ProductHomeController::class, 'view_review']);

Route::get('search', [HomeController::class, 'search'])->name('member.search');


Route::get('/information', [InfoController::class, 'show']);
Route::get('/contact_show', [ContactController::class, 'show']);

Route::middleware(['auth:member'])->group(function () {

    Route::post('add-cart', [CartController::class, 'index']);
    Route::get('carts', [CartController::class, 'show']);
    Route::post('update-cart', [CartController::class, 'update']);
    Route::get('carts/delete/{id}', [CartController::class, 'remove']);
    Route::post('carts', [CartController::class, 'addCart']);
    Route::get('view', [CartController::class, 'view_history'])->name('history_cart');

});

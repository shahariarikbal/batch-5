<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{id}/{slug}', [FrontendController::class, 'productDetails']);
Route::get('/category/products/{id}/{slug}', [FrontendController::class, 'categoryProducts']);
Route::post('/add/to/cart', [FrontendController::class, 'addToCart']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
Route::get('/payment', [FrontendController::class, 'payment']);
Route::post('/cart/product/update/{id}', [FrontendController::class, 'updateCartProduct']);
Route::get('/cart/product/delete/{id}', [FrontendController::class, 'deleteCartProduct']);
Route::post('/order/place', [FrontendController::class, 'orderPlace']);
Route::get('/user/login-register', [FrontendController::class, 'userLoginRegister']);
Route::post('/user/registration', [FrontendController::class, 'userRegistration']);
Route::post('/user/login', [FrontendController::class, 'userLogin']);
Route::get('/forgot/password/form', [FrontendController::class, 'forgotPassword']);
Route::post('/forgot/password', [FrontendController::class, 'userForgotPassword']);
Route::get('/set-new-password/{id}', [FrontendController::class, 'setNewPassword']);
Route::post('/update/password', [FrontendController::class, 'updatePassword']);

Route::get('/admin/login', [AdminController::class, 'adminLoginForm']);
Route::post('/admin/login', [AdminController::class, 'adminLogin']);
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->middleware('admin');
Route::get('/admin/logout', [AdminController::class, 'adminLogout']);
Route::get('/orders', [AdminController::class, 'orders']);
Route::get('/order/view/{id}', [AdminController::class, 'orderView']);

Route::get('/category/add', [CategoryController::class, 'showCategoryForm']);
Route::get('/category/manage', [CategoryController::class, 'showAllCategory']);
Route::post('/category/store', [CategoryController::class, 'categoryStore']);
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate']);
Route::get('/category/active/{id}', [CategoryController::class, 'categoryInactive']);
Route::get('/category/inactive/{id}', [CategoryController::class, 'categoryActive']);
Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete']);

//Brand controller
Route::get('/brand/add', [BrandController::class, 'showBrandForm']);
Route::get('/brand/manage', [BrandController::class, 'showAllBrand']);
Route::post('/brand/store', [BrandController::class, 'brandStore']);
Route::get('/brand/edit/{id}', [BrandController::class, 'brandEdit']);
Route::post('/brand/update/{id}', [BrandController::class, 'brandUpdate']);
Route::get('/brand/active/{id}', [BrandController::class, 'brandInactive']);
Route::get('/brand/inactive/{id}', [BrandController::class, 'brandActive']);
Route::get('/brand/delete/{id}', [BrandController::class, 'brandDelete']);

//product controller
Route::get('/product/add', [ProductController::class, 'addProduct']);
Route::get('/product/manage', [ProductController::class, 'manageProduct']);
Route::post('/product/store', [ProductController::class, 'storeProduct']);
Route::get('/product/active/{id}', [ProductController::class, 'activeProduct']);
Route::get('/product/inactive/{id}', [ProductController::class, 'inactiveProduct']);

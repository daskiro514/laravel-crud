<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PaypalController;

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

Route::get('/', [CustomAuthController::class, 'index']);
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('products', [PaypalController::class, 'products'])->name('products');
Route::post('product-create', [PaypalController::class, 'createProduct'])->name('product.create');
Route::post('product-update', [PaypalController::class, 'updateProduct'])->name('product.update');
Route::get('plans', [PaypalController::class, 'plans'])->name('plans');
Route::get('subscriptions', [PaypalController::class, 'subscriptions'])->name('subscriptions');

<?php

use App\Http\Controllers\AboutFrontController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\IndustryController;
use App\Http\Controllers\admin\IndustryFaqController;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ServiceFaqController;
use App\Http\Controllers\admin\ProductFaqController;
use App\Http\Controllers\admin\BlogsController;

use App\Http\Controllers\usersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\superAdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndustryFrontController;
use App\Http\Controllers\ProductFrontController;
use App\Http\Controllers\ServiceFrontController;
use App\Http\Controllers\WhatsappController;


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

//Front route
Route::get('/', [dashboardController::class, 'index'])->name('/');

Route::get('/test', function () {
    return view('front.test');
});

Route::get('/about-vision', [dashboardController::class, 'aboutVision'])->name('about.vision');
Route::get('/product-1', [dashboardController::class, 'product1'])->name('product-1');
Route::get('/faq', [dashboardController::class, 'faq'])->name('faq');
Route::get('/blog', [dashboardController::class, 'blogs'])->name('blog');

Route::get('blog/{url}', [dashboardController::class, 'blogsdetail'])->name('blogdetail');

Route::get('product/{prod_url}', [ProductFrontController::class, 'show'])->name('products.show');
Route::get('industry/{ind_url}', [IndustryFrontController::class, 'show'])->name('industries.show');
Route::get('service/{ser_url}', [ServiceFrontController::class, 'show'])->name('services.show');
Route::get('about/', [AboutFrontController::class, 'show'])->name('about-us.show');


Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'contactStore'])->name('contact.store');
Route::get('/thank-you', [ContactController::class, 'thankyou'])->name('thankyou');
Route::post('/whatsapp-store', [WhatsappController::class, 'store']);

//backend route
Route::get('login', [dashboardController::class, 'login'])->name('login');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/user', [usersController::class, 'user'])->name('user');
	Route::get('/admin/dashboard', [dashboardController::class, 'admin'])->name('/admin/dashboard');
	Route::get('/superAdmin', [superAdminController::class, 'superAdmin'])->name('superAdmin');

	Route::get('/admin/dashboard', [adminController::class, 'admin'])->name('admin/dashboard');

	
	Route::resource('admin/home', HomeAdminController::class);
	Route::resource('admin/industry', IndustryController::class);
	Route::resource('admin/industryfaq', IndustryFaqController::class);
	Route::resource('admin/service', ServiceController::class);
	Route::resource('admin/servicefaq', ServiceFaqController::class);
	Route::resource('admin/about', AboutController::class);
	Route::resource('admin/product', ProductController::class);
	Route::resource('admin/productfaq', ProductFaqController::class);
    Route::resource('admin/blog', BlogsController::class);	



	Route::prefix('backend')->group(function () {
		Route::prefix('')->group(function (): void {});

		Route::prefix('')->group(function () {
			Route::get('admin-profile', [BackendController::class, 'adminProfile'])->name('admin-profile');
		});

		Route::get('help', [BackendController::class, 'help'])->name('help');
	});
});

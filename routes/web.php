<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultipictureController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Models\User;
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

// Load a page from Controller and using view
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/testimonial', [PageController::class, 'testimonial'])->name('testimonial');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');


// Admin Dashboard route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('admin.index', compact('users'));
})->name('dashboard');


// Slider routes
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/slider', SliderController::class);
    Route::resource('/service', ServiceController::class);
});






// Category routes
Route::resource('/category', CategoryController::class);
Route::get('/category/restore/{category}', [CategoryController::class, 'Restore'])->name('category.restore');
Route::post('/category/force-delete/{category}', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');

// Brand routes
Route::resource('/brand', BrandController::class);

// Multi Image routes
Route::get('/multi-image',[MultipictureController::class, 'index'])->name('multiimage.index');
Route::post('/multi-image/store',[MultipictureController::class, 'store'])->name('multiimage.store');
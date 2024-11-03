<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DecantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/review-videos', [VideoController::class, 'index'])->name('videos.index');

Route::get('/decants', [DecantController::class, 'index'])->name('decants.index');
Route::get('/decants/{id}', [DecantController::class, 'show'])->name('decants.show');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Admin Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', AdminMiddleware::class])->name('dashboard');


// Routes for Decants CRUD
Route::get('/dashboard/decants', [AdminController::class, 'decants'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants');
Route::post('/dashboard/decants', [AdminController::class, 'storeDecant'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants.store');
Route::get('/dashboard/decants/edit/{id}', [AdminController::class, 'editDecant'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants.edit');
Route::put('/dashboard/decants/update/{id}', [AdminController::class, 'updateDecant'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants.update');
Route::delete('/dashboard/decants/delete/{id}', [AdminController::class, 'deleteDecant'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants.delete');


Route::get('/dashboard/brands', [AdminController::class, 'brands'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands.brands');
Route::get('/dashboard/brands/create', [AdminController::class, 'createBrand'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands.create');
Route::post('/dashboard/brands', [AdminController::class, 'storeBrand'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands.store');
Route::get('/dashboard/brands/edit/{id}', [AdminController::class, 'editBrand'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands.edit');
Route::put('/dashboard/brands/update/{id}', [AdminController::class, 'updateBrand'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands.update');
Route::delete('/dashboard/brands/delete/{id}', [AdminController::class, 'deleteBrand'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands.delete');

Route::get('/dashboard/sizes', [AdminController::class, 'sizes'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes.sizes');
Route::get('/dashboard/sizes/create', [AdminController::class, 'createSize'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes.create');
Route::post('/dashboard/sizes', [AdminController::class, 'storeSize'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes.store');
Route::get('/dashboard/sizes/edit/{id}', [AdminController::class, 'editSize'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes.edit');
Route::put('/dashboard/sizes/update/{id}', [AdminController::class, 'updateSize'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes.update');
Route::delete('/dashboard/sizes/delete/{id}', [AdminController::class, 'deleteSize'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes.delete');

Route::get('/dashboard/prices', [AdminController::class, 'prices'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices.prices');
Route::get('/dashboard/prices/create', [AdminController::class, 'createPrice'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices.create');
Route::post('/dashboard/prices', [AdminController::class, 'storePrice'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices.store');
Route::get('/dashboard/prices/edit/{id}', [AdminController::class, 'editPrice'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices.edit');
Route::put('/dashboard/prices/update/{id}', [AdminController::class, 'updatePrice'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices.update');
Route::delete('/dashboard/prices/delete/{id}', [AdminController::class, 'deletePrice'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices.delete');


// Repeat similar routes for brands, sizes, and prices
Route::get('/dashboard/videos', [AdminController::class, 'videos'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.videos');
Route::get('/dashboard/videos/create', [AdminController::class, 'createVideo'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.videos.create');
Route::post('/dashboard/videos', [AdminController::class, 'storeVideo'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.videos.store');
Route::get('/dashboard/videos/edit/{id}', [AdminController::class, 'editVideo'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.videos.edit');
Route::put('/dashboard/videos/update/{id}', [AdminController::class, 'updateVideo'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.videos.update');
Route::delete('/dashboard/videos/delete/{id}', [AdminController::class, 'deleteVideo'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.videos.delete');



// Route::get('/dashboard/brands', [AdminController::class, 'brands'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands');

// Route::get('/dashboard/sizes', [AdminController::class, 'sizes'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes');

// Route::get('/dashboard/prices', [AdminController::class, 'prices'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices');

require __DIR__ . '/auth.php';

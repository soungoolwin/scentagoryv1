<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DecantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/review-videos', [VideoController::class, 'index'])->name('videos.index');

Route::get('/products/decants', [DecantController::class, 'index'])->name('decants.index');
Route::get('/products/decants/{id}', [DecantController::class, 'show'])->name('decants.show');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Admin Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', AdminMiddleware::class])->name('dashboard');


Route::get('/dashboard/decants', [AdminController::class, 'decants'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants.decants');
Route::get('/dashboard/decants/create', [AdminController::class, 'createDecant'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.decants.create');
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

// Repeat similar routes for brands, sizes, and prices



Route::get('/dashboard/brands', [AdminController::class, 'brands'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.brands');

Route::get('/dashboard/sizes', [AdminController::class, 'sizes'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.sizes');

Route::get('/dashboard/prices', [AdminController::class, 'prices'])->middleware(['auth', 'verified', AdminMiddleware::class])->name('admin.prices');

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PhotographyController;
use App\Http\Controllers\Admin\AlbumsController;
use App\Http\Controllers\ProfileController;
use App\Models\Photography;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['photographys' => Photography::orderByDesc('id')->paginate(10)]);
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('photographys', PhotographyController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('albums', AlbumsController::class);
    });




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

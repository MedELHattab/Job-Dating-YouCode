<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::post('/create-company', [CompaniesContcompaniesroller::class, 'create']);
// Route::post('/destroy-company', [CompaniesController::class, 'destroy']);


// Route::post('/create-announcements', [AnnouncementsController::class, 'create']);
// Route::post('/destroy-announcements', [AnnouncementsController::class, 'destroy']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource("companies", CompaniesController::class, [
        'names'=>[
            'index' => "companies",
        ]
    ]);

    Route::resource("announcements", AnnouncementsController::class, [
        'names'=>[
            'index' => "announcements",
        ]
    ]);

    // Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
    // Route::get('/announcements/create', [AnnouncementsController::class, 'create'])->name('announcements.create');
    // Route::get('/announcements/show', [AnnouncementsController::class, 'show'])->name('announcements.show');
    // Route::post('/announcements/store', [AnnouncementsController::class, 'store'])->name('announcements.store');
    // Route::put('/announcements/edit', [AnnouncementsController::class, 'edit'])->name('announcements.edit');
    // Route::delete('/announcements/destroy', [AnnouncementsController::class, 'destroy'])->name('announcements.destroy');
   
    

});

require __DIR__.'/auth.php';

// Route::resource('companies', CompaniesController::class);
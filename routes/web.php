<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillsController;
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
Route::get('/allannouncements', [AnnouncementsController::class, 'allann'])->name('allannouncements');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::get('/student', function () {
    return view('student');
})->middleware(['auth', 'verified', 'role:student'])->name('student');


// Route::post('/create-company', [CompaniesContcompaniesroller::class, 'create']);
// Route::post('/destroy-company', [CompaniesController::class, 'destroy']);


// Route::post('/create-announcements', [AnnouncementsController::class, 'create']);
// Route::post('/destroy-announcements', [AnnouncementsController::class, 'destroy']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/skills/myskills', [SkillsController::class, 'myskills'])->name('skills.myskills');
    Route::put('/skills/updateMyskills', [SkillsController::class, 'updateMyskills'])->name('skills.updateMyskills');
    Route::get('/announcements/myapplications', [AnnouncementsController::class, 'myapplications'])->name('announcements.myapplications');
    Route::put('/announcements/{announcement}/apply', [AnnouncementsController::class, 'apply'])->name('announcements.apply');
    Route::get('/companies/archive', [CompaniesController::class, 'archive'])->name('companies.archive');
    Route::get('/skills/archive', [SkillsController::class, 'archive'])->name('skills.archive');
    Route::get('/announcements/archive', [AnnouncementsController::class, 'archive'])->name('announcements.archive');
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
    Route::resource("skills", SkillsController::class, [
        'names'=>[
            'index' => "skills",
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
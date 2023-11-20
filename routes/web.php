<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrgController;
use App\Http\Middleware\Admin;

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

Route::get('/', function() {
    return view ('auth.login');
});



Route::get('/home', [AdminController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/judge', [AdminController::class, 'judge'])->middleware(['auth', 'admin'])->name('admin.judge');

    Route::get('/committee', [AdminController::class, 'committee'])->middleware(['auth', 'admin'])->name('admin.committee');

    Route::get('/organizer', [AdminController::class, 'organizer'])->middleware(['auth', 'admin'])->name('admin.organizer');

    Route::get('/event', [AdminController::class, 'event'])->middleware(['auth', 'admin'])->name('admin.event');
});

Route::post('/organizer/register', [OrgController::class, 'create'])->middleware('auth')->name('organizer.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/org/login', [OrgController::class, 'showLoginForm'])->name('org.login');
Route::post('/org/login', [OrgController::class, 'login']);
Route::get('/org/dashboard', [OrgController::class, 'dashboard'])->name('organizer.dashboard');
Route::post('/org/logout', [OrgController::class, 'logout'])->name('logout');

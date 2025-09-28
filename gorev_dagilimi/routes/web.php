<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DutiesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Burada uygulamanın web route’ları tanımlanır.
|
*/

// Kayıt
Route::get('/register', [RegisterController::class, 'showForm'])->name('kaydol.form');
Route::post('/register', [RegisterController::class, 'processForm'])->name('kaydol.process');

// Giriş
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('giris.process');

// Anasayfa
Route::get('/', function () {return view('index');});



ROute::middleware(['auth'])->group(function(){
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    });


    Route::prefix('duties')->group(function () {
        Route::get('', [DutiesController::class, 'index'])->name('duties.index');
        Route::get('/create', [DutiesController::class, 'create'])->name('duties.create');
        Route::get('/{id}/edit', [DutiesController::class, 'edit'])->name('duties.edit');
        Route::post('/store', [DutiesController::class, 'store'])->name('duties.store');
        Route::post('/update/{id}', [DutiesController::class, 'update'])->name('duties.update');
        Route::delete('/delete/{id}', [DutiesController::class, 'delete'])->name('duties.delete');

    });

    Route::prefix('assignments')->group(function () {
        Route::get('', [AssignmentsController::class, 'index'])->name('assignments.index');
        Route::get('/create', [AssignmentsController::class, 'create'])->name('assignments.create');
        Route::get('{id}/edit', [AssignmentsController::class, 'edit'])->name('assignments.edit');
        Route::post('/storesend-duty', [AssignmentsController::class, 'store'])->name('assignments.store');
        Route::put('/update/{id}', [AssignmentsController::class, 'update'])->name('assignments.update');
        Route::delete('/delete/{id}', [AssignmentsController::class, 'delete'])->name('assignments.delete');

    });



    Route::post('/logout', function () {Auth::logout();return redirect('/login');})->name('logout');



    Route::get('/personel', function () {return view('personel');});


   Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/{id}/password', [ProfileController::class, 'edit_password'])->name('password.edit');
    Route::put('/{id}/password', [ProfileController::class, 'update_password'])->name('password.update');
});


});


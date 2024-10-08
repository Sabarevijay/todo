<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Filament\Http\Middleware\Authenticate;
use Filament\Pages\Dashboard;
use App\Http\Controllers\Admin\LoginController;


Route::get('/', function () {
    return redirect('/admin/login');
    //return redirect('/task/index');

});

// Route::get('/admin', function () {
//     return redirect('/tasks');
// });

// Route::get('/task/index', function () {
//     return view('task.index');
// });
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware([Authenticate::class])
    ->prefix('admin') 
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('filament.pages.dashboard');
    });

   

Route::post('/admin/register', [LoginController::class, 'register'])->name('admin.register.post');
Route::get('/admin/register', [LoginController::class, 'showRegistrationForm'])->name('admin.register');  

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::middleware(['auth']) // Protect these routes
    ->group(function () {
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    });
// Route::get('/task/index', [TaskController::class, 'index'])->name('tasks.index');
// Route::post('/task/index', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::resource('tasks', TaskController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::match(['get', 'head'], '/', function () {
    return view('home');
});

Route::get('admin/manage-services', [ServiceController::class, 'manage'])->name('manage.services');

Route::resource('services', ServiceController::class)->except(['update', 'destroy']);

Route::put('admin/services/{service}', [ServiceController::class, 'update'])->name('services.update');

Route::delete('admin/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

Route::get('admin/manage-clients', [ClientController::class, 'manage'])->name('manage.clients');

Route::resource('clients', ClientController::class)->except(['update', 'destroy']);

Route::get('/manage_clients', [ClientController::class, 'manage'])->name('clients.manage');

Route::put('admin/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

Route::delete('admin/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('admin/view-messages', [ContactController::class, 'index'])->name('view.messages');

Route::post('logout', function () {
    session()->flush(); 
    return redirect('/'); 
})->name('logout');

Route::get('/admin/messages', [ContactController::class, 'index'])->name('messages.index');
Route::delete('/admin/messages/{id}', [ContactController::class, 'destroy'])->name('messages.destroy');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('login', [AuthController::class, 'login'])->name('login.submit');

Route::get('admin/home', [AdminController::class, 'index'])->name('admin_home');

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', function () {
    return view('contact');
});

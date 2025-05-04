<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminPanel\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\AdminPanel\UserController as AdminUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Cases of auth user (hardcoded)
Auth::loginUsingId(3);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/invoices/id/{id}', [InvoiceController::class, 'show']);
Route::get('/invoices/create', [InvoiceController::class, 'create']);
Route::post('/invoices/create', [InvoiceController::class, 'store']);


Route::get('/admin/invoices/create', [AdminInvoiceController::class, 'create']);
Route::post('/admin/invoices/create', [AdminInvoiceController::class, 'store'])->name('invoices.create');
Route::get('/admin/invoices/', [AdminInvoiceController::class, 'index']);
Route::get('/admin/invoices/{id}', [AdminInvoiceController::class, 'show']);
Route::get('/admin/invoices/users/{user}', [AdminInvoiceController::class, 'getByUser']);
Route::get('/admin/invoices/edit/{id}', [AdminInvoiceController::class, 'edit']);
Route::put('/admin/invoices/edit/{id}', [AdminInvoiceController::class, 'update'])->name('invoices.update');
Route::delete('/admin/invoices/delete/{id}', [AdminInvoiceController::class, 'delete'])->name('invoices.destroy');

Route::get('/users', [AdminUserController::class, 'index']);
Route::get('/users/id/{id}', [AdminUserController::class, 'show']);
Route::get('/users/create', [AdminUserController::class, 'create']);
Route::post('/users/create', [AdminUserController::class, 'store']);



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


Route::get('/invoices/users/', [AdminInvoiceController::class, 'index']);
Route::get('/invoices/users/{user}', [AdminInvoiceController::class, 'byUser']);

Route::get('/users', [AdminUserController::class, 'index']);
Route::get('/users/id/{id}', [AdminUserController::class, 'show']);
Route::get('/users/create', [AdminUserController::class, 'create']);
Route::post('/users/create', [AdminUserController::class, 'store']);



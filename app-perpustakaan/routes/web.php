<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung diarahkan ke daftar buku
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Resource routes untuk CRUD standar
Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('loans', LoanController::class);

// BARIS BARU (BAGIAN 3): Route khusus untuk fitur kembalikan buku
Route::patch('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])->name('loans.kembalikan');
<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);

// Mengubah menjadi Route::put
Route::put('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])->name('loans.kembalikan');

Route::resource('loans', LoanController::class);
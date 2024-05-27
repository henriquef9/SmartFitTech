<?php

use App\Http\Controllers\admin\AlunoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');

    Route::put('/aluno/{id}', [AlunoController::class, 'update'])->name('aluno.update');

    // rota não é mais necessaria
    Route::get('/aluno/{id}/edit', [AlunoController::class, 'edit'])->name('aluno.edit');
    // rota não é mais necessaria
    Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');

    Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');

    Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
});

require __DIR__.'/auth.php';

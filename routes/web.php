<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('index.task');

Route::prefix('task')->group(function () {
    Route::get('/create', [TaskController::class, 'create'])->name('create.task');
    Route::post('/store', [TaskController::class, 'store'])->name('store.task');
    Route::get('/{TaskId}/edit', [TaskController::class, 'edit'])->name('edit.task');
    Route::put('/{TaskId}/update', [TaskController::class, 'update'])->name('update.task');
    Route::post('/{TaskId}/delete', [TaskController::class, 'destroy'])->name('destroy.task');
});

<?php

use App\Http\Controllers\Documents\DocumentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Document Management Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // List and viewing routes (no special permission needed)
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::get('downloadbyshortname/{shortname}', [DocumentController::class, 'downloadByShortName'])->name('downloadByShortName');

    // Management routes (require 'manage assets' permission)
    Route::middleware(['permission:manage assets'])->group(function () {
        // IMPORTANT: 'create' must come BEFORE '{document}' routes
        Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
        Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');

        // Trashed documents routes
        Route::get('documents-trashed', [DocumentController::class, 'trashed'])->name('documents.trashed');
        Route::post('documents/{id}/restore', [DocumentController::class, 'restore'])->name('documents.restore');
        Route::delete('documents/{id}/force-delete', [DocumentController::class, 'forceDelete'])->name('documents.force-delete');

        // Edit and delete routes
        Route::get('documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
        Route::put('documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
        Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    });

    // Show route (at the end, no permission needed)
    Route::get('documents/{document}', [DocumentController::class, 'show'])->name('documents.show');
});
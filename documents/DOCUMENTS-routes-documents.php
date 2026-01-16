<?php

use App\Http\Controllers\Documents\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Document Management Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // Resource routes for documents
    Route::resource('documents', DocumentController::class);
    
    // Trashed documents routes
    Route::get('documents-trashed', [DocumentController::class, 'trashed'])->name('documents.trashed');
    Route::post('documents/{id}/restore', [DocumentController::class, 'restore'])->name('documents.restore');
    Route::delete('documents/{id}/force-delete', [DocumentController::class, 'forceDelete'])->name('documents.force-delete');
    
    // Download routes
    Route::get('documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
    Route::get('downloadbyshortname/{shortname}', [DocumentController::class, 'downloadByShortName'])->name('downloadByShortName');
});

<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\NoteTemplateController;
use App\Http\Controllers\Api\TagController;
// routes/api.php
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Chat Cleanup API Routes
|--
*/

Route::post('/chat/cleanup-sessions', function (Request $request) {
    $userId = $request->input('user_id');

    \Log::info('🧹 Cleaning up chat sessions for user: '.$userId);

    // Find all active chat sessions involving this user
    $sessions = \App\Models\ChatSession::where('is_active', true)
        ->where(function ($query) use ($userId) {
            $query->where('user1_id', $userId)
                ->orWhere('user2_id', $userId);
        })
        ->get();

    $deletedCount = 0;

    foreach ($sessions as $session) {
        try {
            \Log::info('🗑️ Deleting session: '.$session->id);

            // Delete all messages in this session
            $messageCount = $session->messages()->count();
            $session->messages()->delete();

            \Log::info("  - Deleted {$messageCount} messages");

            // Delete the session itself
            $session->delete();

            \Log::info('  ✅ Session deleted successfully');

            $deletedCount++;
        } catch (\Exception $e) {
            \Log::error('❌ Error deleting session '.$session->id.': '.$e->getMessage());
        }
    }

    // Also delete any pending chat requests involving this user
    $requestsDeleted = \App\Models\ChatRequest::where('status', 'pending')
        ->where(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                ->orWhere('receiver_id', $userId);
        })
        ->delete();

    \Log::info("🗑️ Deleted {$requestsDeleted} pending chat requests");

    \Log::info("✅ Cleanup complete: {$deletedCount} sessions deleted, {$requestsDeleted} requests deleted");

    return response()->json([
        'success' => true,
        'sessions_deleted' => $deletedCount,
        'requests_deleted' => $requestsDeleted,
        'message' => "Cleaned up {$deletedCount} sessions and {$requestsDeleted} requests for user {$userId}",
    ]);
});

/*
|--------------------------------------------------------------------------
| Notes API
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {

    // Notes CRUD
    Route::apiResource('notes', NoteController::class);

    // Note specific actions
    Route::post('notes/{note}/toggle-pin', [NoteController::class, 'togglePin'])->name('notes.toggle-pin');
    Route::post('notes/{note}/share', [NoteController::class, 'share'])->name('notes.share');
    Route::delete('notes/{note}/shares/{share}', [NoteController::class, 'removeShare'])->name('notes.remove-share');
    Route::get('notes/{note}/export/{format}', [NoteController::class, 'export'])->name('notes.export');

    // Shared notes views
    Route::get('notes-shared-with-me', [NoteController::class, 'sharedWithMe'])->name('notes.shared-with-me');
    Route::get('notes-shared-by-me', [NoteController::class, 'sharedByMe'])->name('notes.shared-by-me');

    // Categories CRUD
    Route::apiResource('categories', CategoryController::class);

    // Tags CRUD
    Route::apiResource('tags', TagController::class);

    // Templates CRUD
    Route::apiResource('templates', NoteTemplateController::class);
    Route::post('templates/{template}/use', [NoteTemplateController::class, 'createFromTemplate'])->name('templates.use');

    // Search
    Route::get('search', [NoteController::class, 'search'])->name('search');

    // Statistics
    Route::get('statistics', function () {
        return response()->json([
            'total_notes' => \App\Models\Note::where('user_id', auth()->id())->count(),
            'pinned_notes' => \App\Models\Note::where('user_id', auth()->id())->where('is_pinned', true)->count(),
            'total_categories' => \App\Models\Category::where('user_id', auth()->id())->count(),
            'total_tags' => \App\Models\Tag::where('user_id', auth()->id())->count(),
            'total_attachments' => \App\Models\NoteAttachment::whereHas('note', function ($q) {
                $q->where('user_id', auth()->id());
            })->count(),
            'storage_used' => \App\Models\NoteAttachment::whereHas('note', function ($q) {
                $q->where('user_id', auth()->id());
            })->sum('size'),
            'active_shares' => \App\Models\NoteShare::where('shared_by', auth()->id())
                ->orWhere('shared_with', auth()->id())
                ->active()
                ->count(),
        ]);
    })->name('statistics');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'loginApi']);
Route::post('/create-post', [BlogPostController::class, 'storeNewPostApi'])->middleware('auth:sanctum');
Route::delete('/delete-post/{post}', [BlogPostController::class, 'deleteApi'])->middleware('auth:sanctum', 'can:delete,post');

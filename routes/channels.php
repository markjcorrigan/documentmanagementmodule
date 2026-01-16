<?php
use App\Events\VisitorConnected;
use App\Models\ChatSession;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// ============================================================================
// LEGACY ROUTE PROTECTION: Don't load broadcast channels for legacy blog routes
// ============================================================================
$currentPath = request()->path();

$legacyRoutes = [
//    'portfolio',
    'contact',
    'store-contact-message',
    'dashboard',
    'all-post',
    'blogsbyauthor',
    'add-post',
    'store-post',
    'edit-post',
    'update-post',
    'delete-post',
    'update-post-status',
    'user-comments',
    'comment-status-update',
    'contact-message',
    'delete-contact',
];

$isLegacyRoute = false;
foreach ($legacyRoutes as $route) {
    if ($currentPath === $route || str_starts_with($currentPath, $route . '/')) {
        $isLegacyRoute = true;
        break;
    }
}

// If this is a legacy route, don't load broadcast channels at all
if ($isLegacyRoute) {
    return;
}

// ============================================================================
// NEW BLOG BROADCAST CHANNELS (only loaded for non-legacy routes)
// ============================================================================

// Private channel for individual chat sessions
Broadcast::channel('chat-session.{sessionId}', function (User $user, int $sessionId) {
    \Log::info('🎯 User joining chat-session channel', [
        'user_id' => $user->id,
        'session_id' => $sessionId
    ]);

    $session = ChatSession::find($sessionId);

    if (!$session) {
        \Log::warning('❌ Chat session not found', ['session_id' => $sessionId]);
        return false;
    }

    // Only allow users who are part of this chat session
    if ($session->user1_id === $user->id || $session->user2_id === $user->id) {
        \Log::info('✅ User authorized for chat session', [
            'user_id' => $user->id,
            'session_id' => $sessionId
        ]);
        return [
            'id' => $user->id,
            'name' => $user->name,
        ];
    }

    \Log::warning('❌ User not authorized for chat session', [
        'user_id' => $user->id,
        'session_id' => $sessionId
    ]);

    return false;
});

// Presence channel for online users list
Broadcast::channel('online-users', function (User $user) {
    \Log::info('🎯 User joining online-users channel', ['user_id' => $user->id]);

    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ];
});

// Alternative presence channel (can remove if not used)
Broadcast::channel('presence-online-users', function (User $user) {
    \Log::info('🎯 User joining presence-online-users channel', [
        'user_id' => $user->id,
        'username' => $user->name,
    ]);

    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ];
});

// Private channel for individual user notifications
Broadcast::channel('user.{userId}', function (User $user, $userId) {
    \Log::info('🎯 User joining user.{userId} channel', [
        'user_id' => $user->id,
        'requested_userId' => $userId
    ]);

    $authorized = (int)$user->id === (int)$userId;

    if ($authorized) {
        \Log::info('✅ User authorized for private channel');
    } else {
        \Log::warning('❌ User not authorized for private channel', [
            'user_id' => $user->id,
            'requested_userId' => $userId
        ]);
    }

    return $authorized;
});
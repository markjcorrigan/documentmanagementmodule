<?php

/**
 * Chat Component Usage Analyzer
 *
 * Run: php analyze-chat-usage.php
 *
 * Scans your Laravel app to find which chat components are actually being used
 */
echo "=== CHAT COMPONENT USAGE ANALYZER ===\n\n";

$basePath = __DIR__;

// Define all chat components
$components = [
    'views' => [
        'chat-dashboard.blade.php',
        'chat-requests.blade.php',
        'chat-window.blade.php',
        'online-user-count-badge.blade.php',
        'online-user-count-menu.blade.php',
        'online-user-count.blade.php',
        'online-users.blade.php',
        'presence-tracker.blade.php',
    ],
    'controllers' => [
        'ChatDashboard.php',
        'ChatRequests.php',
        'ChatWindow.php',
        'OnlineUserCount.php',
        'OnlineUserCountBadge.php',
        'OnlineUserCountMenu.php',
        'OnlineUsers.php',
        'PresenceTracker.php',
    ],
];

// Map component names to Livewire names
$componentMap = [
    'ChatDashboard.php' => 'chat.chat-dashboard',
    'ChatRequests.php' => 'chat.chat-requests',
    'ChatWindow.php' => 'chat.chat-window',
    'OnlineUserCount.php' => 'chat.online-user-count',
    'OnlineUserCountBadge.php' => 'chat.online-user-count-badge',
    'OnlineUserCountMenu.php' => 'chat.online-user-count-menu',
    'OnlineUsers.php' => 'chat.online-users',
    'PresenceTracker.php' => 'chat.presence-tracker',
];

$results = [];

// Search patterns
$searchPatterns = [
    '@livewire',
    '<livewire:',
    'Livewire::',
    'Route::',
];

// Directories to search
$searchDirs = [
    'resources/views',
    'routes',
    'app/Http/Controllers',
];

echo "Searching for component usage...\n\n";

foreach ($componentMap as $controller => $livewireName) {
    $found = false;
    $locations = [];

    foreach ($searchDirs as $dir) {
        $fullDir = $basePath.'/'.$dir;

        if (! is_dir($fullDir)) {
            continue;
        }

        // Search for @livewire('component-name')
        $cmd = "grep -r \"@livewire('$livewireName\" \"$fullDir\" 2>/dev/null";
        exec($cmd, $output1);

        // Search for <livewire:component-name
        $cmd = "grep -r \"<livewire:$livewireName\" \"$fullDir\" 2>/dev/null";
        exec($cmd, $output2);

        // Search for wire:navigate or href containing component
        $cmd = "grep -r \"$livewireName\" \"$fullDir\" 2>/dev/null";
        exec($cmd, $output3);

        $allOutput = array_merge($output1, $output2, $output3);

        if (! empty($allOutput)) {
            $found = true;
            foreach ($allOutput as $line) {
                if (strpos($line, $livewireName) !== false) {
                    $locations[] = $line;
                }
            }
        }

        // Clear output arrays
        $output1 = $output2 = $output3 = [];
    }

    $results[$controller] = [
        'found' => $found,
        'locations' => array_unique($locations),
    ];
}

// Display results
echo "--- COMPONENT USAGE RESULTS ---\n\n";

$used = [];
$unused = [];

foreach ($results as $component => $data) {
    if ($data['found']) {
        $used[] = $component;
        echo "✓ USED: $component\n";
        if (! empty($data['locations'])) {
            echo "  Found in:\n";
            foreach (array_slice($data['locations'], 0, 5) as $location) {
                echo '    • '.substr($location, 0, 120)."\n";
            }
            if (count($data['locations']) > 5) {
                echo '    ... and '.(count($data['locations']) - 5)." more locations\n";
            }
        }
        echo "\n";
    } else {
        $unused[] = $component;
    }
}

if (! empty($unused)) {
    echo "--- POTENTIALLY UNUSED COMPONENTS ---\n\n";
    foreach ($unused as $component) {
        echo "✗ NOT FOUND: $component\n";
    }
    echo "\n";
}

// Analyze duplicates
echo "--- DUPLICATE FUNCTIONALITY ANALYSIS ---\n\n";

$onlineCountComponents = [
    'OnlineUserCount.php',
    'OnlineUserCountBadge.php',
    'OnlineUserCountMenu.php',
];

echo "Online User Count Components:\n";
$foundOnlineCount = false;
foreach ($onlineCountComponents as $comp) {
    if (in_array($comp, $used)) {
        echo "  ✓ $comp (IN USE)\n";
        $foundOnlineCount = true;
    } else {
        echo "  ✗ $comp (not found)\n";
    }
}

if ($foundOnlineCount) {
    echo "\n  💡 ANALYSIS: You have multiple 'online user count' components.\n";
    echo "     These likely serve different purposes:\n";
    echo "     - Badge: Small indicator with count\n";
    echo "     - Menu: Dropdown showing online users\n";
    echo "     - Base: Main component logic\n";
    echo "     Only remove if truly redundant!\n";
}

echo "\n--- PRESENCE TRACKING ---\n\n";
if (in_array('PresenceTracker.php', $used)) {
    echo "✓ PresenceTracker.php is in use\n";
    echo "  This likely handles the WebSocket presence connection\n";
} else {
    echo "✗ PresenceTracker.php not found\n";
    echo "  ⚠️  WARNING: You might need this for presence to work!\n";
}

// Summary
echo "\n=== SUMMARY ===\n\n";
echo 'Total Components: '.count($componentMap)."\n";
echo 'In Use: '.count($used)."\n";
echo 'Not Found: '.count($unused)."\n";

if (! empty($unused)) {
    echo "\n⚠️  BEFORE DELETING:\n";
    echo "1. Components might be loaded dynamically (check JS files)\n";
    echo "2. Some might be included via @include or wire:navigate routes\n";
    echo "3. Test thoroughly after removing any files\n";
    echo "4. Keep backups!\n";
}

echo "\n💡 RECOMMENDATION:\n";
echo "Focus on getting Reverb working FIRST, then clean up unused files.\n";
echo "File cleanup is cosmetic - Reverb functionality is the real goal!\n";

echo "\n=== END ANALYSIS ===\n";

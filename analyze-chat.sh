#!/bin/bash
# Chat Component Usage Analyzer for Git Bash on Windows
# Run from project root: cd /c/xampp/htdocs/pmway.hopto.org && bash analyze-chat.sh

echo "=== CHAT COMPONENT USAGE ANALYZER ==="
echo ""

# Components to search for (format: "ClassName:livewire-name")
components=(
    "ChatDashboard:chat.chat-dashboard"
    "ChatRequests:chat.chat-requests"
    "ChatWindow:chat.chat-window"
    "OnlineUserCount:chat.online-user-count"
    "OnlineUserCountBadge:chat.online-user-count-badge"
    "OnlineUserCountMenu:chat.online-user-count-menu"
    "OnlineUsers:chat.online-users"
    "PresenceTracker:chat.presence-tracker"
)

# Directories to search
search_dirs=(
    "resources/views"
    "routes"
    "app/Http/Controllers"
)

echo "Searching for component usage..."
echo ""

declare -A results_found
declare -A results_count

# Search for each component
for comp_pair in "${components[@]}"; do
    IFS=':' read -r class_name livewire_name <<< "$comp_pair"
    
    found=0
    count=0
    
    for dir in "${search_dirs[@]}"; do
        if [ -d "$dir" ]; then
            # Search for @livewire('component-name')
            matches=$(find "$dir" -type f \( -name "*.blade.php" -o -name "*.php" \) -exec grep -l "@livewire('$livewire_name" {} \; 2>/dev/null)
            if [ ! -z "$matches" ]; then
                found=1
                count=$((count + $(echo "$matches" | wc -l)))
            fi
            
            # Search for <livewire:component-name
            matches=$(find "$dir" -type f \( -name "*.blade.php" -o -name "*.php" \) -exec grep -l "<livewire:$livewire_name" {} \; 2>/dev/null)
            if [ ! -z "$matches" ]; then
                found=1
                count=$((count + $(echo "$matches" | wc -l)))
            fi
            
            # Search for any reference to livewire name
            matches=$(find "$dir" -type f \( -name "*.blade.php" -o -name "*.php" \) -exec grep -l "$livewire_name" {} \; 2>/dev/null)
            if [ ! -z "$matches" ]; then
                found=1
                count=$((count + $(echo "$matches" | wc -l)))
            fi
        fi
    done
    
    results_found[$class_name]=$found
    results_count[$class_name]=$count
done

echo "--- COMPONENT USAGE RESULTS ---"
echo ""

used=()
unused=()

for comp_pair in "${components[@]}"; do
    IFS=':' read -r class_name livewire_name <<< "$comp_pair"
    
    if [ "${results_found[$class_name]}" -eq 1 ]; then
        used+=("$class_name")
        echo "✓ USED: $class_name (${results_count[$class_name]} references)"
        
        # Show where it's used
        for dir in "${search_dirs[@]}"; do
            if [ -d "$dir" ]; then
                files=$(find "$dir" -type f \( -name "*.blade.php" -o -name "*.php" \) -exec grep -l "$livewire_name" {} \; 2>/dev/null)
                if [ ! -z "$files" ]; then
                    echo "$files" | head -3 | while read file; do
                        echo "    • $file"
                    done
                fi
            fi
        done
        echo ""
    else
        unused+=("$class_name")
    fi
done

if [ ${#unused[@]} -gt 0 ]; then
    echo "--- POTENTIALLY UNUSED COMPONENTS ---"
    echo ""
    for comp in "${unused[@]}"; do
        echo "✗ NOT FOUND: $comp"
    done
    echo ""
fi

# Analyze duplicates
echo "--- DUPLICATE FUNCTIONALITY ANALYSIS ---"
echo ""
echo "Online User Count Components:"
online_comps=("OnlineUserCount" "OnlineUserCountBadge" "OnlineUserCountMenu")
for comp in "${online_comps[@]}"; do
    if [[ " ${used[@]} " =~ " ${comp} " ]]; then
        echo "  ✓ $comp (IN USE - ${results_count[$comp]} refs)"
    else
        echo "  ✗ $comp (not found)"
    fi
done

echo ""
echo "💡 ANALYSIS: You have multiple 'online user count' components."
echo "   These likely serve different purposes:"
echo "   - Badge: Small indicator with count"
echo "   - Menu: Dropdown showing online users"
echo "   - Base: Main component logic"
echo "   Only remove if truly redundant!"

echo ""
echo "--- PRESENCE TRACKING ---"
echo ""
if [[ " ${used[@]} " =~ " PresenceTracker " ]]; then
    echo "✓ PresenceTracker is in use (${results_count[PresenceTracker]} refs)"
    echo "  This handles the WebSocket presence connection"
else
    echo "✗ PresenceTracker not found"
    echo "  ⚠️  WARNING: You might need this for presence to work!"
fi

# Summary
echo ""
echo "=== SUMMARY ==="
echo ""
echo "Total Components: ${#components[@]}"
echo "In Use: ${#used[@]}"
echo "Not Found: ${#unused[@]}"

if [ ${#unused[@]} -gt 0 ]; then
    echo ""
    echo "⚠️  BEFORE DELETING:"
    echo "1. Components might be loaded dynamically (check JS files)"
    echo "2. Some might be included via @include or routes"
    echo "3. Test thoroughly after removing any files"
    echo "4. Keep backups!"
fi

echo ""
echo "=== FILES IN LIVEWIRE/CHAT FOLDER ==="
echo ""
echo "Components (app/Livewire/Chat/):"
ls -lh app/Livewire/Chat/ 2>/dev/null | grep -v "^total" | grep -v "^d"

echo ""
echo "Views (resources/views/livewire/chat/):"
ls -lh resources/views/livewire/chat/ 2>/dev/null | grep -v "^total" | grep -v "^d"

echo ""
echo "🚨 SUSPICIOUS FILES:"
if [ -f "app/Livewire/Chat/index.html" ]; then
    echo "  ✗ app/Livewire/Chat/index.html (SHOULD NOT BE HERE)"
fi
if [ -f "app/Livewire/Chat/index.php" ]; then
    echo "  ✗ app/Livewire/Chat/index.php (SHOULD NOT BE HERE)"
fi

echo ""
echo "=== END ANALYSIS ==="

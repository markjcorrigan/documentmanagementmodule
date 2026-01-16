#!/bin/bash

# Laravel CSRF Fix Script
# Run this from your Laravel project root directory

echo "🔧 Laravel CSRF Token Fix Script"
echo "=================================="
echo ""

# Color codes
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Step 1: Clear all caches
echo "Step 1: Clearing all caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
echo -e "${GREEN}✓ Caches cleared${NC}"
echo ""

# Step 2: Clear session files
echo "Step 2: Clearing session files..."
if [ -d "storage/framework/sessions" ]; then
    rm -rf storage/framework/sessions/*
    echo -e "${GREEN}✓ Session files cleared${NC}"
else
    echo -e "${RED}✗ Session directory not found${NC}"
fi
echo ""

# Step 3: Clear cache data
echo "Step 3: Clearing cache data..."
if [ -d "storage/framework/cache/data" ]; then
    rm -rf storage/framework/cache/data/*
    echo -e "${GREEN}✓ Cache data cleared${NC}"
else
    echo -e "${YELLOW}⚠ Cache data directory not found${NC}"
fi
echo ""

# Step 4: Clear bootstrap cache
echo "Step 4: Clearing bootstrap cache..."
if [ -d "bootstrap/cache" ]; then
    rm -rf bootstrap/cache/*.php
    echo -e "${GREEN}✓ Bootstrap cache cleared${NC}"
else
    echo -e "${RED}✗ Bootstrap cache directory not found${NC}"
fi
echo ""

# Step 5: Fix permissions
echo "Step 5: Fixing storage permissions..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache
echo -e "${GREEN}✓ Permissions set to 775${NC}"
echo ""

# Step 6: Check ownership (requires sudo)
echo "Step 6: Fixing ownership..."
read -p "Do you want to change ownership to www-data? (y/n): " -n 1 -r
echo ""
if [[ $REPLY =~ ^[Yy]$ ]]; then
    sudo chown -R www-data:www-data storage
    sudo chown -R www-data:www-data bootstrap/cache
    echo -e "${GREEN}✓ Ownership changed to www-data${NC}"
else
    echo -e "${YELLOW}⚠ Skipped ownership change${NC}"
fi
echo ""

# Step 7: Check .env settings
echo "Step 7: Checking .env configuration..."
echo "Current settings:"

if grep -q "^APP_URL=" .env; then
    APP_URL=$(grep "^APP_URL=" .env | cut -d '=' -f2-)
    echo "  APP_URL=${APP_URL}"
else
    echo -e "  ${RED}APP_URL not found in .env${NC}"
fi

if grep -q "^SESSION_DRIVER=" .env; then
    SESSION_DRIVER=$(grep "^SESSION_DRIVER=" .env | cut -d '=' -f2-)
    echo "  SESSION_DRIVER=${SESSION_DRIVER}"
else
    echo -e "  ${YELLOW}SESSION_DRIVER not set (using default: file)${NC}"
fi

if grep -q "^SESSION_DOMAIN=" .env; then
    SESSION_DOMAIN=$(grep "^SESSION_DOMAIN=" .env | cut -d '=' -f2-)
    if [ "$SESSION_DOMAIN" == "null" ] || [ -z "$SESSION_DOMAIN" ]; then
        echo -e "  SESSION_DOMAIN=null ${GREEN}✓${NC}"
    else
        echo -e "  ${RED}SESSION_DOMAIN=${SESSION_DOMAIN} (should be null for local dev)${NC}"
    fi
else
    echo -e "  SESSION_DOMAIN not set ${GREEN}✓ (defaults to null)${NC}"
fi

echo ""

# Step 8: Rebuild config cache
echo "Step 8: Rebuilding config cache..."
php artisan config:cache
echo -e "${GREEN}✓ Config cache rebuilt${NC}"
echo ""

# Step 9: Check if Apache is running
echo "Step 9: Checking Apache..."
if systemctl is-active --quiet apache2; then
    echo -e "${GREEN}✓ Apache is running${NC}"
    read -p "Do you want to restart Apache? (y/n): " -n 1 -r
    echo ""
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        sudo systemctl restart apache2
        echo -e "${GREEN}✓ Apache restarted${NC}"
    fi
else
    echo -e "${RED}✗ Apache is not running${NC}"
    read -p "Do you want to start Apache? (y/n): " -n 1 -r
    echo ""
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        sudo systemctl start apache2
        echo -e "${GREEN}✓ Apache started${NC}"
    fi
fi
echo ""

# Step 10: Create test route (optional)
echo "Step 10: Testing session functionality..."
echo "To test if sessions are working, add these routes to routes/web.php:"
echo ""
echo -e "${YELLOW}Route::get('/test-session', function() {"
echo "    session(['test' => 'working']);"
echo "    return ["
echo "        'session_works' => session('test') === 'working',"
echo "        'session_id' => session()->getId()"
echo "    ];"
echo "});${NC}"
echo ""

# Final instructions
echo "=================================="
echo -e "${GREEN}✓ Fix script completed!${NC}"
echo ""
echo "Next steps:"
echo "1. Clear browser cookies for pmway.local"
echo "   OR use Incognito/Private window"
echo ""
echo "2. Visit: http://pmway.local/diagnose-session"
echo "   (After adding the diagnostic routes)"
echo ""
echo "3. Test login at: http://pmway.local/login"
echo ""
echo "4. If still failing, check logs:"
echo "   tail -50 storage/logs/laravel.log"
echo ""
echo "5. Check browser DevTools:"
echo "   Application → Cookies → Check for 'laravel_session'"
echo "   Network → Check POST request includes '_token'"
echo ""

# Check if diagnostic files exist
if [ -f "resources/views/diagnose-session.blade.php" ]; then
    echo -e "${GREEN}✓ Diagnostic page found${NC}"
else
    echo -e "${YELLOW}⚠ Add diagnose-session.blade.php to resources/views/${NC}"
fi

if grep -q "diagnose-session" routes/web.php; then
    echo -e "${GREEN}✓ Diagnostic routes found in web.php${NC}"
else
    echo -e "${YELLOW}⚠ Add diagnostic routes to routes/web.php${NC}"
fi
echo ""

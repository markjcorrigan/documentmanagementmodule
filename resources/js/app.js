import './bootstrap';
import Search from "./live-search";
import Profile from "./profile";
import TurndownService from 'turndown';
import './chat-presence.js';

/* ============================================
   REVERB - Echo is initialized in bootstrap.js
   ============================================ */

/* ============================================
   EXISTING APPLICATION MODULES
   ============================================ */

if (document.querySelector(".profile-nav")) {
    new Profile();
}

if (document.querySelector(".header-docusearch-icon")) {
    // new Search();
}

if (document.querySelector(".header-chat-icon")) {
    // new Chat();
}

/* ============================================
   UNIFIED DARK MODE SYSTEM
   ============================================ */

/**
 * Get current theme from any storage location
 */
function getCurrentTheme() {
    const fluxAppearance = localStorage.getItem('flux.appearance');
    const fluxAppearanceAlt = localStorage.getItem('flux:appearance');
    const theme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    const savedTheme = fluxAppearance || fluxAppearanceAlt || theme;

    if (savedTheme === 'system') {
        return systemPrefersDark ? 'dark' : 'light';
    }

    return savedTheme || (systemPrefersDark ? 'dark' : 'light');
}

/**
 * Save theme to ALL storage locations
 */
function saveTheme(theme) {
    console.log('💾 Saving theme to all locations:', theme);
    localStorage.setItem('flux.appearance', theme);
    localStorage.setItem('flux:appearance', theme);
    localStorage.setItem('theme', theme);

    if (window.Flux) {
        window.Flux.appearance = theme;
    }

    if (window.Alpine && window.Alpine.$flux) {
        window.Alpine.$flux.appearance = theme;
    }
}

/**
 * Apply theme to all systems
 */
function applyTheme(theme, source = 'manual') {
    const isDark = theme === 'dark';
    console.log(`🎨 Applying theme from ${source}:`, theme);

    document.documentElement.classList.toggle('dark', isDark);
    document.body.classList.toggle('dark', isDark);

    updateBodyBackground(isDark);
    applyBootstrapTheme(theme);
    updateThemeIcon(isDark);
    saveTheme(theme);

    window.dispatchEvent(new CustomEvent('themeChanged', {
        detail: { theme, isDark, source }
    }));
}

/**
 * Update body background colors
 */
function updateBodyBackground(isDark) {
    const bgColor = isDark ? '#27272a' : 'white';
    document.body.style.backgroundColor = bgColor;
    document.documentElement.style.backgroundColor = bgColor;
}

/**
 * Update Bootstrap theme attributes
 */
function applyBootstrapTheme(theme) {
    const isDark = theme === 'dark';

    try {
        const bootstrapSections = document.querySelectorAll('[data-bs-theme]');
        bootstrapSections.forEach(section => {
            section.setAttribute('data-bs-theme', theme);
        });

        if (isDark) {
            document.documentElement.style.setProperty('--bs-body-bg', '#212529');
            document.documentElement.style.setProperty('--bs-body-color', '#fff');
        } else {
            document.documentElement.style.setProperty('--bs-body-bg', '#fff');
            document.documentElement.style.setProperty('--bs-body-color', '#212529');
        }

        console.log('✅ Bootstrap theme applied:', theme);
    } catch (error) {
        console.log('⚠️ Bootstrap theme application skipped:', error.message);
    }
}

/**
 * Update theme toggle icon
 */
function updateThemeIcon(isDark) {
    const themeIcon = document.getElementById('themeIcon');
    if (!themeIcon) return;

    themeIcon.classList.remove('fa-moon', 'fa-sun');
    themeIcon.classList.add(isDark ? 'fa-sun' : 'fa-moon');
    themeIcon.setAttribute('title', `Switch to ${isDark ? 'light' : 'dark'} mode`);
    console.log('🌓 Theme icon updated:', isDark ? 'sun' : 'moon');
}

/**
 * Toggle between light and dark themes
 */
window.toggleTheme = function() {
    const currentTheme = getCurrentTheme();
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    console.log('🔄 Toggling theme:', currentTheme, '→', newTheme);
    applyTheme(newTheme, 'navbar-toggle');
};

/**
 * Set specific theme
 */
window.setTheme = function(theme) {
    console.log('⚙️ Setting theme from admin panel:', theme);

    if (theme === 'system') {
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        theme = systemPrefersDark ? 'dark' : 'light';
        localStorage.setItem('flux.appearance', 'system');
        localStorage.setItem('flux:appearance', 'system');
        localStorage.setItem('theme', 'system');
    }

    applyTheme(theme, 'admin-panel');
};

/**
 * Initialize theme system
 */
function initializeThemeSystem() {
    console.log('🚀 Initializing unified theme system...');
    const initialTheme = getCurrentTheme();
    console.log('📋 Initial theme detected:', initialTheme);
    applyTheme(initialTheme, 'initialization');

    const themeIcon = document.getElementById('themeIcon');
    if (themeIcon && !themeIcon.dataset.themeHandlerAttached) {
        themeIcon.addEventListener('click', window.toggleTheme);
        themeIcon.dataset.themeHandlerAttached = 'true';
        console.log('✅ Theme icon click handler attached');
    }

    watchSystemPreference();
    console.log('✅ Theme system initialized');
}

/**
 * Watch for system preference changes
 */
function watchSystemPreference() {
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    mediaQuery.addEventListener('change', (e) => {
        const userPreference = localStorage.getItem('flux.appearance') ||
            localStorage.getItem('flux:appearance') ||
            localStorage.getItem('theme');

        if (!userPreference || userPreference === 'system') {
            console.log('🔄 System preference changed, updating theme...');
            const newTheme = e.matches ? 'dark' : 'light';
            applyTheme(newTheme, 'system-preference');
        }
    });
}

/**
 * Reinitialize Flux components
 */
window.reinitializeFluxComponents = function() {
    console.log('🔄 Reinitializing Flux components...');
    if (window.Alpine) {
        try {
            const header = document.querySelector('[data-flux-header]');
            if (header && window.Alpine.initTree) {
                window.Alpine.initTree(header);
            }
        } catch (error) {
            console.log('⚠️ Flux reinitialization skipped:', error.message);
        }
    }

    const homeIcon = document.querySelector('a.nav-link img');
    if (homeIcon) {
        homeIcon.style.cssText = 'width: 40px !important; height: 40px !important; display: block !important;';
    }
};

/* ============================================
   DOM READY HANDLER
   ============================================ */

document.addEventListener('DOMContentLoaded', function() {
    console.log('📄 DOM loaded - starting theme initialization');
    initializeThemeSystem();
});

/* ============================================
   LIVEWIRE INTEGRATION
   ============================================ */

document.addEventListener('livewire:init', () => {
    console.log('⚡ Livewire initialized');
});

/* ============================================
   UTILITY FUNCTIONS
   ============================================ */

/**
 * Initialize scroll-to-top button
 */
function initializeScrollButton() {
    const scrollBtn = document.getElementById("scrollUpBtn");
    if (!scrollBtn) {
        console.log('⚠️ Scroll button not found on this page');
        return;
    }

    const circle = scrollBtn.querySelector("circle");
    if (!circle) {
        console.log('⚠️ Progress circle not found in scroll button');
        return;
    }

    const radius = circle.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;

    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset = circumference;

    function setProgress() {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = docHeight ? scrollTop / docHeight : 0;
        circle.style.strokeDashoffset = circumference * (1 - progress);
    }

    function handleScroll() {
        setProgress();
        if (window.scrollY > 300) {
            scrollBtn.classList.add("show");
        } else {
            scrollBtn.classList.remove("show");
        }
    }

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    window.addEventListener("scroll", handleScroll);
    scrollBtn.addEventListener("click", scrollToTop);
    setProgress();
    console.log('✅ Scroll button initialized');
}

/**
 * Initialize draggable pins
 */
window.initDraggablePins = function() {
    const pins = document.querySelectorAll('#pinauthed, #pin');
    if (pins.length === 0) return;

    console.log('🎯 Found pins to make draggable:', pins.length);

    if (typeof window.jQuery === 'undefined' || typeof window.$ === 'undefined') {
        console.log('⚠️ jQuery not available for draggable pins');
        return;
    }

    if (typeof window.$.fn.draggable === 'undefined') {
        console.log('⚠️ jQuery UI draggable not available');
        return;
    }

    pins.forEach(pin => {
        try {
            const $pin = $(pin);
            if (!$pin.data('uiDraggable')) {
                $pin.draggable({
                    containment: "window",
                    cursor: "move",
                    opacity: 0.8,
                    zIndex: 1000
                });
                console.log('✅ Made pin draggable:', pin.id || 'unnamed-pin');
            }
        } catch (error) {
            console.log('❌ Error making pin draggable:', error.message);
        }
    });
};

/**
 * Initialize all utilities
 */
function initializeUtilities() {
    console.log('🔧 Initializing utility functions...');
    initializeScrollButton();

    if (typeof window.jQuery !== 'undefined' && typeof window.$.fn.draggable !== 'undefined') {
        window.initDraggablePins();
    } else {
        console.log('⏸️ Skipping draggable pins - jQuery/jQuery UI not loaded');
    }

    console.log('✅ Utilities initialized');
}

// Initialize utilities when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔧 DOM ready - initializing utilities');
    initializeUtilities();
});

/* ============================================
   ADDITIONAL UTILITY FUNCTIONS
   ============================================ */

window.scrollToElement = function(elementId, offset = 0) {
    const element = document.getElementById(elementId);
    if (!element) {
        console.log('⚠️ Element not found:', elementId);
        return;
    }

    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.scrollY - offset;

    window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
    });
};

window.isInViewport = function(element) {
    if (typeof element === 'string') {
        element = document.getElementById(element);
    }
    if (!element) return false;

    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientHeight)
    );
};

window.getScrollPercentage = function() {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    return docHeight ? (scrollTop / docHeight) * 100 : 0;
};

window.debounce = function(func, wait = 250) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
};

window.throttle = function(func, limit = 250) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
};

/**
 * Lazy load images
 */
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });
        images.forEach(img => imageObserver.observe(img));
    } else {
        images.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }
}

document.addEventListener('DOMContentLoaded', lazyLoadImages);

/**
 * Enable keyboard navigation
 */
function enableKeyboardNavigation() {
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openDropdowns = document.querySelectorAll('[data-flux-dropdown][open]');
            openDropdowns.forEach(dropdown => {
                dropdown.removeAttribute('open');
            });
        }

        if (e.key === 'Home' && !e.target.matches('input, textarea')) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        if (e.key === 'End' && !e.target.matches('input, textarea')) {
            e.preventDefault();
            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', enableKeyboardNavigation);

/* ============================================
   DEBUG FUNCTIONS
   ============================================ */

window.debugUtils = function() {
    console.log('=== UTILITY DEBUG ===');
    console.log('Scroll button:', !!document.getElementById('scrollUpBtn'));
    console.log('Current scroll:', window.scrollY);
    console.log('Scroll percentage:', window.getScrollPercentage().toFixed(2) + '%');
    console.log('jQuery available:', typeof window.jQuery !== 'undefined');
    console.log('jQuery UI draggable:', typeof window.$.fn?.draggable !== 'undefined');
    console.log('Pins on page:', document.querySelectorAll('#pinauthed, #pin').length);
    console.log('====================');
};

window.debugTheme = function() {
    console.log('=== THEME DEBUG ===');
    const state = {
        current: getCurrentTheme(),
        isDark: document.documentElement.classList.contains('dark'),
        storage: {
            'flux.appearance': localStorage.getItem('flux.appearance'),
            'flux:appearance': localStorage.getItem('flux:appearance'),
            'theme': localStorage.getItem('theme')
        },
        system: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    };
    console.log('Current theme:', state.current);
    console.log('Is dark mode:', state.isDark);
    console.log('Storage:', state.storage);
    console.log('System preference:', state.system);
    console.log('Theme icon present:', !!document.getElementById('themeIcon'));
    console.log('Flux available:', !!window.Flux);
    console.log('Alpine available:', !!window.Alpine);
    console.log('===================');
};

window.getThemeState = function() {
    return {
        current: getCurrentTheme(),
        isDark: document.documentElement.classList.contains('dark'),
        storage: {
            'flux.appearance': localStorage.getItem('flux.appearance'),
            'flux:appearance': localStorage.getItem('flux:appearance'),
            'theme': localStorage.getItem('theme')
        },
        system: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    };
};

console.log('✅ Utility functions loaded');
console.log('💡 Available: scrollToElement(), isInViewport(), debugUtils()');
console.log('✅ Unified theme system loaded');
console.log('💡 Available functions: toggleTheme(), setTheme(theme), debugTheme(), getThemeState()');
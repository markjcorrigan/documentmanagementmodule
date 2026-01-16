# PMWay Typography Standards

## Overview
This document defines the standardized typography classes for the PMWay platform. All text elements support dark mode and are fully responsive.

---

## Heading Standards

### H1 - Page Title
**Use for:** Main page titles
**Class:**
```html
<h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8 border-b border-gray-200 dark:border-gray-700 pb-4">
    Page Title
</h1>
```
**Notes:** Includes bottom border for visual separation

---

### H2 - Section Heading
**Use for:** Major section headings within a page
**Class:**
```html
<h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
    Section Heading
</h2>
```

---

### H3 - Subsection Heading
**Use for:** Subsections within major sections
**Class:**
```html
<h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
    Subsection Heading
</h3>
```

---

### H4 - Minor Heading
**Use for:** Minor headings and labels within subsections
**Class:**
```html
<h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
    Minor Heading
</h4>
```

---

## Paragraph Standards

### Large Body Text (Main Content)
**Use for:** Main content areas in guides, articles, documentation
**Class:**
```html
<p class="text-xl leading-relaxed text-gray-700 dark:text-gray-300">
    Your main content text here.
</p>
```
**Notes:** Best for readability with generous line spacing

---

### Standard Body Text
**Use for:** General paragraphs and descriptions
**Class:**
```html
<p class="text-lg text-gray-700 dark:text-gray-300 mb-4">
    Your paragraph text here.
</p>
```
**Notes:** Includes bottom margin for automatic spacing

---

### Small Text (Notes & Captions)
**Use for:** Helper text, notes, captions, code explanations
**Class:**
```html
<p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
    Helper text or notes here.
</p>
```
**Notes:** Slightly subdued to indicate secondary importance

---

## Quick Reference Table

| Element | Use Case | Size | Weight | Color (Light) | Color (Dark) | Margin |
|---------|----------|------|--------|---------------|--------------|---------|
| H1 | Page Title | 4xl | bold | gray-900 | white | mb-8 + border |
| H2 | Section | 2xl | semibold | gray-900 | white | mb-6 |
| H3 | Subsection | xl | semibold | gray-900 | white | mb-4 |
| H4 | Minor | lg | semibold | gray-900 | white | mb-4 |
| P (Large) | Main Content | xl | normal | gray-700 | gray-300 | none |
| P (Standard) | General | lg | normal | gray-700 | gray-300 | mb-4 |
| P (Small) | Notes | sm | normal | gray-600 | gray-400 | mt-3 |

---

## Color Palette

### Text Colors
- **Primary Text (Light):** `text-gray-900` (#111827)
- **Primary Text (Dark):** `text-white` (#ffffff)
- **Body Text (Light):** `text-gray-700` (#374151)
- **Body Text (Dark):** `text-gray-300` (#d1d5db)
- **Secondary Text (Light):** `text-gray-600` (#4b5563)
- **Secondary Text (Dark):** `text-gray-400` (#9ca3af)

### Background Colors
- **Page Background (Light):** `bg-white` (#ffffff)
- **Page Background (Dark):** `dark:bg-zinc-800` (#27272a)
- **Content Areas (Light):** `bg-gray-50` (#f9fafb)
- **Content Areas (Dark):** `dark:bg-gray-900` (#111827)

---

## Changes Made to Style Guide

### Standardizations Applied:
1. ✅ All H1 tags now use `font-bold` (was inconsistent with `font-semibold`)
2. ✅ All H2 tags now use `text-2xl font-semibold` with `mb-6`
3. ✅ All H3 tags now use `text-xl font-semibold` with `mb-4`
4. ✅ All H4 tags now use `text-lg font-semibold` with `mb-4`
5. ✅ All large body text uses `text-xl leading-relaxed text-gray-700 dark:text-gray-300`
6. ✅ All standard body text uses `text-lg text-gray-700 dark:text-gray-300 mb-4`
7. ✅ All small text uses `text-sm text-gray-600 dark:text-gray-400 mt-3`

### Typography Section Added:
- Complete visual examples of all heading levels
- Live demonstrations with dark mode support
- Copy-paste code snippets for each element
- Quick reference table for easy lookup
- Positioned at the top of the style guide for easy access

---

## Implementation Notes

1. **Always use these exact classes** - Don't deviate for consistency
2. **Dark mode is automatic** - All classes include dark: variants
3. **Spacing is built-in** - Margins are already included
4. **Copy-paste ready** - All examples can be used directly

---

## File Location
Updated style guide: `resources/views/livewire/style-guide.blade.php`

---

*Last Updated: November 28, 2025*
*Version: 2.0*

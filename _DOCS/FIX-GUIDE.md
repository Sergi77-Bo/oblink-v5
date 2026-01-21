# Fix Mentions Légales Page - Quick Guide

## Problem
The `/mentions-legales` URL redirects to the blog page instead of showing the legal mentions.

## Root Cause
The WordPress page either doesn't exist in the database or has the wrong template assigned.

## Solution Options

### Option 1: Use the Automatic Fix Script (Recommended) ✅

1. **Upload the fix script**
   - Upload `fix-mentions-legales.php` to your WordPress root directory
   - Access it via: `https://your-oblink-site.com/fix-mentions-legales.php`

2. **Run diagnostic**
   - The script will automatically detect the issue
   - Click "Fix Now" button to apply the fix
   - Test the link: `/mentions-legales`

3. **Delete the script**
   - Once fixed, delete `fix-mentions-legales.php` for security

---

### Option 2: Manual Fix via WordPress Admin

1. **Login to WordPress Admin**
   - Go to: `https://your-site.com/wp-admin`

2. **Check if page exists**
   - Navigate to: **Pages → All Pages**
   - Search for "Mentions Légales"

3. **If page exists:**
   - Click **Edit**
   - In the right sidebar under "Page Attributes"
   - Set **Template** to: `Mentions Légales`
   - Click **Update**

4. **If page doesn't exist:**
   - Click **Add New**
   - Title: `Mentions Légales`
   - Content: Leave empty (template handles this)
   - In right sidebar, set **Template** to: `Mentions Légales`
   - Click **Publish**

5. **Flush permalinks**
   - Go to: **Settings → Permalinks**
   - Click **Save Changes** (without changing anything)

---

### Option 3: Use the Setup Script

If you have SSH/FTP access to the server:

```bash
# Navigate to theme directory
cd /path/to/wordpress/wp-content/themes/your-theme

# Run setup script via browser
# Access: https://your-site.com/wp-content/themes/your-theme/setup-pages.php
```

This will create/update all OBLINK pages including Mentions Légales.

---

## Verification

After applying any fix:

1. **Test the URL directly**
   ```
   https://your-oblink-site.com/mentions-legales
   ```
   Expected: Legal mentions page displays (not blog)

2. **Test footer link**
   - Scroll to footer on any page
   - Click "Mentions Légales"
   - Should navigate to legal page

3. **Verify in WordPress**
   - Go to **Pages → All Pages**
   - Find "Mentions Légales"
   - Should show:
     - Status: Published ✓
     - Template: Mentions Légales ✓
     - Slug: mentions-legales ✓

---

## Files Involved

- `/theme/page-mentions-legales.php` - Template file ✓ (exists)
- `/theme/setup-pages.php` - Automated setup script
- `/fix-mentions-legales.php` - Diagnostic & fix tool (NEW)

---

## Still Not Working?

Check these:

1. **Theme activation**: Ensure the OBLINK theme is active
2. **Template file**: Verify `page-mentions-legales.php` exists in theme folder
3. **Permalinks**: Try flushing permalinks (Settings → Permalinks → Save)
4. **Caching**: Clear any caching plugins (WP Super Cache, W3 Total Cache, etc.)
5. **Server cache**: Clear server-side cache if applicable

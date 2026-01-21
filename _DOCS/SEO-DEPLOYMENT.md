# SEO Phase 1 - Deployment Guide

## Quick Start

1. **Upload this theme folder to WordPress**
   ```
   /wp-content/themes/your-theme/
   ```

2. **Verify images are in place**
   ```
   /wp-content/uploads/oblink-og-image.jpg
   /wp-content/uploads/oblink-twitter-card.jpg
   /wp-content/uploads/oblink-logo.png
   ```

3. **Test the implementation**
   - Visit your homepage
   - View page source (Ctrl+U / Cmd+Option+U)
   - Look for meta tags and JSON-LD scripts

---

## What Was Implemented

✅ **Dynamic Meta Tags** - 12+ pages configured  
✅ **Open Graph Tags** - All pages optimized for Facebook/LinkedIn  
✅ **Twitter Cards** - Enhanced Twitter sharing  
✅ **JSON-LD Schemas** - Organization + JobPosting  
✅ **Social Media Images** - Professional OG/Twitter cards generated  

---

## Testing Checklist

### 1. Meta Tags Verification

Visit each page and check source code for:

- `<title>` - Unique per page ✓
- `<meta name="description">` - Unique and compelling ✓
- `<link rel="canonical">` - Correct URL ✓

**Pages to test:**
- / (homepage)
- /blog
- /emploi-opticien
- /simulateur
- /abonnements

### 2. Open Graph Validation

**Facebook Sharing Debugger:**
https://developers.facebook.com/tools/debug/

1. Enter your URL
2. Click "Scrape Again"
3. Verify:
   - Image displays (1200x630px)
   - Title and description are correct
   - No warnings

### 3. Twitter Card Validation

**Twitter Card Validator:**
https://cards-dev.twitter.com/validator

1. Enter your URL
2. Verify card preview displays
3. Check image (1200x600px)

### 4. Structured Data Testing

**Google Rich Results Test:**
https://search.google.com/test/rich-results

1. Enter your homepage URL
2. Verify Organization schema ✓
3. Enter /emploi-opticien
4. Verify JobPosting schema ✓

---

## Expected Results

### Homepage
```html
<title>OBLINK - Un opticien en un clin d'œil</title>
<meta name="description" content="OBLINK connecte opticiens freelances et magasins d'optique...">
<meta property="og:title" content="OBLINK - Plateforme opticiens freelances">
<meta property="og:image" content=".../oblink-og-image.jpg">
```

### JSON-LD (All Pages)
```html
<script type="application/ld+json">
{
  "@type": "Organization",
  "name": "OBLINK",
  "aggregateRating": {
    "ratingValue": "4.9"
  }
}
</script>
```

---

## Troubleshooting

### Images don't display in Facebook debugger

**Solution:**
1. Check image URLs are accessible
2. Images must be publicly viewable
3. Run "Scrape Again" in Facebook tool
4. Wait 24h for cache to clear

### Meta tags not showing

**Solution:**
1. Clear WordPress cache (if using cache plugin)
2. Check `inc/seo-meta.php` is loading
3. Verify `header-inc.php` has the require_once call
4. Check PHP error logs

### JSON-LD validation errors

**Solution:**
1. Use Google's testing tool
2. Read specific error message
3. Update schema in `inc/seo-meta.php`
4. Re-test until valid

---

## Next Steps (Optional)

**Phase 2 - SEO Local:**
- Create city landing page template
- Deploy Paris page: `/opticien-freelance-paris`
- Add FAQ schema
- Implement Review schema for testimonials

**Technical SEO:**
- XML Sitemap (use Yoast SEO or manual)
- robots.txt configuration
- Internal linking optimization
- Schema for individual blog posts

---

## Files Reference

- **SEO System:** `/theme/inc/seo-meta.php`
- **Header:** `/theme/header-inc.php`
- **Images:** `/wp-content/uploads/oblink-*.jpg|png`
- **Documentation:** `/SEO-IMPLEMENTATION-PLAN.md`

---

## Support

For questions or issues:
1. Check error logs: `/wp-content/debug.log`
2. Review implementation plan
3. Test with validation tools above

**Last Updated:** 2026-01-15

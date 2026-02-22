# DenZal Construction WordPress Theme
**Built by Kapeesh Enterprises for DenZal Construction Co. LLC**

---

## Quick Install

1. Zip the `denzal-theme` folder → `denzal-theme.zip`
2. WordPress Admin → Appearance → Themes → Add New → Upload Theme
3. Activate the theme

---

## Required First Steps After Activation

> ⚠️ **After activating or updating the theme, always go to Settings → Permalinks and click Save Changes.** This flushes rewrite rules and is required on every install or update.

### 1. Set the Homepage
- Settings → Reading → "A static page"
- Front page: create a page titled **"Home"** with template **Front Page**
- _(The template auto-loads — no content needed in the editor)_

### 2. Create Your Pages (slugs AND templates must match)
Create these pages in Pages → Add New. The **slug** (URL) must match exactly — WordPress uses it to auto-select the correct template:

| Page Title   | Slug (URL)      | Template        |
|-------------|-----------------|-----------------|
| Home        | `home`          | Front Page      |
| Our Homes   | `our-homes`     | Our Homes       |
| Our Process | `our-process`   | Our Process     |
| Testimonials | `testimonials` | Testimonials    |
| About Us    | `about-us`      | About Us        |
| Contact     | `contact`       | Contact         |

> ⚠️ **Do not** use the slug `home-models` for any page — it is reserved for the internal CPT archive. Your public Our Homes page must use the slug `our-homes`.

### 3. Assign the Navigation Menu
- Appearance → Menus → Create Menu (name it "Primary")
- Add all 6 pages
- Check "Primary Navigation" under Menu Settings → Save

### 4. Add Your Logo (optional)
- Currently uses the hosted logo from `denzalconstruction.com`
- To replace: edit `header.php` and `footer.php` and update the `<img src="">` to your uploaded logo URL

### 5. Add Google Maps Embed
- Go to maps.google.com → search "466 N Main St, Eynon PA 18403"
- Click Share → Embed a map → Copy the iframe `src` URL
- Replace the placeholder `src` in `front-page.php` and `page-contact.php`

---

## Adding Content via the Dashboard

### Adding Home Models
- Dashboard → Home Models → Add New
- Fill in: Title (model name), Featured Image, Specs (beds/baths/sqft)
- Assign taxonomy: Home Type (Ranch, Colonial, etc.) and Availability (Quick Delivery / Custom)
- The Our Homes page will automatically pull these in

### Adding Testimonials
- Dashboard → Testimonials → Add New
- Title: reviewer name
- Content: the review text
- Fill in: Author, Role, Star Rating in the meta box

---

## Plugins Recommended

| Plugin              | Purpose                          | Cost  |
|--------------------|----------------------------------|-------|
| Yoast SEO          | Local SEO, sitemap, schema       | Free  |
| WPForms Lite       | Enhanced form (optional)         | Free  |
| WP Super Cache     | Page caching / performance       | Free  |
| UpdraftPlus        | Automated backups                | Free  |
| Wordfence Security | Firewall & malware scan          | Free  |

---

## Theme File Structure

```
denzal-theme/
├── style.css              ← Theme header + all CSS
├── functions.php          ← CPTs, meta boxes, enqueue, AJAX handler
├── header.php             ← Topbar + sticky nav
├── footer.php             ← Footer columns + CTA banner
├── index.php              ← Fallback template
├── front-page.php         ← Homepage (hero, about, portfolio, process, testimonials, map, contact)
├── page-our-homes.php     ← Our Homes with filter + all 15 models
├── page-process.php       ← Process timeline
├── page-testimonials.php  ← Full testimonials grid
├── page-about.php         ← About / team page
├── page-contact.php       ← Dedicated contact page with map
├── single-dz_home.php     ← Individual home model page
└── assets/
    └── js/
        └── main.js        ← Nav, scroll, animations, AJAX form
```

---

## Contact Form Email
Form submissions go to the WordPress admin email address by default.
- Change it: Settings → General → Administration Email Address
- Or add WPForms/CF7 for more advanced routing

---

*Built with ❤️ in NEPA by Kapeesh Enterprises*

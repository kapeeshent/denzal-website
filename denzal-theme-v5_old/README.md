# DenZal Construction WordPress Theme v2.0
**Built by Kapeesh Enterprises for DenZal Construction Co. LLC**
**v2.0 — Hero Background Carousel (Swiper.js)**

---

## What's New in v2.0

The homepage hero now features a **full-bleed photo slideshow** powered by Swiper.js:
- Automatically pulls featured images from your **Home Models** (Dashboard → Home Models)
- Falls back to 3 static DenZal home photos if no CPT posts exist
- 5-second autoplay with slow 1200ms crossfade transitions
- Subtle Ken Burns zoom animation per slide
- Left-side gradient keeps headline text readable without blacking out photos
- No jQuery required — loads from CDN automatically

---

## Install Instructions

1. **Zip** the `denzal-theme` folder → `denzal-theme.zip`
2. WordPress Admin → **Appearance → Themes → Add New → Upload Theme**
3. **Activate** the theme
4. ⚠️ Go to **Settings → Permalinks** and click **Save Changes** (required after every install/update)

---

## Required First Steps After Activation

### 1. Set the Homepage
- Settings → Reading → "A static page"
- Front page: create a page titled **"Home"** (template auto-selects)

### 2. Create Your Pages
Create these pages in Pages → Add New. **Slugs must match exactly:**

| Page Title   | Slug (URL)    | Template     |
|-------------|---------------|--------------|
| Home        | `home`        | Front Page   |
| Our Homes   | `our-homes`   | Our Homes    |
| Our Process | `our-process` | Our Process  |
| Testimonials| `testimonials`| Testimonials |
| About Us    | `about`       | About Us     |
| Contact     | `contact`     | Contact      |

### 3. Assign the Navigation Menu
- Appearance → Menus → Create Menu → Add all 6 pages → Check "Primary Navigation" → Save

### 4. Add Google Maps Embed
- Go to maps.google.com → search "466 N Main St, Eynon PA 18403"
- Click **Share → Embed a map** → copy the iframe `src` URL
- Replace the placeholder `src` in `page-contact.php` (near bottom of file)

---

## Adding Content via the Dashboard

### Adding Home Models (populates carousel + Our Homes page)
- Dashboard → **Home Models → Add New**
- Fill in: Title, Featured Image, Specs (beds/baths/sqft) in the meta box
- Assign taxonomy: Home Type (Ranch, Colonial, etc.) and Availability
- **The homepage carousel pulls the 10 most recent Home Models automatically**

### Adding Testimonials
- Dashboard → **Testimonials → Add New**
- Title: reviewer name · Content: the review text
- Fill in Author, Role, Star Rating in the meta box

---

## Recommended Plugins

| Plugin              | Purpose                          |
|--------------------|----------------------------------|
| Yoast SEO          | Local SEO, sitemap, schema       |
| WPForms Lite       | Enhanced form (optional)         |
| WP Super Cache     | Page caching / performance       |
| UpdraftPlus        | Automated backups                |
| Wordfence Security | Firewall & malware scan          |

---

## Theme File Structure

```
denzal-theme/
├── style.css              ← Theme header + all CSS (includes carousel styles)
├── functions.php          ← CPTs, meta boxes, enqueue (Swiper + carousel JS), AJAX
├── header.php             ← Topbar + sticky nav
├── footer.php             ← Footer columns + CTA banner
├── index.php              ← Fallback template
├── front-page.php         ← Homepage with hero carousel, about, portfolio, etc.
├── page-our-homes.php     ← Our Homes with filter grid
├── page-process.php       ← Process timeline + FAQ
├── page-testimonials.php  ← Full testimonials grid
├── page-about.php         ← About / team / values
├── page-contact.php       ← Contact form + map
├── single-dz_home.php     ← Individual home model page
└── assets/
    └── js/
        ├── main.js            ← Nav, scroll, animations, AJAX form
        └── hero-carousel.js   ← Swiper initialization (NEW in v2.0)
```

---

*Built with ❤️ in NEPA by Kapeesh Enterprises*

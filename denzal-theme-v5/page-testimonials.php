<?php
/**
 * Template Name: Testimonials
 */
get_header();

$static_reviews = [
    [ 'name' => 'Heather Seitzinger', 'initial' => 'H', 'stars' => 5, 'tag' => 'Custom Home Build',        'category' => 'new-home',   'time' => '2 months ago',  'featured' => true,
      'text' => 'Truly the most professional and talented builders! We took years deciding to build. When we met with Chris for the very first time, he made us feel like family. He listened carefully and showed us plans that met with our thoughts. We knew immediately that DenZal was the right choice for us.' ],
    [ 'name' => 'Bryan Holod',         'initial' => 'B', 'stars' => 5, 'tag' => 'New Home Build',           'category' => 'new-home',   'time' => '3 months ago',  'gold' => true,
      'text' => 'A true pleasure being able to work with a company like DenZal. Knowledgeable, helpful, and quality craftsmanship from start to finish. DenZal takes all the worry out of a once in a lifetime process and they truly put their customers first!' ],
    [ 'name' => 'Tom Stefursky',       'initial' => 'T', 'stars' => 5, 'tag' => 'Deck Replacement',         'category' => 'deck',       'time' => '4 months ago',
      'text' => 'DENZAL did a full deck replacement on our house. From start to finish they did a great job. Ryan and his workers were there daily and kept us updated regularly. The workmanship is superb and we could not be happier.' ],
    [ 'name' => 'Jennifer Dellamalva', 'initial' => 'J', 'stars' => 5, 'tag' => 'Custom Home Build',        'category' => 'new-home',   'time' => '1 year ago',    'gold' => true,
      'text' => 'Denzel Construction built a beautiful custom home in record time. They were very personable and answered all of my questions promptly. I love my new home!' ],
    [ 'name' => 'Gela Griffin',        'initial' => 'G', 'stars' => 5, 'tag' => 'Dream Home Build',         'category' => 'new-home',   'time' => '3 years ago',
      'text' => 'My husband and I had a great experience building our dream house, thanks to everyone at Denzal! Chris and Ryan were quick to resolve any problems that presented itself through the whole process. We highly recommend using Denzal construction for building a new home.' ],
    [ 'name' => 'Sierra Lancia',       'initial' => 'S', 'stars' => 5, 'tag' => 'Forever Home Build',       'category' => 'new-home',   'time' => '6 years ago',   'gold' => true,
      'text' => 'We built with Chris and Ryan a little over two years ago and I was extremely pleased with our forever home. I was quite a pain in the butt during the building process, but Chris and Ryan were so easy to work with and never had a problem with any of my requests. I would highly recommend them!' ],
    [ 'name' => 'Keith Mercatili',     'initial' => 'K', 'stars' => 5, 'tag' => 'Construction',             'category' => 'new-home',   'time' => '7 years ago',
      'text' => 'Denzal Construction does excellent work. Total trust in their work. They get it right from beginning with very reasonable prices. Quality is their mission and they deliver. Would recommend them for any job.' ],
    [ 'name' => 'Jill Liparulo',       'initial' => 'J', 'stars' => 5, 'tag' => 'Basement Finish',          'category' => 'renovation', 'time' => '6 years ago',   'gold' => true,
      'text' => 'From our initial planning meeting to our gorgeous finished basement, Denzal Construction went above and beyond! The attention to detail was like no one we have ever worked with! They were awesome! I recommend them 100% to anyone.' ],
    [ 'name' => 'Chris McAndrew',      'initial' => 'C', 'stars' => 5, 'tag' => 'Home Build · 10 Years Later', 'category' => 'new-home', 'time' => '6 years ago',
      'text' => 'Denzal built our home 10 years ago and we couldn\'t be happier. They were professional and knowledgeable which made the entire process enjoyable. I\'d highly recommend them to anyone.' ],
    [ 'name' => 'Jill Stocks',         'initial' => 'J', 'stars' => 5, 'tag' => 'Home Project',             'category' => 'renovation', 'time' => '6 years ago',   'gold' => true,
      'text' => 'Denzal construction went above and beyond to meet our families needs! They were personable, punctual and the quality of work exceeded our expectations.' ],
    [ 'name' => 'Kathleen Mullen',     'initial' => 'K', 'stars' => 5, 'tag' => 'Home Build · 3 Years In',  'category' => 'new-home',   'time' => '6 years ago',
      'text' => 'I\'ve been in my Denzal home for three years now and I couldn\'t be happier. They build a strong solid home and I highly recommend them to anyone who is considering building.' ],
    [ 'name' => 'Talia Walsh',         'initial' => 'T', 'stars' => 5, 'tag' => 'Custom Home Build',        'category' => 'new-home',   'time' => '6 years ago',   'gold' => true,
      'text' => 'Denzal Construction is a professional contracting company that goes above and beyond to create their client\'s dream home. Their team of contractors are the best of the trade and ensure all projects are completed with satisfaction.' ],
    [ 'name' => 'Jennifer C.',         'initial' => 'J', 'stars' => 5, 'tag' => 'Custom Home Build',        'category' => 'new-home',   'time' => '5 years ago',
      'text' => 'We are in love with our home. DenZal built us a quality home on budget. Many people told us they went over budget by 20% with other builders — Chris and Ryan kept their word and also provided great ideas. These two gentlemen will always be welcome in our home.' ],
    [ 'name' => 'Brian C.',            'initial' => 'B', 'stars' => 5, 'tag' => 'Construction Professional', 'category' => 'new-home',  'time' => '5 years ago',   'gold' => true,
      'text' => 'As someone in the construction industry, I would highly recommend DenZal. They communicated with us before we even had a chance to reach out. Questions were answered promptly. You will not be disappointed.' ],
    [ 'name' => 'Christine M.',        'initial' => 'C', 'stars' => 5, 'tag' => 'Custom Home Build',        'category' => 'new-home',   'time' => '4 years ago',
      'text' => 'DenZal "held my hand" through each step of the building process for both the administrative and design aspects. Absolutely wonderful to work with!' ],
    [ 'name' => 'Kelly M.',            'initial' => 'K', 'stars' => 5, 'tag' => 'Home & Renovations',       'category' => 'renovation', 'time' => '4 years ago',   'gold' => true,
      'text' => 'We chose DenZal based on their excellent reputation. They did an amazing job on our home, our basement finishing, and an enclosed deck. From our first meeting through the last day of construction, they were a pleasure. You will be thrilled with the experience and the results.' ],
];

// Pull the WordPress CPT testimonials if they exist; otherwise use static reviews
$wp_testimonials = denzal_get_testimonials( 50 );
$use_static      = ! $wp_testimonials->have_posts();
wp_reset_postdata();

$featured     = $static_reviews[0];
$grid_reviews = array_slice( $static_reviews, 1 );
$total_grid   = count( $grid_reviews );
?>

<style>
/* =============================================
   TESTIMONIALS PAGE — ADDITIONAL CSS (v5 port)
   ============================================= */

/* Hero */
.tm-hero {
    background: var(--dz-navy);
    padding: 88px 80px 80px;
    position: relative; overflow: hidden;
    display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;
}
.tm-hero::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse at 80% 50%, rgba(238,223,36,.08) 0%, transparent 55%),
                repeating-linear-gradient(-45deg, transparent, transparent 36px, rgba(255,255,255,.025) 36px, rgba(255,255,255,.025) 37px);
}
.tm-hero-left  { position: relative; z-index: 2; }
.tm-hero-right { position: relative; z-index: 2; }
.tm-eyebrow {
    font-size: .75rem; font-weight: 700; letter-spacing: .3em; text-transform: uppercase;
    color: var(--dz-gold);
    display: flex; align-items: center; gap: 12px; margin-bottom: 20px;
}
.tm-eyebrow::before { content: ''; display: block; width: 30px; height: 2px; background: var(--dz-gold); }
.tm-hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.4rem, 4vw, 3.8rem); font-weight: 900;
    color: #fff; line-height: 1.05; letter-spacing: -.02em; margin-bottom: 22px;
}
.tm-hero h1 em { font-style: italic; color: var(--dz-gold); }
.tm-hero-desc { font-size: 1rem; color: rgba(255,255,255,.75); font-weight: 300; line-height: 1.8; margin-bottom: 32px; }
.tm-google-badge {
    display: inline-flex; align-items: center; gap: 14px;
    background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.2);
    padding: 14px 20px;
}
.tm-badge-icon { font-size: 1.6rem; }
.tm-badge-rating { font-family: var(--font-display); font-size: 1.5rem; font-weight: 900; color: var(--dz-gold); display: block; line-height: 1; }
.tm-badge-stars  { color: var(--dz-gold); font-size: .75rem; letter-spacing: 2px; display: block; }
.tm-badge-count  { font-size: .7rem; letter-spacing: .15em; text-transform: uppercase; color: rgba(255,255,255,.55); display: block; margin-top: 2px; }
.tm-breadcrumb { font-size: .72rem; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.35); margin-top: 32px; }
.tm-breadcrumb a { color: rgba(255,255,255,.55); text-decoration: none; }
.tm-breadcrumb span { margin: 0 8px; }

/* Featured hero card */
.tm-featured-review {
    background: var(--dz-white); padding: 44px 44px 36px;
    position: relative;
}
.tm-featured-review::before {
    content: '"';
    position: absolute; top: 20px; right: 28px;
    font-family: var(--font-display); font-size: 6rem; font-weight: 900;
    color: var(--dz-gold); opacity: .15; line-height: 1;
}
.tm-featured-stars { color: var(--dz-gold); font-size: .9rem; letter-spacing: 3px; margin-bottom: 16px; }
.tm-featured-text {
    font-family: var(--font-display); font-style: italic;
    font-size: 1.05rem; color: var(--dz-navy); line-height: 1.7; margin-bottom: 28px;
}
.tm-featured-author {
    display: flex; align-items: center; gap: 12px;
    padding-top: 20px; border-top: 1px solid var(--dz-gray-200);
}
.tm-featured-avatar {
    width: 44px; height: 44px; border-radius: 50%;
    background: var(--dz-navy); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; flex-shrink: 0;
}
.tm-featured-name { font-size: .88rem; font-weight: 700; color: var(--dz-navy); display: block; }
.tm-featured-detail { font-size: .72rem; color: var(--dz-gray-400); text-transform: uppercase; letter-spacing: .06em; }
.tm-featured-google { margin-left: auto; font-size: .72rem; color: var(--dz-gray-400); }

/* Rating breakdown strip */
.tm-rating-strip {
    background: var(--dz-navy-dark);
    padding: 52px 80px;
    display: grid; grid-template-columns: auto 1fr auto; gap: 60px; align-items: center;
    border-bottom: 3px solid rgba(255,255,255,.08);
}
.tm-rating-big { text-align: center; }
.tm-rating-num {
    font-family: var(--font-display); font-size: 5rem; font-weight: 900;
    color: var(--dz-gold); display: block; line-height: 1;
}
.tm-rating-stars { color: var(--dz-gold); font-size: 1rem; letter-spacing: 4px; display: block; margin: 4px 0; }
.tm-rating-total { font-size: .72rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: rgba(255,255,255,.4); }
.tm-rating-bars { display: flex; flex-direction: column; gap: 8px; }
.tm-rating-bar-row { display: grid; grid-template-columns: 36px 1fr 28px; align-items: center; gap: 10px; }
.tm-bar-label { font-size: .75rem; font-weight: 700; color: rgba(255,255,255,.6); text-align: right; }
.tm-bar-track { height: 6px; background: rgba(255,255,255,.1); border-radius: 3px; overflow: hidden; }
.tm-bar-fill  { height: 100%; background: var(--dz-gold); border-radius: 3px; }
.tm-bar-count { font-size: .72rem; color: rgba(255,255,255,.4); }
.tm-rating-source { text-align: center; }
.tm-rating-source-logo { font-size: 1.1rem; font-weight: 700; color: #fff; margin-bottom: 6px; display: block; }
.tm-rating-source-logo span { color: #4285f4; }
.tm-rating-source p { font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.35); }
.tm-rating-source a { font-size: .72rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--dz-gold); text-decoration: none; margin-top: 8px; display: block; }

/* Filter bar */
.tm-filter-bar {
    background: var(--dz-white); border-bottom: 1px solid var(--dz-gray-200);
    padding: 0 80px;
    display: flex; align-items: center;
    position: sticky; top: 72px; z-index: 100;
    box-shadow: 0 2px 10px rgba(0,0,0,.04);
    overflow-x: auto;
}
.tm-filter-label {
    font-size: .72rem; letter-spacing: .2em; text-transform: uppercase;
    color: var(--dz-gray-600); padding: 0 20px 0 0;
    border-right: 1px solid var(--dz-gray-200); margin-right: 20px; white-space: nowrap;
}
.tm-filter-btn {
    font-size: .82rem; font-weight: 600; letter-spacing: .12em; text-transform: uppercase;
    color: var(--dz-gray-600); background: none; border: none; cursor: pointer;
    padding: 20px 18px; border-bottom: 3px solid transparent;
    transition: color .2s, border-color .2s; white-space: nowrap;
}
.tm-filter-btn:hover { color: var(--dz-navy); }
.tm-filter-btn.active { color: var(--dz-navy); border-bottom-color: var(--dz-gold); }
.tm-filter-spacer { flex: 1; }
.tm-review-count { font-size: .75rem; letter-spacing: .1em; text-transform: uppercase; color: var(--dz-gray-600); white-space: nowrap; }
.tm-review-count strong { color: var(--dz-navy); }

/* Reviews main area */
.tm-reviews-main { padding: 60px 80px 80px; background: var(--dz-cream); }

/* Leave a review prompt */
.tm-leave-review {
    background: #fdf9e8; border: 1px solid var(--dz-gold);
    padding: 32px 40px;
    display: flex; align-items: center; justify-content: space-between; gap: 32px;
    margin-bottom: 48px;
}
.tm-leave-eyebrow { font-size: .7rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: var(--dz-gold); margin-bottom: 6px; }
.tm-leave-text { font-family: var(--font-display); font-size: 1.15rem; font-weight: 700; color: var(--dz-navy); margin-bottom: 4px; }
.tm-leave-sub  { font-size: .88rem; color: var(--dz-gray-600); }
.tm-btn-google {
    background: var(--dz-navy); color: #fff; padding: 14px 32px;
    font-size: .85rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
    text-decoration: none; white-space: nowrap; transition: background .2s; display: inline-block;
    border-radius: 4px;
}
.tm-btn-google:hover { background: var(--dz-navy-dark); }

/* Section divider */
.tm-section-divider { display: flex; align-items: center; gap: 16px; margin-bottom: 32px; }
.tm-divider-line { flex: 1; height: 1px; background: var(--dz-gray-200); }
.tm-divider-text { font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase; color: var(--dz-gray-600); white-space: nowrap; }

/* Masonry-style reviews grid */
.tm-reviews-grid { columns: 3; column-gap: 24px; margin-bottom: 60px; }
.tm-review-card {
    break-inside: avoid;
    background: var(--dz-white);
    padding: 32px 32px 28px;
    margin-bottom: 24px;
    border-left: 4px solid var(--dz-navy);
    transition: transform .3s, box-shadow .3s;
    display: block;
}
.tm-review-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(0,91,170,.12); }
.tm-review-card--gold { border-left-color: var(--dz-gold); }
.tm-review-stars { color: var(--dz-gold); font-size: .85rem; letter-spacing: 2px; margin-bottom: 12px; }
.tm-review-tag {
    display: inline-block;
    font-size: .65rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
    padding: 3px 10px; margin-bottom: 14px;
    background: #dce8f7; color: var(--dz-navy);
}
.tm-review-card--gold .tm-review-tag { background: #fdf9e8; color: #7a5000; }
.tm-review-text {
    font-family: var(--font-display); font-style: italic; font-size: .93rem;
    color: var(--dz-gray-600); line-height: 1.75; margin-bottom: 20px;
}
.tm-review-divider { height: 1px; background: var(--dz-gray-200); margin-bottom: 16px; }
.tm-review-author { display: flex; align-items: center; gap: 10px; }
.tm-review-avatar {
    width: 36px; height: 36px; border-radius: 50%;
    background: var(--dz-navy); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: .9rem; font-weight: 700; flex-shrink: 0;
}
.tm-review-avatar--gold { background: var(--dz-gold); color: var(--dz-navy); }
.tm-review-author-name   { font-size: .8rem; font-weight: 700; letter-spacing: .06em; color: var(--dz-navy); display: block; }
.tm-review-author-detail { font-size: .65rem; letter-spacing: .1em; text-transform: uppercase; color: var(--dz-gray-400); margin-top: 1px; }
.tm-review-google { margin-left: auto; font-size: .65rem; letter-spacing: .06em; color: var(--dz-gray-400); white-space: nowrap; }

/* Featured long-form banner review */
.tm-feature-review {
    background: var(--dz-navy); padding: 52px 56px;
    display: grid; grid-template-columns: 1fr auto; gap: 40px; align-items: center;
    margin-bottom: 24px;
}
.tm-feature-stars { color: var(--dz-gold); font-size: .9rem; letter-spacing: 3px; margin-bottom: 16px; }
.tm-feature-quote {
    font-family: var(--font-display); font-style: italic; font-size: 1.1rem;
    color: #fff; line-height: 1.7; margin-bottom: 24px;
}
.tm-feature-author { font-size: .8rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: var(--dz-gold); }
.tm-feature-detail { color: rgba(255,255,255,.45); font-weight: 400; }
.tm-feature-side { text-align: center; border-left: 1px solid rgba(255,255,255,.1); padding-left: 40px; }
.tm-feature-big-num {
    font-family: var(--font-display); font-size: 5rem; font-weight: 900;
    color: var(--dz-gold); line-height: 1; display: block;
}
.tm-feature-big-label { font-size: .65rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: rgba(255,255,255,.4); }

/* Final CTA */
.tm-final-cta {
    background: var(--dz-navy);
    padding: 80px;
    display: grid; grid-template-columns: 1fr auto; gap: 60px; align-items: center;
    border-top: 5px solid var(--dz-gold);
}
.tm-final-cta h2 {
    font-family: var(--font-display);
    font-size: clamp(1.8rem, 3vw, 2.8rem); font-weight: 700;
    color: #fff; line-height: 1.2; margin-bottom: 10px;
}
.tm-final-cta h2 em { font-style: italic; color: var(--dz-gold); }
.tm-final-cta p { font-size: .97rem; color: rgba(255,255,255,.72); line-height: 1.7; }
.tm-cta-actions { display: flex; flex-direction: column; gap: 14px; align-items: flex-end; }
.tm-cta-phone { font-size: .82rem; font-weight: 700; letter-spacing: .1em; color: rgba(255,255,255,.55); text-align: right; }
.tm-cta-phone a { color: var(--dz-gold); text-decoration: none; font-size: 1.05rem; display: block; margin-top: 2px; }

/* Responsive */
@media (max-width: 1100px) {
    .tm-hero { grid-template-columns: 1fr; gap: 40px; padding: 60px 40px; }
    .tm-rating-strip { grid-template-columns: 1fr; gap: 32px; padding: 40px; text-align: center; }
    .tm-rating-bar-row { justify-items: center; }
    .tm-filter-bar { padding: 0 24px; }
    .tm-reviews-main { padding: 40px; }
    .tm-reviews-grid { columns: 2; }
    .tm-feature-review { grid-template-columns: 1fr; }
    .tm-feature-side { border-left: none; border-top: 1px solid rgba(255,255,255,.1); padding-left: 0; padding-top: 28px; display: flex; gap: 16px; align-items: center; }
    .tm-final-cta { grid-template-columns: 1fr; gap: 32px; padding: 60px 40px; }
    .tm-cta-actions { align-items: flex-start; }
    .tm-cta-phone { text-align: left; }
}
@media (max-width: 640px) {
    .tm-hero { padding: 48px 24px; }
    .tm-reviews-main { padding: 32px 24px; }
    .tm-reviews-grid { columns: 1; }
    .tm-leave-review { flex-direction: column; align-items: flex-start; }
    .tm-final-cta { padding: 48px 24px; }
}
</style>

<!-- HERO — split layout with featured review -->
<div class="tm-hero">
    <div class="tm-hero-left">
        <div class="tm-eyebrow">What Our Clients Say</div>
        <h1>Real People.<br><em>Real Homes.</em><br>Real Reviews.</h1>
        <p class="tm-hero-desc">We don't write our own testimonials — we don't have to. These are the words of real NEPA families who trusted Chris and Ryan to build or renovate their home.</p>
        <div class="tm-google-badge">
            <span class="tm-badge-icon">⭐</span>
            <div>
                <span class="tm-badge-rating">4.0</span>
                <span class="tm-badge-stars">★★★★☆</span>
                <span class="tm-badge-count">34 verified Google reviews</span>
            </div>
        </div>
        <nav class="tm-breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>›</span>
            <span>Testimonials</span>
        </nav>
    </div>
    <div class="tm-hero-right">
        <div class="tm-featured-review">
            <div class="tm-featured-stars">★★★★★</div>
            <div class="tm-featured-text">"<?php echo esc_html( $featured['text'] ); ?>"</div>
            <div class="tm-featured-author">
                <div class="tm-featured-avatar"><?php echo esc_html( $featured['initial'] ); ?></div>
                <div>
                    <span class="tm-featured-name"><?php echo esc_html( $featured['name'] ); ?></span>
                    <span class="tm-featured-detail"><?php echo esc_html( $featured['tag'] ); ?> · <?php echo esc_html( $featured['time'] ); ?></span>
                </div>
                <div class="tm-featured-google">⭐ Google</div>
            </div>
        </div>
    </div>
</div>

<!-- RATING BREAKDOWN -->
<div class="tm-rating-strip">
    <div class="tm-rating-big">
        <span class="tm-rating-num">4.0</span>
        <span class="tm-rating-stars">★★★★☆</span>
        <span class="tm-rating-total">34 Google Reviews</span>
    </div>
    <div class="tm-rating-bars">
        <div class="tm-rating-bar-row"><span class="tm-bar-label">5 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:65%"></div></div><span class="tm-bar-count">22</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">4 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:6%"></div></div><span class="tm-bar-count">2</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">3 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:3%"></div></div><span class="tm-bar-count">1</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">2 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:3%"></div></div><span class="tm-bar-count">1</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">1 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:24%"></div></div><span class="tm-bar-count">8</span></div>
    </div>
    <div class="tm-rating-source">
        <span class="tm-rating-source-logo"><span>G</span>oogle</span>
        <p>Verified Reviews</p>
        <a href="https://www.google.com/maps/place/Denzal+Construction/@41.4969352,-75.5726017,1049m/data=!3m2!1e3!4b1!4m6!3m5!1s0x89c4d061b1c85c33:0x3bf3a412929adc5b!8m2!3d41.4969352!4d-75.5726017!16s%2Fg%2F1q6jhvvl7" target="_blank" rel="noopener noreferrer">View on Google →</a>
    </div>
</div>

<!-- FILTER BAR -->
<div class="tm-filter-bar" id="tm-filter-bar">
    <span class="tm-filter-label">Show</span>
    <button class="tm-filter-btn active" onclick="tmFilter('all',this)">All Reviews</button>
    <button class="tm-filter-btn" onclick="tmFilter('new-home',this)">New Home Builds</button>
    <button class="tm-filter-btn" onclick="tmFilter('renovation',this)">Renovations</button>
    <button class="tm-filter-btn" onclick="tmFilter('deck',this)">Decks &amp; Additions</button>
    <div class="tm-filter-spacer"></div>
    <span class="tm-review-count">Showing <strong id="tm-visible-count"><?php echo $total_grid; ?></strong> reviews</span>
</div>

<!-- REVIEWS GRID -->
<div class="tm-reviews-main">

    <!-- Leave a review prompt -->
    <div class="tm-leave-review">
        <div>
            <div class="tm-leave-eyebrow">Happy with your DenZal home?</div>
            <div class="tm-leave-text">Your review helps other NEPA families find a builder they can trust.</div>
            <div class="tm-leave-sub">Takes about 2 minutes. Means the world to us.</div>
        </div>
        <a href="https://g.page/r/CVvcmpISpPM7EAI/review" target="_blank" rel="noopener noreferrer" class="tm-btn-google">⭐ Leave a Google Review</a>
    </div>

    <?php if ( $use_static ) : ?>

        <!-- Static grid from real reviews -->
        <div class="tm-section-divider">
            <div class="tm-divider-line"></div>
            <span class="tm-divider-text">Verified Google Reviews</span>
            <div class="tm-divider-line"></div>
        </div>

        <div class="tm-reviews-grid">
            <?php foreach ( $grid_reviews as $r ) :
                $is_gold = ! empty( $r['gold'] );
                $card_class = 'tm-review-card' . ( $is_gold ? ' tm-review-card--gold' : '' );
                $avatar_class = 'tm-review-avatar' . ( $is_gold ? ' tm-review-avatar--gold' : '' );
                $stars = str_repeat( '★', $r['stars'] );
            ?>
            <div class="<?php echo esc_attr( $card_class ); ?>" data-category="<?php echo esc_attr( $r['category'] ); ?>">
                <div class="tm-review-stars"><?php echo esc_html( $stars ); ?></div>
                <div class="tm-review-tag"><?php echo esc_html( $r['tag'] ); ?></div>
                <div class="tm-review-text">"<?php echo esc_html( $r['text'] ); ?>"</div>
                <div class="tm-review-divider"></div>
                <div class="tm-review-author">
                    <div class="<?php echo esc_attr( $avatar_class ); ?>"><?php echo esc_html( $r['initial'] ); ?></div>
                    <div>
                        <span class="tm-review-author-name"><?php echo esc_html( $r['name'] ); ?></span>
                        <span class="tm-review-author-detail"><?php echo esc_html( $r['time'] ); ?></span>
                    </div>
                    <span class="tm-review-google">⭐ Google</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    <?php else : ?>

        <!-- WordPress CPT testimonials -->
        <div class="tm-section-divider">
            <div class="tm-divider-line"></div>
            <span class="tm-divider-text">Client Testimonials</span>
            <div class="tm-divider-line"></div>
        </div>

        <div class="tm-reviews-grid">
            <?php
            $wp_testimonials = denzal_get_testimonials( 50 );
            $i = 0;
            while ( $wp_testimonials->have_posts() ) :
                $wp_testimonials->the_post();
                $author = get_post_meta( get_the_ID(), '_dz_author', true );
                $role   = get_post_meta( get_the_ID(), '_dz_role',   true );
                $rating = get_post_meta( get_the_ID(), '_dz_rating', true ) ?: 5;
                $initial = strtoupper( substr( $author, 0, 1 ) );
                $is_gold = ( $i % 3 === 1 );
                $card_class = 'tm-review-card' . ( $is_gold ? ' tm-review-card--gold' : '' );
                $avatar_class = 'tm-review-avatar' . ( $is_gold ? ' tm-review-avatar--gold' : '' );
                $stars_html = denzal_stars( $rating );
                ?>
                <div class="<?php echo esc_attr( $card_class ); ?>" data-category="new-home">
                    <div class="tm-review-stars"><?php echo $stars_html; ?></div>
                    <div class="tm-review-text">"<?php the_content(); ?>"</div>
                    <div class="tm-review-divider"></div>
                    <div class="tm-review-author">
                        <div class="<?php echo esc_attr( $avatar_class ); ?>"><?php echo esc_html( $initial ); ?></div>
                        <div>
                            <span class="tm-review-author-name"><?php echo esc_html( $author ); ?></span>
                            <span class="tm-review-author-detail"><?php echo esc_html( $role ); ?></span>
                        </div>
                    </div>
                </div>
                <?php $i++; endwhile;
            wp_reset_postdata();
            ?>
        </div>

    <?php endif; ?>

    <!-- Featured long-form review banner -->
    <div class="tm-section-divider">
        <div class="tm-divider-line"></div>
        <span class="tm-divider-text">Featured Review</span>
        <div class="tm-divider-line"></div>
    </div>

    <div class="tm-feature-review">
        <div>
            <div class="tm-feature-stars">★★★★★</div>
            <div class="tm-feature-quote">"We are in love with our home. DenZal built us a quality home on budget. Many people told us they went over budget by 20% with other builders — Chris and Ryan kept their word and also provided great ideas. These two gentlemen will always be welcome in our home."</div>
            <div class="tm-feature-author">Jennifer C. <span class="tm-feature-detail">— Homeowner · Lackawanna County</span></div>
        </div>
        <div class="tm-feature-side">
            <span class="tm-feature-big-num">200+</span>
            <span class="tm-feature-big-label">Homes Built<br>Across NEPA</span>
        </div>
    </div>

</div>

<!-- FINAL CTA -->
<div class="tm-final-cta">
    <div>
        <h2>Your Story Starts<br><em>with One Conversation.</em></h2>
        <p>Every one of these reviews began the same way — a family with a dream and a first call to Chris or Ryan. That's where yours starts too. Call or click — we'd love to hear about your project.</p>
    </div>
    <div class="tm-cta-actions">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary" style="padding:18px 48px;font-size:.95rem;">Schedule a Free Consultation</a>
        <div class="tm-cta-phone">Or call us directly — <a href="tel:5708764663">(570) 876-4663</a></div>
    </div>
</div>

<script>
function tmFilter(cat, btn) {
    document.querySelectorAll('.tm-filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cards = document.querySelectorAll('.tm-review-card');
    let visible = 0;
    cards.forEach(c => {
        const show = cat === 'all' || c.dataset.category === cat;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('tm-visible-count').textContent = visible;
}
</script>

<?php get_footer(); ?>
